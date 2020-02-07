<?php
include('conexao.php');

if(isset($_REQUEST['acao'])) {
    $acao = $_REQUEST['acao'];
    // echo $acao;exit;
    switch ($acao) {
        case 'inserir':
            if( isset($_POST['nome']) && isset($_POST['sigla'])) {
                # remove com o trim todos os espaços duplicados do campo, se tiver só espaços a string ficará vazia
                $nome = trim($_POST['nome']);
                $sigla = trim($_POST['sigla']);
                
                #valida se veio algo dentro das variáveis
                if (strlen($nome)  > 0 && strlen($sigla)  > 0) {
                // agora sim insere no banco
                $sql = $conn->prepare("INSERT INTO DEPARTAMENTOS (NOME, SIGLA)
                                        VALUES ('$nome', '$sigla')");
                $sql->execute();
                }
            }
        break;
        case 'atualizar':
            if(isset($_POST['nome']) && isset($_POST['sigla']) && isset($_POST['id_departamento'])) {
                $nome = trim($_POST['nome']);
                $sigla = trim($_POST['sigla']);
                $id_departamento = $_POST['id_departamento'];
                #valida se veio algo dentro das variáveis
                if (strlen($nome)  > 0 && strlen($sigla)  > 0) {
                $sql = $conn->prepare("UPDATE DEPARTAMENTOS SET 
                                        NOME = '$nome', 
                                        SIGLA = '$sigla'
                                        WHERE ID_DEPARTAMENTO = $id_departamento");
                $sql->execute();
            }
        }
            
        break;
        case 'excluir':
            if (isset($_GET['id_departamento'])) {
                
                $id_departamento = $_GET['id_departamento'];
                $sql = $conn->prepare("DELETE FROM DEPARTAMENTOS WHERE ID_DEPARTAMENTO = $id_departamento");
                $sql->execute();
                
                
            }
                
        break;
        default:
            # nao aceita fazer nada
            header('location:listar-departamentos.php');
        break;    
    }

}

# nao recebeu a variavel acao - redirect
header('location:listar-departamentos.php');

?>