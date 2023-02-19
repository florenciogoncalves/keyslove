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
    <nav class="header-controllers-container index row col-3 col-sm-2 col-md-1 col-lg-4 col-xl-4 col-xxl-2 p-0">
      <a class="btn border-btn d-none d-lg-flex col" href="./cadastro/cadastro-1.php">Criar conta</a>
      <a class="btn white-btn d-none d-lg-flex col" href="./login.php">Entrar</a>
      <div class="lang-selector row col-12 col-lg-2 p-0 ms-auto">
        <button class="btn __lang-br col col-lg-12" type="button"></button>
        <button class="btn __lang-in col col-lg-12" type="button"></button>
      </div>
    </nav>
  </header>

  <section id="menu-logon" class="mx-auto">

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

    <div id="enter-box" class="rounded my-lg-4 py-3 px-2 p-lg-4 px-sm-3 px-md-4 col-12 col-sm-8 col-md-6 col-lg-4">
      <h2 class="_title mb-2 mt-0">Seja bem vindo (a)</h2>
      <p class="_subtitle mb-3 px-2 px-sm-0">
        Lorem ipsum dolor sit amet. Est minima aliquam sit quia ratione aut
        nemo libero et necessitatibus dolorum
      </p>
      <div class="methods-continue row gap-2">
        <button class="google-continue continue col-11 mt-0"><img src="./images/google-icon.svg" class="img-fluid"> Continuar com google</button>
        <button class="facebook-continue continue col-11 mt-0"><img src="./images/facebook-icon.svg" class="img-fluid"> Continuar com Facebook</button>
      </div>
      <p class="__span-ou my-2 my-lg-2">Ou</p>
      <a class="continue btn-register col-11 mx-auto py-2" href="./cadastro/cadastro-1.php">Cadastra - se</a>
      <a class="__a-login mt-3 mt-lg-2 mx-auto" href="./login.php">Efectuar login</a>
    </div>

    <div class="messages d-none d-sm-flex px-2 px-lg-5">
      <h3>Off para indecisões</h3>
      <h3>On para atitudes</h3>
    </div>
  </section>

  <footer class="d-none d-md-flex">
    <div class="footer px-2 p-3 pb-2">
      <div class="img-links col-2 row gap-1">
        <a class="mx-auto logo-container" href="#">
          <img class="img-fluid mx-auto" src="./images/Logo branca.png" />
        </a>
        <div class="row p-0 col-9 mx-auto social-links ">
          <a class="col-3 d-flex" href="http://facebook.com" target="_blank"><img class="img-fluid mx-auto" src="./images/Vector.png" /></a>
          <a class="col-3 d-flex" href="http://whatsapp.com" target="_blank"><img class="img-fluid mx-auto" src="./images/Vector(1).png" /></a>
          <a class="col-3 d-flex" href="http://instagram.com" target="_blank"><img class="img-fluid mx-auto" src="./images/Vector(2).png" /></a>
          <a class="col-3 d-flex" href="http://twitter.com" target="_blank"><img class="img-fluid mx-auto" src="./images/Vector(3).png" /></a>
        </div>
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