<?php


require_once __DIR__ . "./../_app/models/profileModel.php";

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
  <title>Favoritos &mid; Keyslov</title>
  <link rel="shortcut icon" href="./../images/favicon.svg" type="image/x-icon" />
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

    .alert-info {
      color: #055160;
      background-color: #cff4fc;
      border-color: #b6effb;
    }

    .alert-warning {
      color: #664d03;
      background-color: #fff3cd;
      border-color: #ffecb5;
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


              <h2>
              <?= $_SESSION['username'];
            endif ?>
              </h2>
              <span id="show-status-window">Escolher status</span>
          </figcaption>
        </figure>

        <img class="vizualizar-menu" src="./../images/option.svg" />
        <div class="hidden-list">
          <ul>
            <a href="bloqueados.php" class="pessoas-bloqueadas">
              <li>Membros Bloqueados</li>
            </a>
            <li>Lorem Ipsum exemplo</li>
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
          <li>
            <a href="favoritos.php" class="pagina-selecionada">Favoritos</a>
          </li>
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
    <main class="padrao" id="favoritos">
      <nav>
        <input type="radio" name="menu-favoritos" id="favoritados" checked />
        <label class="title" for="favoritados">Favoritados</label>
        <input type="radio" name="menu-favoritos" id="vizualizou" />
        <label class="title" for="vizualizou">Vizualizou meu perfil</label>
        <input type="radio" name="menu-favoritos" id="curtiu" />
        <label class="title" for="curtiu">Me curtiu</label>
      </nav>

      <section id="sep-favoritados">

        <?php

        $model = new profileModel();
        $user = $model->User('tb_reacts', 'user_react', $_SESSION['username'], '=', 'fetchAll');



        foreach ($user as $users) {

          // $favorite = $model->User('tb_reacts', 'reacted', $users['reacted'], '=', 'fetchAll');
          $favoritee = $model->getFavorites($_SESSION['username'], $users['reacted'], 'favorite');
        }



        $error = new stdClass();
        $error->error = '<center><h2>Você ainda não favoritou ninguém!</h2></center>';
        $error->view = '<center><h2>Em desenvolvimento!</h2></center>';
        if ($user) {

          foreach ($favoritee as $favorites) {

            $_SESSION['favoriteName'] = $favorites['reacted'];
            $getPhoto = $model->User('tb_photos', 'user', $favorites['reacted'], '=');

            echo "
        <ul class='list'>
        <li>
          <img src='./../_storage/images/{$getPhoto['photo']}' />
          <section>
            <article>
              <div>
                <div class='status-div'></div>
                <span>{$favorites['reacted']}</span>
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
          }
        } else {
          echo "
          
        <div class='alert alert-danger'>
          {$error->error}
          </div>
          ";
        }

        ?>
      </section>

      <section id="sep-vizualizou">

        <div class="alert alert-info">
          <?php
          echo $error->view;
          ?>
        </div>
      </section>




      <?php

      $model = new profileModel();
      $user = $model->User('tb_curtidas', 'curtido', $_SESSION['username'], '=', 'fetchAll');

      $error = new stdClass();
      $error->error = "<center><h2>Ainda ninguém curtiu você!</h2></center>";



      foreach ($user as $users) {

        // $favorite = $model->User('tb_reacts', 'reacted', $users['reacted'], '=', 'fetchAll');
        // foreach ($favorite as $favorites) {
        //   $_SESSION['favoriteName'] = $favorites['reacted'];
        $getPhoto = $model->User('tb_photos', 'user', $users['curtiu'], '=');
        // }

        // echo $error->error;
        echo "
  
  <section id='sep-curtiu'>
  <ul class='list'>
    <li>
      <img src='./../_storage/images/{$getPhoto['photo']}' />
      <section>
        <article>
          <span>{$users['curtiu']}</span>
        </article>
        <div class='botoes'>
          <button class='dislike'></button>
          <button class='like'></button>
        </div>
      </section>
    </li>
  </ul>
</section>
  
  ";
      }
      ?>





    </main>
    <footer id="footer-mobile">
      <nav>
        <ul>
          <li><a href="./index.php"></a></li>
          <li><a href="./localizar-pessoas.php"></a></li>
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
      btn.addEventListener('click', () => {
        window.location.href = './app/Controllers/statusController.php?status=' + btn.value
      })
    }
  </script>
</body>

</html>