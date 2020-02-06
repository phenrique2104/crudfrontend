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
        <h1>Cadastrar Departamentos</h1>
        <hr>
        <form method="POST" action="acao-departamentos.php" onsubmit="return validaDepto()">
            <div class="row">
                <!-- maximo de 12 colunas senao quebra -->
                <div class="col-md-6 col-lg-3">
                    <label for="nome">Nome:</label>
                    <input type="text" name="nome" id="nome" placeholder="Digite o nome" class="form-control">
                </div>
                <div class="col-md-6 col-lg-3">
                    <label for="nome">Sigla:</label>
                    <input type="text" name="sigla" id="sigla" placeholder="Digite a sigla" class="form-control">
                </div>

                <div class="col-lg-2">

                    <input type="hidden" name="acao" value="inserir">

                    <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-disk"></i> SALVAR</button> 
                </div>
                
            </div>
        </form>
        <a href="listar-departamentos.php" class="btn btn-success"><i class="glyphicon glyphicon-chevron-left"></i> VOLTAR</a>
    </div>    

    <script src="js/departamentos.js"></script>

</body>
</html>