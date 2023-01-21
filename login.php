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
  <link rel="shortcut icon" href="./images/favicon.svg" type="image/x-icon" />
  <link rel="stylesheet" href="./style/bootstrap.min.css">
  <link rel="stylesheet" href="./style/css/logon.css" />
  <link rel="stylesheet" href="./style/css/login.css" />
  <link rel="stylesheet" href="./style/css/responsive-login.css" />
</head>

<body class="body-login especify">
  <header class="header-content row d-none d-lg-flex">
    <nav class="header-controllers-container index row ms-auto col-2 col-sm-1 col-md-1 col-lg-3 col-xl-4 col-xxl-2 p-0">
      <a class="btn border-btn d-none d-lg-flex col" href="./cadastro/cadastro-1.php">Criar conta</a>
      <a class="btn white-btn d-none d-lg-flex col" href="./login.php">Entrar</a>
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

  <div id="enter-box" class="logon-split row col-lg-9 col-xl-8 col-xxl-7 m-auto rounded-3">
    <div class="left-side col d-none d-lg-flex p-3">
      <div class="left-container p-2 rounded-3">
        <img class="mx-auto my-3 img-fluid" src="./images/bg.png" />
        <h2>Encontre o seu verdadeiro amor!!</h2>
        <ul class="ps-3">
          <li>Lorem ipsum Exemplo</li>
          <li>Lorem ipsum Exemplo</li>
          <li>Lorem ipsum Exemplo</li>
          <li>Lorem ipsum Exemplo</li>
          <li>Lorem ipsum Exemplo</li>
        </ul>
      </div>
    </div>

    <form action="./_app/controllers/loginController.php" method="POST" class="right-side col-12 col-lg-7 px-4" novalidate>

<div class="right-container my-auto py-4">
  <fieldset class="logo col-11 mx-auto row">
        <img class="img-fluid col-4 col-lg-3 mx-auto" src="./images/favicon.svg" alt="Keyslov" />
        <h1 class="col-auto mx-auto"><span class="_text--red">K</span>eys<span class="_text--red">l</span>ov</h1>
      </fieldset>

      <fieldset class="campos gap-2 row col-11 mx-auto mt-2">
        <input class="px-2 py-2" type="email" placeholder="Email" required name="email" />
        <input class="px-2 py-2" type="password" placeholder="Senha" required name="password" />
      </fieldset>


      <fieldset class="others-options col-11 mx-auto my-3 row">
        <span class="col-6 p-0 remember-me-container gap-1"><input type="checkbox" id="lembrar-me" /><label for="lembrar-me">Lembrar de mim</label></span>
        <a class="col-6 p-0" href="#">Esqueci minha senha</a>
      </fieldset>

      <fieldset class="col-11 mx-auto row gap-2">
        <button class="btn-register rounded py-2" type="submit">entrar na minha conta</button>
        <a class="criar-conta rounded py-2" href="./cadastro/cadastro-1.php">criar conta</a>
      </fieldset>
</div>

    </form>
  </div>

  <footer class="d-none d-lg-flex mt-3">
    <div class="footer px-2 p-3 pb-2">
      <div class="img-links col-2 row gap-1">
        <a class="mx-auto logo-container" href="#">
          <img class="img-fluid mx-auto" src="./images/Logo branca.png" />
        </a>
      </div>
      <ul class="footer-links py-2">
        <li class="item-footer"><a href="">Contacto</a></li>
        <li class="item-footer"><a href="">Sobre nós</a></li>
        <li class="item-footer"><a href="">Termos de serviços</a></li>
        <li class="item-footer"><a href="">Política de privacidade</a></li>
        <li class="item-footer"><a href="">Ajuda</a></li>
        <li class="item-footer"><a href="">Dicas de Segurança</a></li>
      </ul>
    </div>
    <p class="_brand-mkti">Keyslov - © 2022 All Rights Reserved Feito com ♥ Widu</p>
  </footer>
</body>

</html>