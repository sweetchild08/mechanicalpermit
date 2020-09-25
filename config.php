<?php
    define('PROJECTNAME','mvsoft');
    define('TARGET_DIR','/uploads/');
    define('URL', $_SERVER['SERVER_NAME']);
    define('ROOT_DIR', realpath(dirname(__FILE__)));
    define('BASE_URL',URL.'/'.PROJECTNAME);
    
    include 'db.php';
    // make a connection to mysql here
    $options = [
        //required
        'username' => 'root',
        'database' => 'mvsoftdemo',
        //optional
        'password' => '',
        'type' => 'mysql',
        'charset' => 'utf8',
        'host' => 'localhost',
        'port' => '3306'
    ];

    $db = new Database($options);
    // $res=$db->getPdo()->query('Select * FROM user')->fetchAll();
    // print_r($res);

?>