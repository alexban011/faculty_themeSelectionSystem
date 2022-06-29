<?php 
require_once "./config.php";

if(isset($_POST['submit'])){
    $user = $_POST['user'];
    $tema_user = "";

    // $sql_query2 = "SELECT * FROM user WHERE name='.$user.';";
    // $result2 = mysqli_query($con,$sql_query2);

    // var_dump($result2);
    // var_dump($result['tema_aleasa']);

    $sql_query = "DELETE FROM user WHERE name='$user';";
    $result = mysqli_query($con,$sql_query);

//     $sql_query3 = "UPDATE `teme_proiect` SET `taken` = '0' WHERE `user`.`name` = "$user";";
//     $result3 = mysqli_query($con,$sql_query3);
}
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>