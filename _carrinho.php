<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
   
    <title>Life Style Celulares</title>
</head>
<style>
}
  footer .glyphicon {
    font-size: 20px;
    margin-bottom: 20px;
    color: #f4511e;
  }
</style>
<body>
        <div class="container">
          <div class="jumbotron">
            <div class="row">
                <h2>Carrinho de <span class="badge badge-secondary">Compras</span></h2>
            </div>
          </div>
            </br>
            <div class="row">
                <p>
                    <a href="createprod.php" class="btn btn-success">Continuar Comprando</a>
                    <a href="index.php" type="btn" class="btn btn-default">Voltar</a>
                </p>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Modelo</th>
                            <th scope="col">Marca</th>
                            <th scope="col">Valor</th>
                            <th scope="col">Total</th>
                        
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'bancoprod.php';
                        $pdo = Banco::conectar();
                        $sql = 'SELECT * FROM produto ORDER BY idprod DESC';

                        foreach($pdo->query($sql)as $row)
                        {
                            echo '<tr>';
			                      echo '<th scope="row">'. $row['idprod'] . '</th>';
                            echo '<td>'. $row['nomeprod'] . '</td>';
                            echo '<td>'. $row['marcaprod'] . '</td>';
                            echo '<td>'. $row['valorprod'] . '</td>';
                            $quantidade = $row['quantprod'];
                            $preco = $row['valorprod'];
                            $total = (($preco * $quantidade));
                            echo  $total;
                            echo '<td width=450>';
                            echo ' ';
                            echo '</td>';
                            echo '</tr>';
                        }
                        Banco::desconectar();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <hr>
</body>
</html>
