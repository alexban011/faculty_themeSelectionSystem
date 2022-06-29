<?php

if($_POST["submit"]){
    session_start();
    session_destroy();
    header("Location: ./login_page.php");
    exit;
}

header("Location: ./login_page.php");
exit;
