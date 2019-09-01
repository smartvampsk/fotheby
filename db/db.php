<?php
$dbname = 'fotheby';//stores databasename
$hostname = '127.0.0.1';//stores hostnmae
$username = 'root';//username is stored
$password = '';//password for accessing database


$pdo = new PDO('mysql:dbname='.$dbname.';host='.$hostname,$username,$password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
?>
