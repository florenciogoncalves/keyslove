<?php

session_start();

if (isset($_SESSION['username'])) {
  header("Location: ./home/");
}
?>

<!DOCTYPE html>
<html lang="pt-Br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login - Keyslov</title>
  <link rel="stylesheet" href="./style/css/logon.css" />
  <link rel="shortcut icon" href="./images/favicon.svg" type="image/x-icon" />
  <link rel="stylesheet" href="./style/bootstrap.min.css">
  <link rel="stylesheet" href="./style/login.css" />
  <link rel="stylesheet" href="./style/css/responsive-login.css" />
</head>

<body class="body-login especify">
  <header class="header-content header-login">
    <img src="./images/Keyslov.svg" style="visibility: hidden;" class="header-logo" />
    <nav class="header-controllers-container">
      <a href="./cadastro/cadastro-1.php"><button class="border-btn">Criar conta</button></a>
      <a href="index.html"><button class="white-btn">Entrar</button></a>
    </nav>
  </header>

  <?php
  if (isset($_SESSION['error'])) :
  ?>

    <div class="alert alert-danger text-center" role="alert">

      <?php
      if (isset($_SESSION['error'])) {
        foreach ($_SESSION['error'] as $errors) {
          echo $errors;
          unset($_SESSION['error']);
          unset($errors);
        }
      }

      ?>

    </div>

  <?php
  endif;
  ?>

  <div id="enter-box" class="logon-split">
    <div class="left-side">
      <div>
        <img src="./images/bg.png" />
        <h2>Encontre o seu verdadeiro amor!!</h2>
        <ul>
          <li>Lorem ipsum Exemplo</li>
          <li>Lorem ipsum Exemplo</li>
          <li>Lorem ipsum Exemplo</li>
          <li>Lorem ipsum Exemplo</li>
          <li>Lorem ipsum Exemplo</li>
        </ul>
      </div>
    </div>

    <form action="./_app/controllers/loginController.php" method="POST" class="right-side" novalidate>



      <img src="./images/favicon.svg" />
      <h1><span>K</span>eys<span>l</span>ov</h1>



      <input type="email" placeholder="Email" required name="email" />
      <input type="password" placeholder="Senha" required name="password" />
      <div>
        <span><input type="checkbox" id="lembrar-me" /><label for="lembrar-me">Lembrar de mim</label></span>
        <a href="#">Esqueci minha senha</a>
      </div>

      <a href="">
        <button type="submit">entrar na minha conta</button>
      </a>
      <a href="./cadastro/cadastro-1.php" class="criar-conta">criar conta</a>
    </form>
  </div>

  <footer>
    <div class="footer">
      <img class="img-links" src="./images/Logo branca.png" />
      <ul class="footer-links">
        <li class="item-footer"><a href="">Contacto</a></li>
        <li class="item-footer"><a href="">Sobre nós</a></li>
        <li class="item-footer"><a href="">Termos de serviços</a></li>
        <li class="item-footer"><a href="">Política de privacidade</a></li>
        <li class="item-footer"><a href="">Ajuda</a></li>
        <li class="item-footer"><a href="">Dicas de Segurança</a></li>
      </ul>
    </div>
    <p>Keyslov - © 2022 All Rights Reserved Feito com ♥ Widu</p>
  </footer>
  <script src="./script/resize-windown.js"></script>
</body>

</html>