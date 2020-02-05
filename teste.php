<?php 
include('conexao.php');

// executa uma query no banco
$sql = $conn->prepare('SELECT * FROM Funcionarios');
$sql->execute();

$result = $sql->fetchAll();

var_dump($result) ;


?>