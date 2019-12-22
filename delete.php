<?php 

session_start();
include_once('./db.php');

if(isset($_GET['id'])){

    $id = $_GET['id'];

    $query = "DELETE FROM tasks WHERE id= $id ";
    $resultado = mysqli_query($connect, $query);

    if(!$resultado){

        die('fail');
    }

    $_SESSION['message'] = 'task removed ';
    $_SESSION['color'] = 'danger';

    header('location:index.php');

}



?>