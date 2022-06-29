<?php
include "config.php";

if(isset($_POST['submit'])){
    echo "<link rel=\"stylesheet\" href=\"./app.css\" />";
    $tema_proiect = $_POST['tema_selectata'];

    $sql_query = "select * from teme_proiect where name='".$tema_proiect."'";
    $result = mysqli_query($con,$sql_query);
    $row = mysqli_fetch_array($result);

    $sql_query4 = "select * from user where `email`='".$_SESSION['email']."'";
    $result4 = mysqli_query($con,$sql_query4);
    $row4 = mysqli_fetch_array($result4);

    
    if ($row4['tema_aleasa'] != 0) {
        echo "<br><br><br><br><br><div class=\"eroareSelectie2\">";
        echo "Deja ai selectat o tema!";
    } else if ($row['taken'] == 0) {
        $sql_query2 = "UPDATE `teme_proiect` SET `taken` = '1' WHERE `teme_proiect`.`name` ='".$tema_proiect."'";
        $result2 = mysqli_query($con,$sql_query2);

        $sql_query3 = "UPDATE `user` SET `tema_aleasa` = '$tema_proiect' WHERE `user`.`email` ='".$_SESSION['email']."'";
        $result3 = mysqli_query($con,$sql_query3);

        echo "<br><br><br><br><br><div class=\"eroareSelectie\">";
        echo "Tema a fost selectata!";
    } else {
        echo "<br><br><br><br><br><div class=\"eroareSelectie2\">";
        echo "Tema a fost deja selectata!";
    }
    echo "<br>";
    echo "In 3 secunde vei fi redirectionat inapoi.";
    echo "</div>";
    header("refresh:3; url=home.php");
}