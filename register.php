<?php
include "config.php";

if(isset($_POST['submit'])){

    $name = mysqli_real_escape_string($con,$_POST['name']);
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $password = mysqli_real_escape_string($con,$_POST['password']);
    $cpassword = mysqli_real_escape_string($con,$_POST['cpassword']);

    $query = mysqli_query($con, "SELECT * FROM user WHERE email='{$email}'");
    if (mysqli_num_rows($query) != 0){
        $error_msg = 'Email-ul <i>'.$email.'</i> este deja folosit. Incerca-ti sa va logati!';
        echo "Email-ul <strong>'$email'</strong> este deja folosit. Incerca-ti sa va logati!";
    }else{
        if ($email != "" && $password != "" && $cpassword == $password){
            $encrPassword = sha1($password);

            $sql_query = "INSERT INTO `user` (`id`, `name`, `email`, `password`, `tema_aleasa`) VALUES (NULL, '".$name."', '".$email."', '".$encrPassword."', 0)";
            $result = mysqli_query($con,$sql_query);
           
    
            $count = $row['cntUser'];
    
            header('Location: login_page.php');
    
        }else{
            echo "Parolele trebuie sa coincida!";
        }
    }
}