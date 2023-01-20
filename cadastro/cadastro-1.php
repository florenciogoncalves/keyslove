<!--
  Não permita o login caso haja alguma class="not-correct"
-->

<?php

session_start();

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Cadastro &mid; Keyslov</title>
  <link rel="shortcut icon" href="./../images/favicon.svg" type="image/x-icon" />
  <link rel="stylesheet" href="./../style/bootstrap.min.css">
  <link rel="stylesheet" href="./../style/css/cadastro.css" />
  <link rel="stylesheet" href="./../style/css/responsive-login.css" />
</head>

<body>
  <header class="header-content p-2 px-3 px-lg-4 row m-0">
    <a class="col-6 p-0" href="./../index.php"><img src="./../images/Keyslov.svg" class="header-logo img-fluid" alt="Keyslov" /></a>
    <nav class="header-controllers-container col-3 col-lg-2 row px-0 py-1">
      <a class="white-btn rounded col-10" href="../login.php">Entrar</a>
    </nav>
  </header>



  <div class="form-cadastro-container">



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


    <div class="cadastro-layout">
      <form action="./../_app/controllers/cadastro1-Controller.php" method="POST" id="form-cadastro1" novalidate>


        <h1>Cadastro de conta</h1>
        <label for="cad-email">Email</label>
        <input type="email" id="cad-email" name="email" placeholder="Insira seu email" required />
        <label for="cad-tel">Telefone</label>
        <input type="tel" name="telemovel" id="cad-tel" placeholder="+55(11) 9000000" required onkeypress="return event.charCode >= 48 && event.charCode <= 57" />
        <label for="cad-pass">Senha</label>
        <p class="erro-preenchimento info-erro-senha"></p>

        <input type="password" id="cad-pass" name="password" placeholder="*********" required />
        <label for="cad-confirm-pass">Senha de confirmação</label>
        <input type="password" id="cad-confirm-pass" placeholder="*********" required />
        <div class="checkbox">
          <input type="checkbox" id="accept-terms" required />
          <label for="accept-terms">Aceito a política de privacidade</label>
        </div>
        <button class="continue btn-register rounded" id="verify-pass" type="submit" name="btn-submit" value="btn">
          CADASTRAR
        </button>


      </form>
    </div>
  </div>

  <script src="./../script/cadastro.js"></script>
</body>

</html>