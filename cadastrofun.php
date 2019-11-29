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
                <h2>Cadastro de acesso ao sistema de <span class="badge badge-secondary">Funcionário</span></h2>
            </div>
          </div>
            </br>
            <div class="row">
                <p>
                    <a href="createfun.php" class="btn btn-success">Adicionar</a>
                    <a href="index.php" type="btn" class="btn btn-default">Voltar</a>
                </p>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Id Funcionário</th>
                            <th scope="col">Status</th>
                            <th scope="col">Cargo do Funcionário</th>
                            <th scope="col">Login Funcionário</th>
                            <th scope="col">Nome do Funcionário</th>
                            <th scope="col">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'bancoprod.php';
                        $pdo = Banco::conectar();
                        $sql = 'SELECT * FROM usuario ORDER BY idUsuario DESC';

                        foreach($pdo->query($sql)as $row)
                        {
                            echo '<tr>';
                            echo '<th scope="row">'. $row['idUsuario'] . '</th>';
                            echo '<td>'. $row['statusUsuario'] . '</td>';
                            echo '<td>'. $row['cargoUsuario'] . '</td>';
                            echo '<td>'. $row['loginUsuario'] . '</td>';
                            echo '<td>'. $row['nomeUsuario'] . '</td>';
                            echo '<td width=250>';
                            echo '<a class="btn btn-danger" href="deletefun.php?id='.$row['idUsuario'].'">Excluir</a>';
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
  <h2>Produtos em promoção</h2><br>
  <h4>Life Style Celulares melhor loja para comprar o seu novo celular.</h4>
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
        <img src="img/h4-slide1.jpg" alt="New York" width="400" height="300">
        <p><strong>Iphone Xmax</strong></p>
        <p>Por R$5.890,00</p>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="thumbnail">
        <img src="img/h4-slide1.jpg" alt="San Francisco" width="400" height="300">
        <p><strong>Iphone Xmax</strong></p>
        <p>Por R$5.890,00</p>
      </div>
    </div>
  </div><br>