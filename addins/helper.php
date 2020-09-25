<?php
    
    function navigate($url='')
    {
        return '/'.PROJECTNAME.'/'.$url;
    }
    function assets($asset='')
    {
        return '/'.PROJECTNAME.'/assets//'.$asset;
    }
    function landingpage($usertype='user')
    {
        switch($usertype)
        {
            case 'admin':
                return 'admin/engineers';
            case 'user':
                return 'appstat';
            case 'engineer':
                return 'engineers/applist';
        }
    }
    //match not case sensitive
    function matchNS($str,$needle)
    {
        return strpos(strtolower($str),strtolower($needle));
    }
    function activepage($pagename,$keyword)
    {
        return matchNS($pagename,$keyword)!==false?'active':'';
    }
    function numstringify($num,$numchar=4)
    {
        return sprintf("%0".$numchar."d",$num);
    }
    function redirect($route,$sessionmsg='')
    {
        if($sessionmsg!='')
            $_SESSION['msg']=$sessionmsg;
        header('location:/'.PROJECTNAME.'/'.$route);
    }
    function validate($args)
    {
        foreach($args as $key=>$value)
        {
            if($value=='')
                return false;
        }
        return true;
    }
    function unsetMany($var,$args=[])
    {
        foreach($args as $arg)
        {
            unset($var[$arg]);
        }
        return $var;
    }
    function setJust($arrays,$args=[])
    {
        foreach(array_keys($arrays) as $key)
        {
            if(!in_array($key,$args))
                unset($arrays[$key]);
        }
        return $arrays;
    }
    function isuploaded()
    {
        foreach($_FILES as $name=>$file)
        {
            if($file['error']!=0)
                return false;
        }
        return true;
    }
    function hasuploaderror()
    {
        foreach($_FILES as $name=>$file)
        {
            $file_ext = strtolower(pathinfo($file['name'],PATHINFO_EXTENSION));
            $target_file = TARGET_DIR .$_POST['username'].'-'. $name.'.'.$file_ext;
            if (file_exists(ROOT_DIR.$target_file)) {
                // //echo "Sorry, file already exists.";
                // return true;
            }
            if ($file["size"] > 500000) {//500kb
                //echo "Sorry, your file is too large.";
                return true;
            }
        }
        return false;
    }
    function uploadfile()
    {
        $uploadedfiles=[];
        foreach($_FILES as $name=>$file)
        {
            $file_ext = strtolower(pathinfo($file['name'],PATHINFO_EXTENSION));
            $target_file = TARGET_DIR .$_POST['username'].'-'. $name.'.'.$file_ext;
            //echo 'moving '.$file["tmp_name"].' to '.ROOT_DIR. $target_file.'<br>';
            if (move_uploaded_file($file["tmp_name"], ROOT_DIR. $target_file)) {
                $uploadedfiles[$name]=$target_file;
            }
            else
            return false;
        }
        return $uploadedfiles;
        
    }
    function checkiftrue($bool)
    {
        echo $bool?' checked':'';
    }
    function disableifdone($bool)
    {
        echo $bool?' disabled':'';
    }
?>