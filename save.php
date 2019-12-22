<?php
session_start();
include_once('./db.php');

if($_POST){
    $title       = $_POST['title'];
    $description = $_POST['description'];
    
   $query = "INSERT INTO tasks(title, description) VALUES ('$title', '$description') ";
   $resultado = mysqli_query($connect, $query);
   if(!$resultado){

      die("fail");
   }

   $_SESSION['message']= 'tasks saved succesfully';
   $_SESSION['color'] = 'success';
   header('location:index.php');
}


