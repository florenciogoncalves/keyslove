<?php
session_start();
if (!isset($_SESSION['step'])) {
  header("Location: ./cadastro-1.php");
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
  <link rel="stylesheet" href="./../style/css/responsive-login.css" />
</head>

<body>
  <header class="header-content">
    <img src="./../images/Keyslov.svg" class="header-logo" />
    <nav class="header-controllers-container">
      <a href="../login.php"><button class="white-btn">Entrar</button></a>
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
      <form action="./../_app/controllers/cadastro2-Controller.php" method="POST" id="form-cadastro2" novalidate>
        <h1>Cadastro de conta</h1>
        <label for="">Nome</label>
        <input type="text" placeholder="Nome exemplo" name="nome" required />
        <label for="">Data de nascimento</label>
        <div class="the-date">
          <select class="continue select-placeholder" id="born-day" required name="dia-nascimento">
            <option selected hidden disabled value="">01</option>
          </select>

          <select class="continue select-placeholder" id="born-month" required name="mes-nascimento">
            <option selected hidden disabled value="">01</option>
          </select>

          <select class="continue select-placeholder" id="born-year" required name="ano-nascimento">
            <option selected hidden disabled value="" id="first-year">
              e
            </option>
          </select>
        </div>

        <label for="" style="margin-top: 20px">Gênero</label>

        <div class="the-genre">
          <input type="radio" name="genre" id="male" value="Masculino" required />
          <label for="male">Masculino</label>

          <input type="radio" name="genre" id="female" value="Feminino" />
          <label for="female">Feminino </label>

          <input type="radio" name="genre" id="other" value="Outro" />
          <label for="other">Outro... </label>
        </div>

        <button class="continue btn-register" name="btn-submit" value="btn">CADASTRAR</button>
      </form>

      <script src="./../script/cadastro.js"></script>
    </div>
  </div>
</body>

</html>