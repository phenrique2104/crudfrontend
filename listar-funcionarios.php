<?php
include('valida-sessao.php');
include('conexao.php');

$sql = $conn->prepare('SELECT * FROM FUNCIONARIOS ORDER BY NOME');
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
    <link rel="stylesheet" href="css/datatables.bs.css">
</head>
<body>
<?php
include('menu.php');
?>
<div class="container">
    <h1>Listagem de Funcionarios</h1>
    <hr>
    <a href="form-funcionarios.php" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> NOVO</a>

    <hr>

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Salário</th>
                <th>Sexo</th>
                <th class="text-right">Ação</th>
            </tr>
        </thead>

        <tbody>
            <?php
            foreach ($result as $r) {
            ?>
            <tr>
                <td><?php echo $r['nome']; ?></td>
                <td>R$ <?php echo number_format($r['salario'], 2, ',', '.'); ?></td>
                <td><?php echo $r['sexo']; ?></td>
                    <td class="text-right">
                    <a href="form-funcionarios.php?id_funcionario=<?php echo $r['id_funcionario']; ?>" class="btn btn-warning"><i class="glyphicon glyphicon-pencil"></i></a>

                    <a onclick="return confirm('Deseja realmente exluir?')" href="acao-funcionarios.php?acao=excluir&id_funcionario=<?php echo $r['id_funcionario']; ?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></a>
                </td>
            </tr>
            <?php
            }
            ?>

        </tbody>
    </table>



    <a href="index.php" class="btn btn-success"><i class="glyphicon glyphicon-chevron-left"></i> VOLTAR</a>
</div>

<script src="js/datatables.bs.js"></script>

<script>

//USANDO A JQUERY MANDAMOS O JS EXECUTAR UMA FUNÇÃO ANÔN9MA SOPMENTE QUANDO A PÁG. CARREGAR
//FUNÇÃO ANÔNIMA - NÃO FICA ARMAZENADA EM MEMÓRIA
$(document).ready( function () {


    $('.table').dataTable({
        pageLength: 20,
        lengthChange: false,
        language : {
            search : "Buscar:"
        }
    });

} );

</script>

</body>
</html>