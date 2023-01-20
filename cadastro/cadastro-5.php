<?php
session_start();
if (!isset($_SESSION['step']) || $_SESSION['step'] < 4) {
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

    <div class="cadastro-layout" id="cadastro-5">
      <form action="./../_app/controllers/cadastro5-Controller.php" enctype="multipart/form-data" method="POST" id="form-cadastro5" novalidate>
        <h1>Adicione duas Fotos</h1>
        <p>Adicione suas fotos com o limite de 15 fotos por perfil</p>

        <div class="social-cad-imgs">
          <img src="./../images/facebook-social.svg" />
          <img src="./../images/instagram-social.svg" />
        </div>



        <section class="add-photos-cad">
          <label id="photo1" class="area-drop">
            <input type="file" name="img-1" id="photo1" required />

            <span>Arraste sua foto</span>
          </label>
          <label class="area-drop">
            <input type="file" name="img-2" id="photo2" required />

            <span>Arraste sua foto</span>
          </label>
        </section>
        <button class="continue btn-register" type="submit">
          Adicionar Fotos
        </button>
      </form>


      <!-- <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script> -->
      <script src="./../script/cadastro.js"></script>
    </div>
  </div>
</body>

</html>