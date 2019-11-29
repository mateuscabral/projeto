<?php

  session_start();

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <!-- Latest compiled and minified CSS -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <title>Life Style Celulares</title>
</head>

<style>
* {box-sizing: border-box}
body {font-family: Verdana, sans-serif; margin:0}
.mySlides {display: none}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 500px;
  position: relative;
  margin: auto;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 100px) {
  .prev, .next,.text {font-size: 11px}
}
body {font-family: Arial, Helvetica, sans-serif;}

.navbar {
  width: 100%;
  background-color: #555;
  overflow: auto;
}

.navbar a {
  float: left;
  padding: 12px;
  color: white;
  text-decoration: none;
  font-size: 17px;
}

.navbar a:hover {
  background-color: #000;
}

.active {
  background-color: #4CAF50;
}

@media screen and (max-width: 100px) {
  .navbar a {
    float: none;
    display: block;
  }
}
  footer .glyphicon {
    font-size: 20px;
    margin-bottom: 20px;
    color: #f4511e;
  }
</style>
<body>
<div class="navbar" id="#index">
  <a class="active" href="index.php"><i class="fa fa-fw fa-home"></i> Inicial</a> 
  <a href="cadastrocliente.php"><i class="fa fa-user"></i> Cadastro de Cliente</a> 
  <a href="cadastroprod.php"><i class="fa fa-fw fa-envelope"></i> Cadastro de Produto</a> 
  <a href="cadastrofun.php"><i class="fa fa-male"></i> Cadastro de Funcionário</a>
  <a href="_carrinho.php"><i class="fa fa-car" ></i> Carrinho</a> 
  <a href="logout.php"><i class="fa fa-arrow-left"></i> Sair</a>
   
</div>    
<div class="container jumbotron">

<h2>Olá <?php echo $_SESSION['login']; ?>!</h2> 
<?php echo date('d/m/y H:i:s');
//resultado: 2017/02/15 14:29:14?> 
<hr>
<a href="logout.php"><i class="fa fa-arrow-left"></i> Sair</a> 

</div>
<hr>
<div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 3</div>
  <img src="img/freestylelogo.jpg" style="width:100%">
  <div class="text">Próximo</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 3</div>
  <img src="img/freestylelogo.jpg" style="width:100%">
  <div class="text">Próximo</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div>
  <img src="img/freestylelogo.jpg" style="width:100%">
  <div class="text">Próximoe</div>
</div>

<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>

</div>
<br>

<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
</div>
<!-- Container (Portfolio Section) -->
<div id="portfolio" class="container-fluid text-center bg-grey">
  <h2>Produtos em promoção</h2><br>
  <h4>Life Style Celulares melhor loja para comprar o seu novo celular.</h4>
  <div class="row text-center slideanim">
    <div class="col-sm-4">
      <div class="thumbnail">
        <img src="img/h4-slide1.jpg" alt="Paris" width="400" height="300">
        <p><strong>Iphone X</strong></p>
        <p>Por R$5.890,00</p>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="thumbnail">
        <img src="img/h4-slide2.jpg" alt="New York" width="400" height="300">
        <p><strong>Iphone Xmax</strong></p>
        <p>Por R$5.890,00</p>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="thumbnail">
        <img src="img/h4-slide4.jpg" alt="San Francisco" width="400" height="300">
        <p><strong>Galaxy S10+</strong></p>
        <p>Por R$5.890,00</p>
      </div>
    </div>
  </div><br>
<footer class="container-fluid text-center">
  <a href="#index" title="To Top">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a>
  <p> <a href="https://.com" title="Visit w3schools">www.w3schools.com</a></p>
</footer>
</body>
<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  

}
</script>
</html>
