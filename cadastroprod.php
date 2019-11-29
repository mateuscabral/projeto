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
                <h2>Cadastro de <span class="badge badge-secondary">Produto</span></h2>
            </div>
          </div>
            </br>
            <div class="row">
                <p>
                    <a href="createprod.php" class="btn btn-success">Adicionar</a>
                    <a href="index.php" type="btn" class="btn btn-default">Voltar</a>
                </p>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Marca</th>
                            <th scope="col">Valor</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Modelo</th>
                            <th scope="col">Quantidade</th>
                            <th scope="col">Ação</th>
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
                            echo '<td>'. $row['descricaoprod'] . '</td>';
                            echo '<td>'. $row['modeloprod'] . '</td>';
                            echo '<td>'. $row['quantprod'] . '</td>';
                            echo '<td width=250>';
                            echo '<a class="btn btn-primary" href="readprod.php?id='.$row['idprod'].'">Info</a>';
                            echo ' ';
                            echo '<a class="btn btn-warning" href="updateprod.php?id='.$row['idprod'].'">Atualizar</a>';
                            echo ' ';
                            echo '<a class="btn btn-danger" href="deleteprod.php?id='.$row['idprod'].'">Excluir</a>';
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
                        <!-- Container (Portfolio Section) -->
<div id="portfolio" class="container-fluid text-center bg-grey">
  <h2>Produtos em Promoção</h2><br>
  <h4>Life Style Celulares! Dispositivos de qualidade você encontra aqui!</h4>
  <div class="row text-center slideanim">
    <div class="col-sm-4">
      <div class="thumbnail">
        <img src="img/h4-slide1.jpg" alt="Paris" width="400" height="300">
        <p><strong>Iphone Xmax</strong></p>
        <p>Por R$5.890,00</p>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="thumbnail">
        <img src="img/h4-slide4.jpg" alt="New York" width="400" height="300">
        <p><strong>Samsung Galaxy S10</strong></p>
        <p>Por R$8.890,00</p>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="thumbnail">
        <img src="img/h4-slide5.jpg" alt="San Francisco" width="400" height="300">
        <p><strong>Xiaomi Max</strong></p>
        <p>Por R$3.890,00</p>
      </div>
    </div>
  </div><br>
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>
