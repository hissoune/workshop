<?php
include('conex_db.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if email and password are set and not null 
    if (isset($_POST['email'], $_POST['password'])) {
        $email = $_POST['email']; // Store the input in a variable for use
        $password = $_POST['password']; // Store the input in a variable for use

        // Prepare a SQL statement using a prepared statement to prevent SQL injection
        $stmt = $connection->prepare("SELECT * FROM User WHERE email = ? AND Passwords = ?");
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if any rows were returned
        if ($result->num_rows > 0) {
            // Authentication successful, set session variables and redirect
            $_SESSION['loggedin'] = true;
            $_SESSION['email'] = $email;
            header("Location: home.php");
            exit();
        } else {
            echo '<script>alert("Login failed. Please check your email and password.");</script>';
        }

        // Close the statement
        $stmt->close();
    }
}

// Close the MySQL connection
$connection->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="flex bg-blue-400 justify-center items-center h-screen w-screen">
        <div class="bg-white p-8 rounded shadow-md">
            <form method="POST" action="#" class="space-y-4">
                <div>
                    <label for="email" class="block text-gray-700 font-bold">Email</label>
                    <input type="email" id="email" name="email" placeholder="Your email" class="w-full border rounded py-2 px-3 text-gray-700 focus:outline-none focus:border-blue-500">
                </div>
                <div>
                    <label for="password" class="block text-gray-700 font-bold">Password</label>
                    <input type="password" id="password" name="password" placeholder="Your password" class="w-full border rounded py-2 px-3 text-gray-700 focus:outline-none focus:border-blue-500">
                </div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Sign In</button>
            </form>
        </div>
    </div>
</body>
</html>
