<?php
include 'config.php';
include 'addins.php';
$db->update('m_applications',['status'=>'payment done'],['app_no'=>$_SESSION['app_no']]);
unset($_SESSION['app_no']);

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <center>
        <h1>Payment Successful</h1>
        <button onclick="window.location.href='<?php echo navigate('appstat') ?>'">Back to home</button>
    </center>
</body>
</html>