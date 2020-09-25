<?php
	session_start();
	include '../config.php';
	include '../addins/helper.php';
    if(isset($_POST['login']))
	{
		$user=$_POST['username'];
		$pass=$_POST['password'];
		if($user=='')
		{
			$_SESSION['msg']="*Please Complete Fields";
			header("location:/".PROJECTNAME."/login.php");
			return;
		}
		if($row=$db->run("SELECT * FROM user as u left join engineers as e on u.username=e.username WHERE u.username = :username", ['username'=>$user])->fetch())
		{
			if($row['password']==md5($pass))
			{
				if($row['usertype']=='engineer'&&$row['status']!=='approved')
				{
					if($row['status']==='pending')
						$_SESSION['msg']="Account Application not yet approved";
					if($row['status']==='declined')
						$_SESSION['msg']="Account Application was declined";
					return redirect('login');
				}
				$_SESSION['msg']="Log in Successful";
				$_SESSION['user']=$user;
				$_SESSION['priv']=$row['usertype'];
				return redirect(landingpage($row['usertype']));
			}
		}
		$_SESSION['msg']="Invalid Credentials";
		header("location:/".PROJECTNAME."/login.php");
	}

?>