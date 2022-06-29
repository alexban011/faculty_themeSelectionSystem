<?php 
require_once "./config.php";

if(isset($_POST['submit'])){
    $tema = $_POST['tema'];

    $sql_query = "DELETE FROM teme_proiect WHERE name='$tema';";
    $result = mysqli_query($con,$sql_query);

    $sql_query2 = "SELECT * from user";
    $result2 = mysqli_query($con,$sql_query2);
    

    while ($row2 = mysqli_fetch_array($result2)) {
        if ($row2['tema_aleasa'] == $tema) {
            $sql_query3 = "UPDATE `user` SET `tema_aleasa` = '0' WHERE `user`.`id` = ".$row2['id'].";";
            $result3 = mysqli_query($con,$sql_query3);
        }
    }
}
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>