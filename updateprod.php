<?php

	require 'banco.php';

	$id = null;
	if ( !empty($_GET['id']))
            {
		$id = $_REQUEST['id'];
            }

	if ( null==$id )
            {
		header("Location: cadastroprod.php");
            }

	if ( !empty($_POST))
            {

		$nomeErro = null;
		$marcaErro = null;
		$valorErro = null;
                $descricaoErro = null;
                $modeloErro = null;

		$nome = $_POST['nome'];
		$marca = $_POST['marca'];
		$valor = $_POST['valor'];
                $descricao = $_POST['descricao'];
                $modelo = $_POST['modelo'];

		//Validação
		$validacao = true;
		if (empty($nome))
                {
                    $nomeErro = 'Por favor digite o nome do Produto!';
                    $validacao = false;
                }

		if (empty($marca))
                {
                    $marcaErro = 'Por favor digite a marca!';
                    $validacao = false;
		}
                

		if (empty($valor))
                {
                    $valorErro = 'Por favor digite o valor!';
                    $validacao = false;
		}

                if (empty($descricao))
                {
                    $descricaoErro = 'Por favor digite a descrição!';
                    $validacao = false;
		}

                if (empty($modelo))
                {
                    $modeloErro = 'Por favor digite o modelo!';
                    $validacao = false;
		}

		// update data
		if ($validacao)
                {
                    $pdo = Banco::conectar();
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = "UPDATE produto  set nomepord = ?, marcaprod = ?, valorprod = ?, descricaoprod = ?, modeloprod = ? WHERE idprod = ?";
                    $q = $pdo->prepare($sql);
                    $q->execute(array($nome,$marca,$valor,$descricao,$modelo,$id));
                    Banco::desconectar();
                    header("Location: cadastroprod.php");
		}
	}
        else
            {
                $pdo = Banco::conectar();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM produto where idprod = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($id));
		$data = $q->fetch(PDO::FETCH_ASSOC);
		$nome = $data['nomeprod'];
                $marca = $data['marcaprod'];
                $valor = $data['valorprod'];
		$descricao = $data['descricaoprod'];
		$modelo = $data['modeloprod'];
		Banco::desconectar();
	}
?>

    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
				<title>Atualizar Produto</title>
    </head>

    <body>
        <div class="container">

            <div class="span10 offset1">
							<div class="card">
								<div class="card-header">
                    <h3 class="well"> Atualizar Produto </h3>
                </div>
								<div class="card-body">
                <form class="form-horizontal" action="updateprod.php?id=<?php echo $id?>" method="post">

                    <div class="control-group <?php echo !empty($nomeErro)?'error':'';?>">
                        <label class="control-label">Nome</label>
                        <div class="controls">
                            <input name="nome" class="form-control" size="50" type="text" placeholder="Nome do Produto..." value="<?php echo !empty($nome)?$nome:'';?>">
                            <?php if (!empty($nomeErro)): ?>
                                <span class="help-inline"><?php echo $nomeErro;?></span>
                                <?php endif; ?>
                        </div>
                    </div>

                    <div class="control-group <?php echo !empty($marcaErro)?'error':'';?>">
                        <label class="control-label">Marca do Produto</label>
                        <div class="controls">
                            <input name="marca" class="form-control" size="80" type="text" placeholder="Marca..." value="<?php echo !empty($marca)?$marca:'';?>">
                            <?php if (!empty($marcaErro)): ?>
                                <span class="help-inline"><?php echo $marcaErro;?></span>
                                <?php endif; ?>
                        </div>
                    </div>

                    <div class="control-group <?php echo !empty($valorErro)?'error':'';?>">
                        <label class="control-label">Valor do Produto</label>
                        <div class="controls">
                            <input name="valor" class="form-control" size="30" type="number" placeholder="Valor do Produto..." value="<?php echo !empty($valor)?$valor:'';?>">
                            <?php if (!empty($valorErro)): ?>
                                <span class="help-inline"><?php echo $valorErro;?></span>
                                <?php endif; ?>
                        </div>
                    </div>

                    <div class="control-group <?php echo !empty($descricaoErro)?'error':'';?>">
                        <label class="control-label">Descrição do Produto</label>
                        <div class="controls">
                            <input name="descricao" class="form-control" size="100" type="text" placeholder="Descrição..." value="<?php echo !empty($descricao)?$descricao:'';?>">
                            <?php if (!empty($descricaoErro)): ?>
                                <span class="help-inline"><?php echo $descricaoErro;?></span>
                                <?php endif; ?>
                        </div>
                    </div>


                    <div class="control-group <?php echo !empty($modeloErro)?'error':'';?>">
                        <label class="control-label">Modelo do Produto</label>
                        <div class="controls">
                            <input name="modelo" class="form-control" size="50" type="text" placeholder="Modelo..." value="<?php echo !empty($modelo)?$modelo:'';?>">
                            <?php if (!empty($modeloErro)): ?>
                                <span class="help-inline"><?php echo $modeloErro;?></span>
                                <?php endif; ?>
                        </div>
                    </div>


                    <br/>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-warning">Atualizar</button>
                        <a href="cadastroprod.php" type="btn" class="btn btn-default">Voltar</a>
                    </div>
                </form>
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
