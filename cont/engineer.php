<?php
    session_start();
    include '../config.php';
    include '../addins/helper.php';
    if(isset($_POST['approve']))
    {   
        if($db->update('engineers',['status'=>'approved'],['username'=>$_POST['approve']]))
            $_SESSION['msg']='Application Approved';
        else
            $_SESSION['msg']='NO changes were made';
        redirect('admin/engineers');
    }
    if(isset($_POST['decline']))
    {   
        if($db->update('engineers',['status'=>'declined'],['username'=>$_POST['decline']]))
            $_SESSION['msg']='Application Declined';
        else
            $_SESSION['msg']='NO changes were made';
        redirect('admin/engineers');
    }
?>