<?php

// session_start();
require_once __DIR__ . "./../_app/models/profileModel.php";
require_once __DIR__ . "./../_app/boot/helpers.php";

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Chamada &mid; Keyslov</title>
  <link rel="shortcut icon" href="./../images/favicon.svg" type="image/x-icon" />
  <link rel="stylesheet" href="./../style/style.css" />
  <link rel="stylesheet" href="./../style/style-responsivo.css" />
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

<<<<<<< HEAD
        <img class="vizualizar-menu" src="./../images/option.svg" />
        <div class="hidden-list">
          <ul>
            <a href="bloqueados.html" class="pessoas-bloqueadas">
              <li>Membros Bloqueados</li>
            </a>
            <li>Lorem Ipsum exemplo</li>
          </ul>
        </div>
        <div id="online-now">
=======
          <img  class="vizualizar-menu" src="./../images/option.svg" />
          <div class="hidden-list">
            <ul>
              <a href="bloqueados.php" class="pessoas-bloqueadas"><li>Membros Bloqueados</li></a>
              <a class="logout" href="./../index.php"><li>Sair</li></a>
            </ul>
          </div><div id="online-now">
>>>>>>> 2f6691773fa1d5025fc77512763dcb97e0162e27

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
<<<<<<< HEAD
=======

        <nav>
          <ul id="menu-left">
            <li><a href="./perfil.php">Perfil</a></li>
            <li>
              <a href="chamada.php" class="pagina-selecionada"
                >Chamada de video</a
              >
            </li>
            <li><a href="carroussel.php">Carroussel</a></li>
            <li><a href="curtidas.php">Curtidas</a></li>
            <li><a href="planos.php">Planos</a></li>
            <li><a href="favoritos.php">Favoritos</a></li>
            <li><a href="configuracoes.php">Configurações</a></li>
            <li><a href="mensagens.php">Mensagens</a></li>
            <li><a href="servicos.php">Serviços</a></li>
            <li><a href="online.php">Online agora</a>
            </li>
            <li><a href="teste-de-amor.php">Teste de amor</a></li>
          </ul>
        </nav>
        <a href="localizar-pessoas.php"
          ><div id="peoples-left">
            <h4>Pessoas pela região</h4>

            <div class="people-organizer">
              <img src="./../debug-images/temp-2.svg" />
              <img src="./../debug-images/temp-2.svg" />
              <img src="./../debug-images/temp-2.svg" />
            </div></div
        ></a>
>>>>>>> 2f6691773fa1d5025fc77512763dcb97e0162e27
      </div>

<<<<<<< HEAD
      <nav>
        <ul id="menu-left">
          <li><a href="./perfil.php">Perfil</a></li>
          <li>
            <a href="chamada.html" class="pagina-selecionada">Chamada de video</a>
          </li>
          <li><a href="carroussel.php">Carroussel</a></li>
          <li><a href="curtidas.php">Curtidas</a></li>
          <li><a href="planos.php">Planos</a></li>
          <li><a href="favoritos.php">Favoritos</a></li>
          <li><a href="configuracoes.php">Configurações</a></li>
          <li><a href="mensagens.php">Mensagens</a></li>
          <li><a href="servicos.php">Serviços</a></li>
          <li><a href="online.php">Online agora</a>
          </li>
          <li><a href="teste-de-amor.php">Teste de amor</a></li>
        </ul>
      </nav>
      <a href="localizar-pessoas.php">
        <div id="peoples-left">
          <h4>Pessoas pela região</h4>
=======
    <div id="main-container">
      <main id="chamada-video">
        <video>
          <source src="" />
        </video>
        <div class="legenda-chamada">
          <a href="mensagens.php"><button>&lt;</button></a>
          <span>Lorem ipsum</span>
        </div>
        <div class="comandos-chamada">
          <input type="checkbox" id="microfone" />
          <a href="mensagens.php"><button id="desligar"></button></a>
          <button id="trocar-camera"></button>
        </div>
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
>>>>>>> 2f6691773fa1d5025fc77512763dcb97e0162e27

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
    <main id="chamada-video">
      <video>
        <source src="" />
      </video>
      <div class="legenda-chamada">
        <a href="mensagens.html"><button>&lt;</button></a>
        <span>Lorem ipsum</span>
      </div>
      <div class="comandos-chamada">
        <input type="checkbox" id="microfone" />
        <a href="mensagens.html"><button id="desligar"></button></a>
        <button id="trocar-camera"></button>
      </div>
    </main>
  </div>

  <script src="./../script/script.js"></script>
</body>

</html>