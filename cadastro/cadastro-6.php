<?php

require __DIR__ . "/../_app/models/Support.php";
require __DIR__ . "/../_app/boot/mail.php";

session_start();

if (!isset($_SESSION['step']) || $_SESSION['step'] < 5) {
  header("Location: ./cadastro-2.php");
}

if (isset($_SESSION['username']) && isset($_SESSION['userEmail'])) {
  $user = $_SESSION['username'];
  $emailUser = $_SESSION['userEmail'];
}

$support = new Support($emailUser, $user);

if ($support->count() <= 0) {
  $userCode = generateVerificationCode();
  $support->saveInfoVerification($userCode);
  $body = "
<body>
<h1 style='text-align: center'>A Equipa do Keyslove</h1>
<p></p>
<div style='text-align: center'>
<p>Olá Sr(a) <b>{$user}</b> O seu código de confirmação é : {$userCode}</p>
</div>
</body>
";
  // $mailer = new Email();
  // $mailer->bootstrap('Ative a sua conta', $body, $emailUser, $user)->send();
  // echo $mailer->getMessage();
} else {
  $support->verifyLimit();
}


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
  <link rel="stylesheet" href="./../style/cadastro.css" />
  <link rel="stylesheet" href="./../style/responsive-login.css" />
</head>

<body>
  <header class="header-content">
    <img src="./../images/Keyslov.svg" class="header-logo" />
    <nav class="nav-btn">
      <a href="../login.php"><button class="white-btn" name="submit">Entrar</button></a>
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
      <form action="./../_app/controllers/Cadastro6-Controller.php" method="POST" id="form-cadastro6">
        <h1 id="h1">Código de confirmação</h1>
        <p class="p6">


          Olá Sr(a) <?php
                    echo $_SESSION['username'];


                    if (isset($_SESSION['expired_alert'])) {
                      foreach ($_SESSION['expired_alert'] as $errors) {
                        $text2 = $errors;
                        unset($_SESSION['expired_alert']);
                        unset($errors);
                      }
                    }


                    $text1 = "Por favor, Verifique o seu e-mail. Acabamos de enviar o código de confirmação para activar a sua conta. ";

                    if (isset($_SESSION['username'])) {
                    } ?>. <?php if (isset($text2)) {
                            echo $text2;
                          } else {
                            echo $text1;
                          } ?><br>
        </p>

        <section id="password-section">
          <div id="insert-password">
            <!-- Este input recebe o valor completo da password-otp que é inserida por fatias -->
            <input type="password" id="otp-pass" name="otp-pass" style="display: none">

            <input type="password" class="pass-camp" maxlength="1" required />
            <input type="password" class="pass-camp" maxlength="1" required />
            <input type="password" class="pass-camp" maxlength="1" required />
            <input type="password" class="pass-camp" maxlength="1" required />
          </div>
        </section>

        <div>
          <button id="requisicao-otp" class="continue btn-register">Enviar</button>
          <button class="continue btn-register" type="button">
            Reenviar
          </button>
        </div>
      </form>
    </div>
  </div>
  <script src="./../script/cadastro.js"></script>
  <script src="./../script/resize-windown.js"></script>
</body>

</html>