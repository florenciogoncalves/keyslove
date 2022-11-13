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
  <title>Keyslov &mid; Home</title>
  <link rel="shortcut icon" href="./../images/favicon.svg" type="image/x-icon" />
  <link rel="stylesheet" href="./../style/style.css" />
  <link rel="stylesheet" href="./../style/style-responsivo.css" />
</head>

<body id="corpo-com-logo">
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
            <a href="bloqueados.php" class="pessoas-bloqueadas">
              <li>Membros Bloqueados</li>
            </a>
            <li>Lorem Ipsum exemplo</li>
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
          <li><a href="./perfil.php">Perfil</a></li>
          <li><a href="chamada.php">Chamada de video</a></li>
          <li><a href="carroussel.php">Carroussel</a></li>
          <li><a href="curtidas.php">Curtidas</a></li>
          <li><a href="planos.php">Planos</a></li>
          <li><a href="favoritos.php">Favoritos</a></li>
          <li><a href="configuracoes.php">Configurações</a></li>
          <li><a href="mensagens.php">Mensagens</a></li>
          <li><a href="servicos.php">Serviços</a></li>
          <li><a href="online.php">Online agora</a></li>
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
    <header id="mobile-header">
      <img src="./../images/Keyslov.svg" alt="Keyslov - logo" />
    </header>
    <main id="home">
      <ul class="home-bar">
        <li class="visualized"></li>
        <li class="visualized"></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
      </ul>

      <div class="home-nav">
        <button id="preview-carroussel">&lt;</button>
        <button id="next-carroussel">&gt;</button>
      </div>

      <div class="home-footer">
        <h3 id="person-name">Nome pessoa 100</h3>
        <a href="mensagens.html">
          <div class="talk-now">
            Conversar agora &nbsp;

            <img src="./../images/br-icon.svg" alt="Brasil" class="img-2" />&nbsp; <img src="./../images/Group 8777.svg" />&nbsp;
            <img src="./../images/usa-icon.svg" alt="Inglês" class="img-1" />
          </div>
        </a>

        <ul id="tag-area">
          <li>#trabalhando</li>
          <li></li>
          <li></li>
        </ul>

        <p id="subtitle">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit.
          <br />Nullam non fringilla lacus. Aliquam eget accumsan turpis
        </p>

        <div id="home-progress-content">
          <div id="home-progress-bar">
            <span id="home-progress-val"></span>
          </div>
        </div>

        <div id="home-btns">
          <button id="retry"></button>
          <button id="dislike"></button>
          <button id="maybe">Talvez</button>
          <button id="like"></button>
          <button id="favorite"></button>
        </div>
      </div>


      <object data="./../debug-images/temp-3.png" id="main-image" alt="Fotografia"></object>
    </main>
    <footer id="footer-mobile">
      <nav>
        <ul>
          <li id="nav-selecionada"><a href="./index.php"></a></li>
          <li><a href="./localizar-pessoas.php"></a></li>
          <li><a href="./favoritos.php"></a></li>
          <li><a href="./mensagens.php"></a></li>
          <li><button id="mostra-menu-mobile"></button></li>
        </ul>
      </nav>
    </footer>
  </div>

  <dialog open="true" id="modal-home-1">
    <div class="dialog-content">
      <img src="./../images/information-icon.svg" alt="" />
      <h2>Entenda como funciona</h2>
      <p>
        Lorem Ipsum is simply dummy text of the printing and typesetting
        industry. Lorem Ipsum has been the industry's standard dummy text ever
        since the 1500s, when an unknown printer took a galley of type and
        scrambled it to make a type specimen book
      </p>
      <button class="close-modal simple-btn">X</button>
    </div>
  </dialog>

  <dialog open="true" id="modal-home-2">
    <div class="dialog-content">
      <img src="./../images/notification-icon.svg" />
      <p>
        Quer receber um aviso quando <strong>Joaquim Coutto</strong> curtir
        você também?
      </p>
      <button id="active" class="red-btn">Ativar</button>
      <button id="pass-this" class="simple-btn">Não tenho interesse</button>
      <button class="close-modal simple-btn">X</button>
    </div>
  </dialog>

  <script src="./../script/script.js"></script>
  <script src="./../script/resize-windown.js"></script>
</body>

</html>