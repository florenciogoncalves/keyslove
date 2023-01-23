<?php

require_once __DIR__ . "./../_app/models/profileModel.php";
require_once __DIR__ . "./../_app/boot/helpers.php";

// session_start();

?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Complete o perfil &mid; Keyslov</title>
  <link rel="shortcut icon" href="./../images/favicon.svg" type="image/x-icon" />
  <link rel="stylesheet" href="./../style/css/style.css" />
  <link rel="stylesheet" href="./../style/css/style-responsivo.css" />
</head>

<body id="sobre-usuario">
  <div id="menu-esquerdo">
    <div id="div-left">
      <div id="user-information">
        <figure>

          <?php
          $photo = new profileModel();
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
            <a href="bloqueados.php" class="pessoas-bloqueadas">
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
              <input type="radio" name="online-agora" value="online" id="online" />
              <label for="online">Online</label>
            </div>

            <div class="this-status">
              <input type="radio" name="online-agora" id="ocupado" value="ocupado" />
              <label for="ocupado">Ocupado</label>
            </div>

            <div class="this-status">
              <input type="radio" name="online-agora" id="invisivel" value="invisivel" />
              <label for="invisivel">Invisível</label>
            </div>
          </div>
        </div>
      </div>

      <nav>
        <ul id="menu-left">
          <li><a href="./../home/perfil.php">Perfil</a></li>
          <li><a href="./../home/chamada.php">Chamada de video</a></li>
          <li><a href="./../home/carroussel.php">Carroussel</a></li>
          <li><a href="./../home/curtidas.php">Curtidas</a></li>
          <li><a href="./../home/planos.php">Planos</a></li>
          <li><a href="./../home/favoritos.php">Favoritos</a></li>
          <li><a href="./../home/configuracoes.php">Configurações</a></li>
          <li><a href="./../home/mensagens.php">Mensagens</a></li>
          <li><a href="./../home/servicos.php">Serviços</a></li>
          <li><a href="./../home/online.php">Online agora</a></li>
          <li><a href="teste-de-amor.php">Teste de amor</a></li>
        </ul>
      </nav>

      <a href="./../home/localizar-pessoas.php">
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
    <header id="mobile-header">
      <img src="./../images/Keyslov.svg" alt="Keyslov - logo" />
    </header>
    <div id="content-right">
      <form action="./../_app/controllers/sobreMimController.php" method="POST" class="principal-content">
        <header class="content-header">
          <img src="./../images/Book_check_fill.svg" />
          <h1 class="__title">Mais sobre mim</h1>
        </header>

        <div id="container-elements" style="justify-content: flex-start">
          <div class="iten" style="margin-bottom: 24px">
            <label for="write-about">Escreva sobre você</label>

            <span class="chars-count"></span>
            <textarea id="write-about" placeholder="Escreva..." name="sobre-voce" oninput="maxCharTextArea(this)" required></textarea>
          </div>

          <div class="iten">
            <label for="write-about">O que você busca</label>
            <span class="chars-count"></span>
            <textarea id="find-out" placeholder="Escreva..." name="o-que-busca" oninput="maxCharTextArea(this)" required></textarea>
          </div>
        </div>

        <div class="progress-next">
          <div class="progress-bar-content">
            <div class="progress-bar">
              <span class="progress-val"></span>
            </div>
          </div>

          <button class="next-page-about">></button>
        </div>
      </form>
    </div>
    <footer id="footer-mobile">
      <nav>
        <ul>
          <li><a href="./../home/index.php"></a></li>
          <li><a href="./../home/localizar-pessoas.php"></a></li>
          <li><a href="./../home/favoritos.php"></a></li>
          <li><a href="./../home/mensagens.php"></a></li>
          <li><button id="mostra-menu-mobile"></button></li>
        </ul>
      </nav>
    </footer>
  </div>

  <script src="./../script/about-user.js"></script>
  <script src="./../script/script.js"></script>
</body>

</html>