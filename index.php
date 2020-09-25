<?php
    session_start();
    include 'config.php';
    include 'addins/helper.php';
    print_r($_SESSION);
    if(isset($_SESSION['priv']))
    {
        if($_SESSION['priv']=='admin')
            header("location:/".PROJECTNAME."/admin/engineers");
        else if($_SESSION['priv']=='user')
            header("location:/".PROJECTNAME."/appstat");
    }
    redirect('login');
?>