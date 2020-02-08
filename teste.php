<?php
include('conexao.php');


$sql = $conn->prepare('SELECT * FROM FUNCIONARIOS');
$sql->execute();

$result = $sql->fetchAll();

var_dump($result);

?>