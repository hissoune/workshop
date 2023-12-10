<?php

include('conex_db.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <titl>votre taches</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
<div class="bg-light d-flex justify-content-end mb-0 container">
    
    <a href="ajout_cat.php"  class="btn bg-primary p-2 my-2 mx-5 text-light nanimo">add category</a>    
    </div>
     
    <div id="categories"  class=" container mb-5" style="">
        <table class="table  table-bordered w-50">
            <thead class="bg-black text-light ">
                <tr class="table ">
                   
                    <th class="p-3 "  scope="col">tache_name</th>
                    <th class="p-3 " scope="col">tache_desc</th>
                    <th class="p-3 " scope="col">tache_deadline</th>
                    <th class="p-3  " scope="col">delete/modify</th>
                </tr>
            </thead>
            <tbody>
    <?php
     $taches = "SELECT * FROM taches ";
        $result = ($connection->query ($taches) );
     
                 if ($result->num_rows > 0) {
                     while ($row = $result->fetch_assoc()) {
                        $tachename= $row['tache_name'];
                         $tacheDiscrip = $row['tache_desc'];
                         $tachedeadline = $row['tache_deadline'];
                         $tacheid = $row['tache_id'];
                         
     
                         echo '<tr class="justify-content-center">';
                         
                         echo '<td class="border-black p-3">' . $tachename . '</td>';
                         echo '<td class="border-black p-3" >' .  $tacheDiscrip . '</td>';
                         echo '<td class="border-black p-3 "> '.$tachedeadline .'</td>';
                         echo '<td class="border-black p-2">
                               <form method="POST" class="category-action-form mx-3">
                                    <input type="hidden" name="category_name" value="' . $tacheid . '">
                                    <a   href="delet_cat.php?id='. $tacheid.'"  class="btn bg-danger text-light nanimo">delet</a>
                                    <a  type="submit"  href="modif_cat.php?id='.$tacheid.'"  class="btn bg-primary text-light nanimo">Modify</a>
                               </form>
                               </td>';
                         echo "</tr>";
                     }
                 } else {
                     echo "<tr><td colspan='5'>No taches found</td></tr>";
                 }
     
                
                 
                 ?>
             </tbody>
         </table>
     </div>
         
       <h2 class="text-center bg-dark p-2 text-light container">l'archife</h2>
     <div id="categories"  class=" container  " style="">
         <table class="table table-bordered container">
             <thead class="bg-black text-light ">
                 <tr class="table ">
                 <th class="p-3  border-black" scope="col">tache_name</th>
                    <th class="p-3  border-black" scope="col">tache_desc</th>
                    <th class="p-3 border-black" scope="col">tache_deadline</th>
                    <th class="p-3  border-black" scope="col">delete/modify</th>
                 </tr>
             </thead>
             <tbody >
                 <?php
                  $taches = "SELECT * FROM taches ";
                  $result = ($connection->query ($taches) );
                 if ($result->num_rows > 0) {
                     while ($row = $result->fetch_assoc()) {
                        $tachename= $row['tache_name'];
                        $tacheDiscrip = $row['tache_desc'];
                        $tachedeadline = $row['tache_deadline'];
                        $tacheid = $row['tache_id'];
     
                        echo '<tr class="justify-content-center">';
                         
                        echo '<td class="border-black p-3">' . $tachename . '</td>';
                        echo '<td class="border-black p-3" >' .  $tacheDiscrip . '</td>';
                        echo '<td class="border-black p-3 "> '.$tachedeadline .'</td>';
                        echo '<td class="border-black p-2">
                              <form method="POST" class="category-action-form mx-3">
                                   <input type="hidden" name="category_name" value="' . $tacheid . '">
                                   <a   href="delet_cat.php?id='. $tacheid.'"  class="btn bg-danger text-light nanimo">delet</a>
                                   <a  type="submit"  href="modif_cat.php?id='.$tacheid.'"  class="btn bg-primary text-light nanimo">Modify</a>
                              </form>
                              </td>';
                        echo "</tr>";
                     }
                 } else {
                     echo "<tr><td colspan='5'>No taches found</td></tr>";
                 }
     
                
                 
                 ?>
             </tbody>
         </table>
     </div>
   

</body>
</html>