<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <title>Life Style - Adicionar Produto</title>
</head>

<body>
    <div class="container">
        <div clas="span10 offset1">
          <div class="card">
            <div class="card-header">
                <h3 class="well"> Adicionar Produto </h3>
            </div>
            <div class="card-body">
            <form class="form-horizontal" action="createprod.php" method="post">

                <div class="control-group <?php echo !empty($nomeErro)?'error ' : '';?>">
                    <label class="control-label">Nome</label>
                    <div class="controls">
                        <input size="50" class="form-control" name="nome" type="text" placeholder="Nome do Produto" required="" value="<?php echo !empty($nome)?$nome: '';?>">
                        <?php if(!empty($nomeErro)): ?>
                            <span class="help-inline"><?php echo $nomeErro;?></span>
                            <?php endif;?>
                    </div>
                </div>

                <div class="control-group <?php echo !empty($enderecoErro)?'error ': '';?>">
                    <label class="control-label">Marca do Produto</label>
                    <div class="controls">
                        <input size="80" class="form-control" name="marca" type="text" placeholder="Marca do Produto" required="" value="<?php echo !empty($marca)?$marca: '';?>">
                        <?php if(!empty($marcaErro)): ?>
                            <span class="help-inline"><?php echo $marcaErro;?></span>
                            <?php endif;?>
                    </div>
                </div>

                <div class="control-group <?php echo !empty($telefoneErro)?'error ': '';?>">
                    <label class="control-label">Valor do Produto</label>
                    <div class="controls">
                        <input size="35" class="form-control" name="valor" type="text" placeholder="Valor do Produto" required="" value="<?php echo !empty($valor)?$valor: '';?>">
                        <?php if(!empty($valorErro)): ?>
                            <span class="help-inline"><?php echo $valorErro;?></span>
                            <?php endif;?>
                    </div>
                </div>

                <div class="control-group <?php echo !empty($emailErro)?'error ': '';?>">
                    <label class="control-label">Descrição do Produto</label>
                    <div class="controls">
                        <input size="40" class="form-control" name="descricao" type="text" placeholder="Descrição do Produto" required="" value="<?php echo !empty($descricao)?$descricao: '';?>">
                        <?php if(!empty($emailErro)): ?>
                            <span class="help-inline"><?php echo $descricaoErro;?></span>
                            <?php endif;?>
                    </div>
                </div>

                <div class="control-group <?php echo !empty($sexoErro)?'error ': '';?>">
                    <label class="control-label">Modelo do Produto</label>
                    <div class="controls">
                    <div class="controls">
                        <input size="40" class="form-control" name="modelo" type="text" placeholder="Modelo do Produto" required="" value="<?php echo !empty($modelo)?$modelo: '';?>">
                        <?php if(!empty($modeloErro)): ?>
                            <span class="help-inline"><?php echo $modeloErro;?></span>
                            <?php endif;?>
                    </div>
                </div>
                <div class="form-actions">
                    <br/>

                    <button type="submit" class="btn btn-success">Adicionar</button>
                    <a href="cadastroprod.php" type="btn" class="btn btn-default">Voltar</a>

                </div>
            </form>
          </div>
        </div>
        </div>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>

<?php
    require 'bancoprod.php';

    if(!empty($_POST))
    {
        //Acompanha os erros de validação
        $nomeErro = null;
        $marcaErro = null;
        $valorErro = null;
        $descricaoErro = null;
        $modelpErro = null;

        $nome = $_POST['nome'];
        $marca = $_POST['marca'];
        $valor = $_POST['valor'];
        $descricao = $_POST['descricao'];
        $modelo = $_POST['modelo'];

        //Validaçao dos campos:
        $validacao = true;
        if(empty($nome))
        {
            $nomeErro = 'Por favor digite o seu nome!';
            $validacao = false;
        }

        if(empty($marca))
        {
            $marcaErro = 'Por favor digite o seu endereço!';
            $validacao = false;
        }

        if(empty($valor))
        {
            $valorErro = 'Por favor digite o número do telefone!';
            $validacao = false;
        }

        if(empty($descricao))
        {
            $descricaoErro = 'Por favor digite o endereço de email';
            $validacao = false;
        }
        if(empty($modelo))
        {
            $modeloErro = 'Por favor digite o endereço de email';
            $validacao = false;
        }
        


        //Inserindo no Banco:
        if($validacao)
        {
            $pdo = Banco::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO produto (nomeprod,marcaprod, valorprod, descricaoprod, modeloprod) VALUES(?,?,?,?,?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($nome,$marca,$valor,$descricao,$modelo));
            Banco::desconectar();
            header("Location: cadastroprod.php");
        }
    }
?>
