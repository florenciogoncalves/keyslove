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
  <title>Conecte-se - Keyslov</title>
  <link rel="stylesheet" href="./style/bootstrap.min.css" />
  <link rel="stylesheet" href="./style/css/logon.css" />
  <link rel="shortcut icon" href="./images/favicon.svg" type="image/x-icon" />
  <link rel="stylesheet" href="./style/css/responsive-login.css" />
</head>

<body class="especify m-0 p-0">
  <header class="header-content row">
    <a class="header-logo-content col-auto p-0" href="./"><img src="./images/Keyslov.svg" class="__header-logo img-fluid" /></a>
    <nav class="header-controllers-container index row col-2 col-md-1 col-lg-4 col-xl-3 col-xxl-2 p-0">
      <a class="btn border-btn d-none d-lg-flex col" href="./cadastro/cadastro-1.php">Criar conta</a>
      <a class="btn white-btn d-none d-lg-flex col" href="./login.php">Entrar</a>
      <div class="lang-selector row col-12 col-lg-1 p-0 ms-auto">
        <button class="btn __lang-br col col-lg-12" type="button"></button>
        <button class="btn __lang-in col col-lg-12" type="button"></button>
      </div>
    </nav>
  </header>

  <section id="menu-logon">


    <?php
    if (isset($_SESSION['messageAuth'])) :
    ?>

      <div class="alert alert-danger text-center" role="alert">

        <?php
        if (isset($_SESSION['messageAuth'])) {
          // foreach ($_SESSION['messageAuth'] as $errors) {
          //   echo $errors;
          echo $_SESSION['messageAuth'];
          unset($_SESSION['messageAuth']);
          // unset($errors);
        }


        ?>

      </div>

    <?php
    endif;
    ?>

    <div id="enter-box" class="container">
      <h2 class="_title">Seja bem vindo (a)</h2>
      <p class="_subtitle">
        Lorem ipsum dolor sit amet. Est minima aliquam sit quia ratione aut
        nemo libero et necessitatibus dolorum
      </p>
      <div class="methods-continue">
        <button class="google-continue continue">Continuar com google</button>
        <button class="facebook-continue continue">
          Continuar com Facebook
        </button>
      </div>
      <p class="_span-ou">Ou</p>
      <a href="./cadastro/cadastro-1.php"><button class="continue btn-register">Cadastra - se</button></a>
      <a href="./login.php">Efectuar login</a>
    </div>
    <div class="messages">
      <h3>Off para indecisões</h3>
      <h3>On para atitudes</h3>
    </div>
  </section>
  <footer class="d-none d-lg-flex">
    <div class="footer">
      <div class="img-links">
        <a href="#"><img src="./images/Logo branca.png" /></a>
        <div>
          <a href="http://facebook.com" target="_blank"><img src="./images/Vector.png" /></a>
          <a href="http://whatsapp.com" target="_blank"><img src="./images/Vector(1).png" /></a>
          <a href="http://instagram.com" target="_blank"><img src="./images/Vector(2).png" /></a>
          <a href="http://twitter.com" target="_blank"><img src="./images/Vector(3).png" /></a>
        </div>
      </div>
      <ul class="footer-links">
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