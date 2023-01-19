<?php
session_start();
if (!isset($_SESSION['step']) || $_SESSION['step'] < 2) {
  header("Location: ./cadastro-2.php");
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
  <link rel="stylesheet" href="./../style/css/responsive-login.css">
</head>

<body>

  <header class="header-content">
    <img src="./../images/Keyslov.svg" class="header-logo" />
    <nav class="header-controllers-container">

      <a href="./../login.php"><button class="white-btn">Entrar</button></a>
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
            $erro = $errors;
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
      <form action="./../_app/controllers/cadastro3-Controller.php" method="POST" id="form-cadastro3" novalidate>
        <h1>Localização</h1>
        <label for="">País</label>
        <input type="text" placeholder="Nome exemplo" required name="pais" />
        <label for="">Estado</label>
        <input type="text" placeholder="Nome exemplo" required name="estado" />
        <label for="">Cidade</label>
        <input type="text" placeholder="Nome exemplo" required name="cidade" />

        <button class="continue btn-register" type="submit" value="btn" name="btn-submit">CADASTRAR</button>
      </form>
    </div>
  </div>
  <script src="./../script/resize-windown.js"></script>
</body>

</html>