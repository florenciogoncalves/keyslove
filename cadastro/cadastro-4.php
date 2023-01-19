<?php
session_start();
if (!isset($_SESSION['step']) || $_SESSION['step'] < 3) {
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
    <div class="cadastro-layout" id="cadastro-4">
      <form action="./../_app/controllers/cadastro4-Controller.php" method="POST" id="form-cadastro4" novalidate>
        <h1>Estou procurando</h1>

        <div>
          <input type="checkbox" id="escolha-1" name="escolha-1" value="relacionamentoSerio" />
          <label for="escolha-1" name="escolha-1" value="relacionamentoSerio">Relacionamento Sério</label>
        </div>

        <div>
          <input type="checkbox" id="escolha-2" name="escolha-2" value="relacionamentoLongoPrazo" />
          <label for="escolha-2" name="escolha-2" value="relacionamentoLongoPrazo">Relacionamento a longo prazo</label>
        </div>

        <div>
          <input type="checkbox" id="escolha-3" name="escolha-3" value="namorar" />
          <label for="escolha-3" name="escolha-3">Namorar</label>
        </div>

        <div>
          <input type="checkbox" id="escolha-4" name="escolha-4" value="casamentoViverJuntos" />
          <label for="escolha-4" name="escolha-4" value="casamentoViverJuntos">Casamento viver juntos</label>
        </div>

        <div>
          <input type="checkbox" id="escolha-5" name="escolha-5" value="casamentoViverSeparados" />
          <label for="escolha-5" name="escolha-5" value="casamentoViverSeparados">Casamento viver separados</label>
        </div>

        <div>
          <input type="checkbox" id="escolha-6" name="escolha-6" value="Amizade" />
          <label for="escolha-6" name="escolha-6" value="Amizade">Amizade</label>
        </div>

        <button class="continue btn-register" type="submit" name="btn" value="btn">CADASTRAR</button>
      </form>
    </div>
  </div>

  <script src="./../script/resize-windown.js"></script>
</body>

</html>