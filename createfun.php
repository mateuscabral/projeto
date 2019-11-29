<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <title>Life Style Adicionar Funcionário</title>
</head>

<body>
    <div class="container">
        <div clas="span10 offset1">
          <div class="card">
            <div class="card-header">
                <h3 class="well"> Adicionar Funcionário </h3>
            </div>
            <div class="card-body">
            <form class="form-horizontal" action="createfun.php" method="post">

            <div class="control-group <?php echo !empty($loginErro)?'error ': '';?>">
                    <label class="control-label">Login Funcionário</label>
                    <div class="controls">
                        <input size="35" class="form-control" name="login" type="text" placeholder="Login..." required="" value="<?php echo !empty($login)?$login: '';?>">
                        <?php if(!empty($loginErro)): ?>
                            <span class="help-inline"><?php echo $loginErro;?></span>
                            <?php endif;?>
                    </div>
                </div>
                <div class="control-group <?php echo !empty($senhaErro)?'error ': '';?>">
                    <label class="control-label">Senha</label>
                    <div class="controls">
                        <input size="35" class="form-control" name="senha" type="password" placeholder="Senha..." required="" value="<?php echo !empty($senha)?$senha: '';?>">
                        <?php if(!empty($senhaErro)): ?>
                            <span class="help-inline"><?php echo $senhaErro;?></span>
                            <?php endif;?>
                    </div>
                </div>

                <div class="control-group <?php echo !empty($senhaErro)?'error ': '';?>">
                    <label class="control-label">Novamente a sua Senha</label>
                    <div class="controls">
                        <input size="35" class="form-control" name="" type="password" placeholder="Novamente a sua Senha..." required="" value="<?php echo !empty($senha)?$senha: '';?>">
                        <?php if(!empty($senhaErro)): ?>
                            <span class="help-inline"><?php echo $senhaErro;?></span>
                            <?php endif;?>
                    </div>
                </div>

                <div class="control-group <?php echo !empty($cargoErro)?'error ': '';?>">
                    <label class="control-label">Cargo do Funcionário</label>
                    <div class="controls">
                        <input size="80" class="form-control" name="cargo" type="text" placeholder="Cargo..." required="" value="<?php echo !empty($cargo)?$cargo: '';?>">
                        <?php if(!empty($cargoErro)): ?>
                            <span class="help-inline"><?php echo $cargoErro;?></span>
                            <?php endif;?>
                    </div>
                </div>

                <div class="control-group <?php echo !empty($statusErro)?'error ': '';?>">
                    <label class="control-label">Status</label>
                    <div class="controls">
                        <input size="40" class="form-control" name="status" type="text" placeholder="Status..." required="" value="<?php echo !empty($status)?$status: '';?>">
                        <?php if(!empty($statusErro)): ?>
                            <span class="help-inline"><?php echo $statusErro;?></span>
                            <?php endif;?>
                    </div>
                </div>
                 <div class="control-group <?php echo !empty($nomeErro)?'error ' : '';?>">
                    <label class="control-label">Nome do Funcionário</label>
                    <div class="controls">
                        <input size="100" class="form-control" name="nome" type="text" placeholder="Nome..." required="" value="<?php echo !empty($nome)?$nome: '';?>">
                        <?php if(!empty($nomeErro)): ?>
                            <span class="help-inline"><?php echo $nomeErro;?></span>
                            <?php endif;?>
                    </div>
                </div>

                <div class="form-actions">
                    <br/>

                    <button type="submit" class="btn btn-success">Adicionar</button>
                    <a href="cadastrofun.php" type="btn" class="btn btn-default">Voltar</a>

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
    require 'banco.php';

    if(!empty($_POST))
    {
        //Acompanha os erros de validação
        $loginErro = null;
        $senhaErro = null;
        $cargoErro = null;
        $statusErro = null;
        $nomeErro = null;

        $login = $_POST['login'];
        $senha = $_POST['senha'];
        $cargo= $_POST['cargo'];
        $status = $_POST['status'];
        $nome = $_POST['nome'];

        //Validaçao dos campos:
        $validacao = true;
        if(empty($login))
        {
            $loginErro = 'Por favor digite o seu login!';
            $validacao = false;
        }

        if(empty($senha))
        {
            $senhaErro = 'Por favor digite a sua senha!';
            $validacao = false;
        }

        if(empty($cargo))
        {
            $cargoErro = 'Por favor digite o seu cargo!';
            $validacao = false;
        }

        if(empty($status))
        {
            $statusErro = 'Por favor digite o seu status com apenas 1 A/I!';
            $validacao = false;
        }
        
        if(empty($nome))
        {
            $nomeErro = 'Por favor digite o seu nome';
            $validacao = false;
        }

        //Inserindo no Banco:
        if($validacao)
        {
            $pdo = Banco::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO usuario (loginUsuario, senhaUsuario, cargoUsuario, nomeUsuario, statusUsuario) VALUES(?,?,?,?,?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($login,$senha,$cargo,$status,$nome));
            Banco::desconectar();
            header("Location: cadastrofun.php");
        }
    }
?>
