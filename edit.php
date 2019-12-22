<?php
session_start();
include_once('./db.php');

if(isset($_POST['id'])){
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    
    $query = "UPDATE tasks SET title= '$title', description='$description' WHERE id=$id";
    mysqli_query($connect, $query);


    $_SESSION['message'] = 'taks updated ';
    $_SESSION['color'] = 'warning';
    header('location:index.php');
}




?>