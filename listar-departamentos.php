<?php
include('conexao.php');

$sql = $conn->prepare('SELECT * FROM DEPARTAMENTOS');
$sql->execute();

$result = $sql->fetchAll(); 

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <h1>Listagem de Departamentos</h1>
    <hr>
    <a href="form-departamentos.php" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> NOVO</a> 
    <hr>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Sigla</th>
                <!-- <th>Ação</th> -->
            <tr>    
        </thead>
        <tbody>
            <?php
            foreach ($result as $row) {
            ?>
            <tr>
                <td><?php echo $row['nome']; ?></td>
                <td><?php echo $row['sigla']; ?></td>
                <td class="text-right">
                    <a href="#" class="btn btn-warning"><i class="glyphicon glyphicon-pencil"></i></a>
                    <a href="#" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></a>
                </td>        
            </tr>
            <?php
            }
            ?>
            
        </tbody>

    </table>
    <a href="index.php" class="btn btn-success"><i class="glyphicon glyphicon-chevron-left"></i> VOLTAR</a>  
</div>    

</body>
</html>