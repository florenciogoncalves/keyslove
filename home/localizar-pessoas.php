<?php

require __DIR__ . "./../_app/models/profileModel.php";


if (!$_SESSION['username']) {
  header("Location: ../");
  $_SESSION['messageAuth'] = "Precisa Fazer Login Primeiro!";
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Localizar pessoas &mid; Keyslov</title>
  <link rel="shortcut icon" href="./../images/favicon.svg" type="image/x-icon" />
  <link rel="stylesheet" href="./../style/bootstrap.min.css">
  <link rel="stylesheet" href="./../style/css/style.css" />
  <link rel="stylesheet" href="./../style/css/style-responsivo.css" />


  <style>
    .alert {
      position: relative;
      padding: 1rem 1rem;
      margin-bottom: 1rem;
      border: 1px solid transparent;
      border-radius: 0.25rem;
    }

    .alert-danger {
      color: #842029;
      background-color: #f8d7da;
      border-color: #f5c2c7;
    }
  </style>

</head>

<body>
  <div id="menu-esquerdo">
    <div id="div-left">
      <div id="user-information">
        <figure>
          <?php
          $photo = new profileModel();
          $get = $photo->User('tb_photos', 'user', $_SESSION['username'], '!=');
          $profile = $photo->User('tb_photos', 'user', $_SESSION['username'], '=');
          ?>


          <div class="foto-de-perfil">
            <img src="./../_storage/images/<?= $profile['photo']; ?>" alt="Foto de perfil" id="img-perfil" />

            <div class="status"></div>
          </div>
          <figcaption>
            <?php
            if (isset($_SESSION['username'])) :
            ?>


              <h2><?= $_SESSION['username'];
                endif ?></h2>
              <span id="show-status-window">Escolher status</span>
          </figcaption>
        </figure>

        <img class="vizualizar-menu" src="./../images/option.svg" />
        <div class="hidden-list">
          <ul>
            <a href="bloqueados.html" class="pessoas-bloqueadas">
              <li>Membros Bloqueados</li>
            </a>
            <a class="logout" href="./../index.php">
              <li>Sair</li>
            </a>
          </ul>
        </div>
        <div id="online-now">

          <div class="changing-status">
            <div class="this-status">
              <input type="radio" name="online-agora" value="online" id="online" class="s-status" />
              <label for="online">Online</label>
            </div>

            <div class="this-status">
              <input type="radio" name="online-agora" id="ocupado" value="ocupado" class="s-status" />
              <label for="ocupado">Ocupado</label>
            </div>

            <div class="this-status">
              <input type="radio" name="online-agora" id="invisivel" value="invisivel" class="s-status" />
              <label for="invisivel">Invisível</label>
            </div>
          </div>
        </div>
      </div>

      <nav>
        <ul id="menu-left">
          <li><a href="./perfil.php">Perfil</a></li>
          <li><a href="chamada.php">Chamada de video</a></li>
          <li><a href="carroussel.php">Carroussel</a></li>
          <li><a href="curtidas.php">Curtidas</a></li>
          <li><a href="planos.php">Planos</a></li>
          <li><a href="favoritos.php">Favoritos</a></li>
          <li><a href="configuracoes.php">Configurações</a></li>
          <li>
            <a href="mensagens.php">Mensagens</a>
          </li>
          <li><a href="servicos.php">Serviços</a></li>
          <li><a href="online.php">Online agora</a>
          </li>
          <li><a href="teste-de-amor.php">Teste de amor</a></li>
        </ul>
      </nav>
      <a href="localizar-pessoas.php">
        <div id="peoples-left">
          <h4>Pessoas pela região</h4>

          <div class="people-organizer">
            <img src="./../debug-images/temp-2.svg" />
            <img src="./../debug-images/temp-2.svg" />
            <img src="./../debug-images/temp-2.svg" />
          </div>
        </div>
      </a>
    </div>
  </div>

  <div id="main-container">


    <main class="padrao" id="pessoas-regiao">


      <?php
      if (isset($_SESSION['error'])) :
      ?>

        <div class="alert alert-danger text-center" role="alert">

          <?php
          if (isset($_SESSION['error'])) {
            // foreach ($_SESSION['error'] as $errors) {
            echo $_SESSION['error'];
            unset($_SESSION['error']);
            // unset($errors);
            // }
          }

          ?>

        </div>

      <?php
      endif;
      ?>
      <h1 class="title">Localizar pessoas</h1>

      <section class="search gap-3 gap-sm-4 gap-lg-5">
        <form action="./../_app/controllers/searchPeopleController.php" method="post">

          <div class="search-field">
            <input type="search" name="searchInput" />
            <button></button>
          </div>
        </form>

        <button class="__filter-btn">Todos</button>
      </section>


      <?php

      $model = new profileModel();

      if (isset($_SESSION['userFounded'])) {
        $user = $_SESSION['userFounded'];
        $get = $user ?? $_SESSION['username'];
      }


      if (isset($_SESSION['userFounded'])) {
        $allUsers = $model->User('tb_cadastroConta2', 'nome', $get, '=', 'fetchAll');
        unset($_SESSION['userFounded']);
      } else {
        $allUsers = $model->User('tb_cadastroConta2', 'nome', $_SESSION['username'], '!=', 'fetchAll');
      }

      foreach ($allUsers as $Users) {
        $usersPhoto = $model->User('tb_photos', 'user', $Users['nome']);

        if ($Users['nome'] == $_SESSION['username']) {
          echo "<ul class='list'>";
          echo "
          <ul class='list'>
          <li>
          <img src='./../_storage/images/{$usersPhoto['photo']}' />
          <section>
            <article>
              <div>
                <div class='status-div'></div>
                <span>{$Users['nome']}</span>
              </div>
              <ul>
                <li>Drinks</li>
                <li>Drinks</li>
                <li>Drinks</li>
              </ul>
            </article>
          </section>
        </li>

      </ul>

        ";
          echo "</ul>";
        } else {

          echo "<ul class='list'>";
          echo "
          <ul class='list'>
          <li>
          <img src='./../_storage/images/{$usersPhoto['photo']}' />
          <section>
            <article>
              <div>
                <div class='status-div'></div>
                <span>{$Users['nome']}</span>
              </div>
              <ul>
                <li>Drinks</li>
                <li>Drinks</li>
                <li>Drinks</li>
              </ul>
            </article>
            <div class='botoes'>
              <button class='dislike'></button>
              <button class='like'></button>
            </div>
          </section>
        </li>

      </ul>

        
        ";
          echo "</ul>";
        }
      }



      ?>

    </main>
    <footer id="footer-mobile">
      <nav>
        <ul>
          <li><a href="./index.php"></a></li>
          <li id="nav-selecionada"><a href="./localizar-pessoas.php"></a></li>
          <li><a href="./favoritos.php"></a></li>
          <li><a href="./mensagens.php"></a></li>
          <li><button id="mostra-menu-mobile"></button></li>
        </ul>
      </nav>
    </footer>
  </div>

  <script src="./../script/script.js"></script>
  <script>
    const status = localStorage.getItem('status');

    for (c = 0; c < 3; c++) {
      const btn = document.getElementsByClassName('s-status')[c]
      btn.addEventListener('translate-toggle', () => {
        window.location.href = './app/Controllers/statusController.php?status=' + btn.value
      })
    }
  </script>
</body>

</html>