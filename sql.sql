
drop database gestion_des_taches;
create database gestion_des_taches;
use gestion_des_taches;





create table User (
    userid int PRIMARY key AUTO_INCREMENT,
    user_nam varchar(20)  not null,
    email varchar(20)  not null,
    Passwords varchar(20) not null 
);



describe User;
 INSERT INTO User (user_nam ,email , Passwords )
 VALUES ( 'khalid','khalid@em.com','ggggg');

 create table taches (
   tache_id int PRIMARY key AUTO_INCREMENT,
    tache_name varchar(20) ,
    tache_desc varchar(20),
    tache_deadline varchar(20),
    archiefed BOOLEAN default 0 not null
 );
