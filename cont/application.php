<?php
	session_start();
	include '../config.php';
    include '../addins/helper.php';
    if(isset($_POST['apply_m']))
    {
        try{
            $data1=$_POST;
            $data1['scope']= implode(',',$data1['scope']);
            unset($data1['apply_m']);
            $data1['user']=$_SESSION['user'];
            $db->insert('m_applications',$data1);
            $_SESSION['msg']='Application for Mechanical Permit was Sent!';
            redirect('appstat');
        }
        catch(PDOException $e){
            $_SESSION['msg']='Application for Mechanical Permit was Failed!';
            echo $e->getMessage();
            //redirect('appstat');

        }
    }
    if(isset($_POST['inspect'])&&isset($_POST['iao']))
    {   
        $iao=implode(',',$_POST['iao']);
        if($db->update('m_applications',['status'=>'approved','checked_by'=>$_SESSION['user'],'iao'=>$iao,'other_iao'=>$_POST['other'],'cost'=>$_POST['cost']],['app_no'=>$_POST['inspect']]))
            $_SESSION['msg']='Application Approved';
        else
            $_SESSION['msg']='NO changes were made';
        redirect('engineers/applist');
    }

    
?>