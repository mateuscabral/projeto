<?php

  class UsuarioDAO {
    private $conexao;

    public function __construct() {
      $this->conexao = new Conexao();
    }

    // efetua login
    public function login($login, $senha) {

      $sql = "SELECT * FROM usuario WHERE loginUsuario = '$login' AND senhaUsuario = '$senha'";

      $executa = mysqli_query($this->conexao->getCon(), $sql);

      if(mysqli_num_rows($executa) > 0) {
        return true;
      } else {
        return false;
      }
    }


    // Verifica se já existe login com o nome escolhido
    public function unico($login) {

      $unic = "SELECT * FROM usuario WHERE loginUsuario = '$login'";

      $exec = mysqli_query($this->conexao->getCon(), $unic);

      if(mysqli_num_rows($exec) > 0) {
        return false;
      } else {
        return true;
      }
    }

  

    // efetua logout
    public function logout() {

      session_start();

      session_destroy();

      //setcookie("login" , "" , time()-60*5);
      header("Location:login.php?success=logout");
      exit();
    }

  }
