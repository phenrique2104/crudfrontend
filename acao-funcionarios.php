<?php
include('conexao.php');

if (isset($_REQUEST['acao'])) {
    $acao = $_REQUEST['acao'];

    switch ($acao) {
        case 'inserir':
            if ( isset($_POST['nome']) && 
                 isset($_POST['salario']) &&
                 isset($_POST['sexo']) &&
                 isset($_POST['dt_nascimento']) &&
                 isset($_POST['dt_admissao'])  &&
                 isset($_POST['id_departamento'])
                 ) {
                # remove com o trim todos espaços duplicados do campo
                # se tiver só espaços a string ficará VAZIA!
                $nome = trim($_POST['nome']);
                $salario = $_POST['salario'];
                $sexo = $_POST['sexo'];
                $dt_nascimento = $_POST['dt_nascimento'];
                $dt_admissao = $_POST['dt_admissao'];
                $id_departamento = $_POST['id_departamento'];


                # valida se veio algo dentro das variaveis
                if (strlen($nome) > 0 && strlen($salario) > 0) {
                    # agora sim insere no banco!
                    $query = "INSERT INTO FUNCIONARIOS 
                                (NOME, SALARIO, SEXO, DT_NASCIMENTO, DT_ADMISSAO, ID_DEPARTAMENTO)
                                 VALUES
                                ('$nome', '$salario', '$sexo', '$dt_nascimento', '$dt_admissao', '$id_departamento')";
                    $sql = $conn->prepare($query);
                    // echo $query;
                    // exit;

                    $sql->execute();
                }
            }

        break;
        case 'atualizar':
            if ( isset($_POST['nome']) && isset($_POST['sigla']) && isset($_POST['id_funcionario']) ) {
                $nome = trim($_POST['nome']);
                $sigla = trim($_POST['sigla']);
                $id_funcionario = $_POST['id_funcionario'];

                # valida se veio algo dentro das variaveis
                if (strlen($nome) > 0 && strlen($sigla) > 0) {
                    
                    $sql = $conn->prepare("UPDATE FUNCIONARIOS SET 
                                            NOME = '$nome',
                                            SIGLA = '$sigla'
                                            WHERE ID_FUNCIONARIO = $id_funcionario");
                    $sql->execute();

                }
            }
        break;
        case 'excluir':
            if (isset($_GET['id_funcionario'])) {
                $id_funcionario = $_GET['id_funcionario'];

                $sql = $conn->prepare("DELETE FROM FUNCIONARIOS WHERE ID_FUNCIONARIO = $id_funcionario");
                $sql->execute();
            }
        break;
        default:
            # nao aceita fazer nada
            header('location:listar-funcionarios.php');
        break;
    }

}

# nao recebeu a variavel acao - redirect
header('location:listar-funcionarios.php');

?>