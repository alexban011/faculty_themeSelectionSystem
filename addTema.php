<?php 
require_once "./config.php";

if(isset($_POST['submit'])){
    $name = $_POST['text'];

    $sql_query = "INSERT INTO `teme_proiect` (`id`, `name`, `taken`) VALUES (NULL, '".$name."', 0)";
    $result = mysqli_query($con,$sql_query);
}
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>