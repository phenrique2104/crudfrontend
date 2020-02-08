<?php
include('valida-sessao.php');
include('conexao.php');

# verifica se vai ser uma edição ou inserção
if ( isset($_GET['id_departamento']) ){
    $id_departamento = $_GET['id_departamento'];
    $titulo = 'Alterar';

    $sql = $conn->prepare("SELECT * FROM DEPARTAMENTOS WHERE ID_DEPARTAMENTO = $id_departamento");
    $sql->execute();
    $result = $sql->fetchAll();

    $nome = $result[0]['nome'];
    $sigla = $result[0]['sigla'];
    $acao = 'atualizar';

} else {
    $titulo = 'Cadastrar';
    $nome = null;
    $sigla = null;
    $id_departamento = null;
    $acao = 'inserir';
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/departamentos.css">
</head>
<body>
<?php
include('menu.php');
?>
<div class="container">
    <h1><?php echo $titulo; ?> departamento</h1>
    <hr>

    <form method="POST" action="acao-departamentos.php" onsubmit="return validaDepto()">

        <div class="row">
            <div class="col-md-6 col-lg-3">
                <label for="nome">Nome:</label>
                <input value="<?php echo $nome; ?>" type="text" name="nome" id="nome" placeholder="digite o nome" class="form-control">
            </div>

            <div class="col-md-6 col-lg-3">
                <label for="sigla">Sigla:</label>
                <input value="<?php echo $sigla; ?>" type="text" name="sigla" id="sigla" placeholder="digite a sigla" class="form-control">
            </div>

            <div class="col-md-12 col-lg-2 text-center">

                <input type="hidden" name="id_departamento" value="<?php echo $id_departamento; ?>">
                <input type="hidden" name="acao" value="<?php echo $acao; ?>">

                <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-disk"></i> SALVAR</button>                
            </div>
        </div>

    </form>

    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-danger hidden" id="msg-erro">
                <i class="glyphicon glyphicon-warning-sign"></i> <span></span>
            </div>
        </div>
    </div>
    

    <div class="row">
        <div class="col-md-12 col-lg-1 text-center">    
            
            <a href="listar-departamentos.php" class="btn btn-success"><i class="glyphicon 
            glyphicon-chevron-left"></i> VOLTAR</a>

        </div>
    </div>
</div>

<script src="js/departamentos.js"></script>
</body>
</html>