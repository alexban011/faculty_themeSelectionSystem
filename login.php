<?php
include "config.php";

if(isset($_POST['submit'])){

    $name = "";
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($email != "" && $password != ""){
        $encrPassword = sha1($password);

        $sql_query = "select count(*) as cntUser from user where email='".$email."' and password='".$encrPassword."'";
        $result = mysqli_query($con,$sql_query);
        $row = mysqli_fetch_array($result);

        $sql_query2 = "select name from user where email='".$email."'";
        $result2 = mysqli_query($con,$sql_query2);
        $row2 = mysqli_fetch_array($result2);


        $name = $row2['name'];

        $count = $row['cntUser'];

        if($count > 0){
            $_SESSION['email'] = $email;
            $_SESSION["name"] = $name;
            $_SESSION["is_logged_in"] = true;
            header('Location: home.php');
        }else{
            echo "Email-ul sau parola au fost introduse incorect";
        }

    }
}