<?php
$usuario = 'root';
$senha = '';

$charset = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');

$conn = new PDO('mysql:host=localhost;dbname=empresa', $usuario, $senha, $charset);
?>