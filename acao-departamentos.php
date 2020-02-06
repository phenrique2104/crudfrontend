<?php
include('conexao.php');

if(isset($_POST['acao'])) {
    $acao = $_POST['acao'];

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
            echo 'atualiza no banco';
        break;
        case 'excluir':
            echo 'exclui no banco';
        break;
        default:
            # nao aceita fazer nada
        break;    
    }

}

# nao recebeu a variavel acao - redirect
header('location:listar-departamentos.php');

?>