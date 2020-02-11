<?php
include('valida-sessao.php');
include('conexao.php');

# verifica se vai ser uma edição ou inserção
if ( isset($_GET['id_funcionario']) ){
    $id_funcionario = $_GET['id_funcionario'];
    $titulo = 'Alterar';

    $sql = $conn->prepare("SELECT * FROM FUNCIONARIOS WHERE ID_FUNCIONARIO = $id_funcionario");
    $sql->execute();
    $result = $sql->fetchAll();

    $nome = $result[0]['nome'];
    $salario = $result[0]['salario'];
    $sexo = $result[0]['sexo'];
    $dt_nascimento = $result[0]['dt_nascimento'];
    $dt_admissao = $result[0]['dt_admissao'];
    $id_departamento = $result[0]['id_departamento'];
    $acao = 'atualizar';

} else {
    $titulo = 'Cadastrar';
    $nome = null;
    $salario = null;
    $sexo = null;
    $dt_nascimento = null;
    date_default_timezone_set('America/Sao_Paulo');
    $dt_admissao = date("Y-m-d");
    
    $id_funcionario = null;
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
    <link rel="stylesheet" href="css/funcionarios.css">
</head>
<body>
<?php
include('menu.php');
?>
<div class="container">
    <h1><?php echo $titulo; ?> funcionário</h1>
    <hr>

    <form method="POST" action="acao-funcionarios.php" onsubmit="return validaFuncionario()">

        <div class="row">
            <div class="col-md-6 col-lg-2">
                <label for="nome">Nome:</label>
                <input value="<?php echo $nome; ?>" type="text" name="nome" id="nome" placeholder="Digite o nome" class="form-control">
            </div>

            <div class="col-md-6 col-lg-2">
                <label for="salario">Salário:</label>
                <input value="<?php echo $salario; ?>" type="text" name="salario" id="salario" placeholder="Digite o salário" class="form-control">
            </div>

            <div class="col-md-6 col-lg-2">
                <input type="radio" name="sexo" id="masculino" value="M">
                <label for="masculino">Masculino: </label>
                
                <br>

                <input type="radio" name="sexo" id="feminino" value="F" checked>
                <label for="masculino">Feminino: </label>
                
            </div>

            <div class="col-md-6 col-lg-2">
                <label for="dt_nascimento">Data de Nascimento: </label>
                <input type="date" name="dt_nascimento" id="dt_nascimento" class="form-control">
            </div>
            
            <div class="col-md-6 col-lg-2">
                <label for="dt_admissao">Data de Admissão: </label>
                <input type="date" name="dt_admissao" id="dt_admissao" class="form-control" value="<?php echo $dt_admissao; ?>">
            </div>
        </div>
        <div class="row">

            <div class="col-md-6 col-lg-6">
                <label for="id_departamento">Deoartamento: </label>
                <select id="id_departamento" name="id_departamento" class="form-control">
                    <option value="00">Selecione</option>

                    <?php
                    
                        $sql_depto = $conn->prepare('SELECT * FROM DEPARTAMENTOS ORDER BY NOME');
                        $sql_depto->execute();
                        $result_depto = $sql_depto->fetchAll();

                        foreach ($result_depto as $d) {                   
                    ?>
                        <option value="<?php echo $d['id_departamento']; ?>"><?php echo $d['nome']; ?></option>
                    <?php
                    }
                    ?>

                </select>
            </div>

            <div class="col-md-12 col-lg-2 text-center">

                <input type="hidden" name="id_funcionario" value="<?php echo $id_funcionario; ?>">
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
            
            <a href="listar-funcionarios.php" class="btn btn-success"><i class="glyphicon 
            glyphicon-chevron-left"></i> VOLTAR</a>

        </div>
    </div>
</div>

<script src="js/funcionarios.js"></script>
</body>
</html>