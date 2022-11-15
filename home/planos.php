<?php

// session_start();
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
  <title>Planos &mid; Keyslov</title>
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
            if (isset($_SESSION['username'])):
            ?>


            <h2>
              <?= $_SESSION['username']; endif ?>
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
          <li>
            <a href="planos.php" class="pagina-selecionada">Planos</a>
          </li>
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
    <main class="padrao" id="planos">
      <section id="pacotes-pagamento">
        <h1 class="title">Pacotes e pagamentos</h1>
        <section class="card-container">
          <input type="radio" name="plano" id="pack-bronze"><label for="pack-bronze" class="card-content">
            <img src="./../images/planos-card-logo.svg" />
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam
              non fringilla lacus. Aliquam eget accumsan turpis
            </p>
            <button class="btn-register">Lorem Ipsum</button>
          </label>
          <input type="radio" name="plano" id="pack-prata"><label for="pack-prata" class="card-content">
            <img src="./../images/planos-card-logo.svg" />
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam
              non fringilla lacus. Aliquam eget accumsan turpis
            </p>
            <button class="btn-register">Lorem Ipsum</button>
          </label>
          <input type="radio" name="plano" id="pack-ouro"><label for="pack-ouro" class="card-content">
            <img src="./../images/planos-card-logo.svg" />
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam
              non fringilla lacus. Aliquam eget accumsan turpis
            </p>
            <button class="btn-register">Lorem Ipsum</button>
          </label>
        </section>

        <section class="card-bank-container">

        <?php
          $getCard = new profileModel();
          $card = $getCard->User('tb_metodo_pagamento', 'nomeTitular', $_SESSION['username'], '=', 'fetch');
        ?>

            <div class="card-bank-data">
              <div class="left-side">
                <span><label for="card-num">Número do cartão</label>
                  <input type="number" id="card-num" placeholder="<?= $card['numeroCartao'] ?>" name="numero-cartao" disabled/></span>
                <span>
                  <label for="titular-name">Nome do titular</label>
                  <input type="text" id="titular-name" placeholder="<?= $card['nomeTitular'] ?>" name="nome-titular" disabled/>
                </span>
                <div class="validate">
                  <label for="validate">Validade</label>
                  <input type="number" min="1" max="99" placeholder="<?= $card['mes'] ?>" name="validade-mes" disabled/>
                  <input type="number" max="99" placeholder="<?= $card['ano'] ?>" name="validade-ano" disabled/>
                </div>
              </div>
              <div class="right-side">
                <div></div>
              </div>
            </div>
        </section>
        <a href="./metodos-pagamento.php">
          <button class="btn-register">
            Métodos de pagamento
          </button>
        </a>
      </section>
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
</body>

</html>