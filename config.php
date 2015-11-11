<?php

$host = 'localhost';
$user = 'root';
$pass = '220141';
$db = 'personal';


$db = new mysqli($host, $user, $pass, $db);

if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}
