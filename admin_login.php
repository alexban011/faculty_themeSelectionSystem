<?php

 if (isset($_POST["submit"])) {
     if (
			$_POST["email"] == "admin@admin.com" &&
			$_POST["password"]== "parola"
            ||
            $_POST["email"] == "admin2@admin.com" &&
			$_POST["password"]== "parola"
		) 
	 {
         session_start();
         $_SESSION["is_logged_in"] = true;
         header("Location: ./admin_home.php");
         exit();
     }
     header("Location: ./admin_login.php");
     exit();
 }
 header("Location: ./index.html");
 exit();
