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
  <style>
    nav,
    #peoples-left {
      display: none;
    }
  </style>
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
      <form action="./../_app/controllers/estiloVidaController.php" method="POST" class="principal-content">
        <header class="content-header">
          <img src="./../images/Book_check_fill.svg" />
          <h1>Estilo de vida</h1>
        </header>

        <div id="container-elements" style="justify-content: flex-start">

          <div class="iten">
            <label for="ocupacao">Ocupação</label>
            <input type="text" id="ocupacao" name="ocupacao" placeholder="Selecionar..." required>
          </div>

          <div class="iten">
            <label for="beber">Você bebe?</label>
            <select id="beber" name="beber" required>
              <option selected hidden disabled value="">Selecionar...</option>
              <option value="Sim">Sim</option>
              <option value="Não">Não</option>
              <option value="Por vezes">Por vezes</option>
            </select>
          </div>
          <div class="iten">
            <label for="fumar">Você fuma?</label>
            <select id="fumar" name="fumar" required>
              <option selected hidden disabled value="">Selecionar...</option>
              <option value="Sim">Sim</option>
              <option value="Não">Não</option>
              <option value="Por vezes">Por vezes</option>
            </select>
          </div>

          <div class="iten">
            <label for="filhos">Possui filhos?</label>
            <select id="filhos" name="filhos" required>
              <option selected hidden disabled value="">Selecionar...</option>
              <option value="Sim">Sim</option>
              <option value="Não">Não</option>
            </select>
          </div>
          <div class="iten">
            <label for="quantidade-filhos">Quantidade de filhos</label>
            <select id="quantidade-filhos" name="quantidade-filhos">
              <option selected hidden disabled>00</option>
              <option value="1">01</option>
              <option value="2">02</option>
              <option value="3">03</option>
              <option value="4">04</option>
              <option value="5">05</option>
              <option value="6">06</option>
              <option value="7">07</option>
              <option value="+7">+7</option>
            </select>
          </div>



          <div class="iten">
            <label for="pets">Possui animais de estimação?</label>
            <select id="pets" name="pets" required>
              <option selected hidden disabled value="">Selecionar...</option>
              <option value="Sim">Sim</option>
              <option value="Não">Não</option>
            </select>
          </div>

          <div class="iten">
            <label for="quantidade-pets">Quantidade</label>
            <select id="quantidade-pets" name="quantidade-pets">
              <option selected hidden disabled>00</option>
              <option value="1">01</option>
              <option value="2">02</option>
              <option value="3">03</option>
              <option value="4">04</option>
              <option value="5">05</option>
              <option value="6">06</option>
              <option value="7">07</option>
              <option value="+7">+7</option>
            </select>
          </div>



        </div>

        <div class="progress-next">
          <div class="progress-bar-content">
            <div class="progress-bar">
              <span class="progress-val"></span>
            </div>
          </div>

          <button class="next-page-about">
            >
          </button>
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