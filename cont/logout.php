<?php
    session_start();
    include_once '../config.php';
    include '../addins/helper.php';
    if(isset($_SESSION['user']))
    {
        //unset($_SESSION['user']);
        session_destroy();
        $_SESSION['msg']='You have Logged Out';
        header('location:'.navigate('login'));
    }
?>