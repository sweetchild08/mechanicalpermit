<?php
    $url=$_SERVER['REQUEST_URI'];
    $_SESSION['referrer']=$url;
    //check if there have session and if the url is login/register to stop redirected too many times
    if(isset($_SESSION['priv'])&&isset($access))
        if($access!=$_SESSION['priv'])
        {
            $_SESSION['msg']='Access Unauthorized';
            if($_SESSION['priv']=='admin')
                header("location:/".PROJECTNAME."/admin/engineers");
            else if($_SESSION['priv']=='user')
                header("location:/".PROJECTNAME."/appstat");
            else if($_SESSION['priv']=='engineer')
                header("location:/".PROJECTNAME."/engineers/applist");
                
        }
    if(!isset($_SESSION['user']) && strpos($url,'login')===false && strpos($url,'register')===false)
    {
        $_SESSION['msg']='Log in First';
        header('location:login.php');
    }

    //check if url is login/register , then redirect to index if insession
    else if(isset($_SESSION['user']) && (strpos($url,'login')!==false||strpos($url,'register')!==false))
    {
        $_SESSION['msg']='Already Logged in';
        header("location:/".PROJECTNAME."/appstat");
    }

    $usertype=$_SESSION['priv']??'';
    //proctect route
    
?>
