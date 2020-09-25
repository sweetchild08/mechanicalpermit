<?php
    session_start();
	include '../config.php';
	include '../addins/helper.php';
    if(isset($_POST['register']))
	{
        $name=$_POST['name'];
		$user=$_POST['username'];
        $pass=$_POST['password'];
        $val=[
            'name'=>$name,
            'username'=>$user,
            'password'=>md5($pass)
        ];
		if($user==''||$name==''||$pass=='')
		{
			$_SESSION['msg']="*Please Complete Fields";
            header("location:/".PROJECTNAME."/register.php");
            return;
        }
        try
        {
            $db->insert('user',$val);
            $_SESSION['msg']="Registration Successful";
            header("location:/".PROJECTNAME."/login.php");
        }
        catch(Exception $e)
        {
            $mes=$e->getMessage();
            if(matchNS($mes,'duplicate')!==false)
            {
                $_SESSION['msg']='username already taken, choose another one';
                header('location:/'.PROJECTNAME.'/register.php');
            }
        }
    }
    if(isset($_POST['register_eng']))
	{
        try
        {
            $data=$_POST;
            $data=unsetMany($data,['register_eng']);
            $data['date_issued']= $data['issued_at'];
            //check if all was filled out
            if(!validate($data))
            {
                $_SESSION['msg']="*Please Complete Fields";
                header("location:/".PROJECTNAME."/register-eng.php");
                return;
            }
            //check if username exist
            if($db->run("SELECT * FROM user WHERE username = :username", ['username'=>$_POST['username']])->rowCount()>0)
            {
                $_SESSION['msg']="Username already Taken";
                header("location:/".PROJECTNAME."/register-eng.php");
                return;
            }
            //check if PRC exist
            if($db->run("SELECT * FROM engineers WHERE PRC_no = :prc", ['prc'=>$_POST['prc_no']])->rowCount()>0)
            {
                $_SESSION['msg']="PRC already Registered";
                header("location:/".PROJECTNAME."/register-eng.php");
                return;
            }
            //check if there has error on files
            if(!isuploaded()&& hasuploaderror($target_dir))
            {
                $_SESSION['msg']="Error Uploading File";
                header("location:/".PROJECTNAME."/register-eng.php");
                return;
            }
            //try to move uploaded file
            $uploadedfile=uploadfile();
            if($uploadedfile===false)
                return;
            $data=array_merge($data,$uploadedfile);
            $data=unsetMany($data,['name','password']);
            $db->insert('engineers',$data);
            $data=setJust($_POST,['name','username','password']);
            $data['password']=MD5($data['password']);
            $data['usertype']='engineer';
            $db->insert('user',$data);
            echo $_SESSION['msg']="Registration Successful";
            header("location:/".PROJECTNAME."/login.php");
            
        }
        catch(Exception $e)
        {
            $mes=$e->getMessage();
                // if(matchNS($mes,'duplicate')!==false)
                //     $_SESSION['msg']='username already taken, choose another one';
                // else
                $_SESSION['msg']='ERROR:'.$mes;
            echo $_SESSION['msg'];
            header('location:/'.PROJECTNAME.'/register-eng.php');
        }
	}

?>