<?php
$user = 'root';
$password = '';
$charset = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8');

$conn = new PDO('mysql:host=localhost;dbname=empresa', $user, $password, $charset); 
?>
