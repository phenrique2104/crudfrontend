<?php
include('conexao.php');

# verifica se vai ser uma edição ou inserção
if(isset($_GET['id_departamento'])) {
    $id_departamento = $_GET['id_departamento'];
    $titulo = 'Alterar';

    $sql = $conn->prepare("SELECT * FROM DEPARTAMENTOS WHERE ID_DEPARTAMENTO = $id_departamento");
    $sql->execute();
    $result = $sql->fetchALL();

    $nome = $result[0]['nome'];
    $sigla = $result[0]['sigla'];
    $acao = 'atualizar';

} else {
    $titulo = 'Cadastrar';
    $nome = null;
    $sigla = ''; 
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

    <div class="container">
        <h1><?php echo $titulo; ?> Departamentos</h1>
        <hr>
        <form method="POST" action="acao-departamentos.php" onsubmit="return validaDepto()">

            <div class="row">
                <!-- maximo de 12 colunas senao quebra -->
                <div class="col-md-6 col-lg-3">
                    <label for="nome">Nome:</label>
                    <input value="<?php echo $nome;?>" type="text" name="nome" id="nome" placeholder="Digite o nome" class="form-control">
                </div>
                <div class="col-md-6 col-lg-3">
                    <label for="nome">Sigla:</label>
                    <input value="<?php echo $sigla;?>" type="text"  name="sigla" id="sigla" placeholder="Digite a sigla" class="form-control">
                </div>

                <div class="col-lg-2">
                    <input type="hidden" name="id_departamento" value="<?php echo $id_departamento; ?>">

                    <input type="hidden" name="acao" value="<?php echo $acao; ?>">

                    <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-disk"></i> SALVAR</button> 
                </div>
                
            </div>
        </form>

        
        <div class="row">
                <div class="col-lg-12">
                    <div class="alert alert-danger hidden"  id="msg-erro">
                        <i class="glyphicon glyphicon-warning-sign"></i> <span>ERRO DO USUÁRIO</span>
                    </div>
                </div>
            </div>

        <a href="listar-departamentos.php" class="btn btn-success"><i class="glyphicon glyphicon-chevron-left"></i> VOLTAR</a>
    </div>    

    <script src="js/departamentos.js"></script>

</body>
</html>