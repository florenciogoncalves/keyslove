<?php

require __DIR__ . "./../_app/models/profileModel.php";

// session_start();
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
  <title>Configurações &mid; Keyslov</title>
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
            <a href="bloqueados.html" class="pessoas-bloqueadas">
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
          <li>
            <a href="favoritos.php">Favoritos</a>
          </li>
          <li>
            <a href="configuracoes.php" class="pagina-selecionada">Configurações</a>
          </li>
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
    <main class="padrao" id="configuracoes">
      <section id="conf-select">
        <h1 class="title">Configurações</h1>
        <ul id="conf-list">
          <li>Configurações da conta</li>
          <li>Métodos de pagamento</li>
          <li>Notificações</li>
          <li>Configurações</li>
        </ul>
        <a href="#">Sair</a>
      </section>





      <?php
      //require __DIR__ . "./../core/connect.php";
      


      $data = new profileModel();

      $for = $data->FirstUserData();

      $fore = $data->UserData();

      $city = $data->UserData('tb_localizacao');
      $card = $data->user('tb_metodo_pagamento', 'user', $_SESSION['username']);

      ?>





      <section id="conf-account">
        <h1 class="title">Configurações da conta</h1>
        <ul id="conf-list">
          <li>
            Nome:
            <input type="text" class="user-data-show" value="<?= $for['nome']; ?>" disabled required /><span
              class="edit">Editar</span>
          </li>
          <li>
            Número:
            <input type="tel" class="user-data-show" value="<?= $fore['telefone']; ?>" disabled required /><span
              class="edit">Editar</span>
          </li>
          <li>
            Email:
            <input type="email" class="user-data-show" value="<?= $fore['email']; ?>" disabled required /><span
              class="edit">Editar</span>
          </li>
          <li>
            Senha:
            <input type="password" class="user-data-show" value="<?= $fore['senha'] ?>" disabled required /><span
              class="edit">Editar</span>
          </li>
          <li>
            Cidade:
            <input type="text" class="user-data-show" value="<?= $city['cidade']; ?>" disabled required /><span
              class="edit">Editar</span>
          </li>
          <span id="delete-account">Excluir conta</span>
        </ul>
        <a href="#conf-select" class="back">Sair</a>
      </section>



      <section id="conf-payment">
        <h1 class="title">Métodos de pagamento</h1>
        <ul class="card-list">

          <?php
          ?>
          <li>
            <div class="information-card">
              <span>
                <?= $card['entity_card']; ?>
              </span>
              <span>
                <?= $card['agencia']; ?>
              </span>
            </div>
            <a href="./planos.php" class="edit">Editar</a>
          </li>

          <?php

          ?>

        </ul>
        <a href="metodos-pagamento.php"><button class="btn-register">Adicionar novo cartão</button></a>
        <a href="#" class="back">Sair</a>
      </section>

      <section id="conf-notifications">
        <h1 class="title">Notificações</h1>
        <ul class="on-of-list">
          <li>
            <span>Activar notificações</span>
            <input type="checkbox" id="active-notifications" />
            <label class="switch-painel" for="active-notifications">
              <div class="btn-switch"></div>
            </label>
          </li>
          <li>
            <span>Novas mensagens</span>
            <input type="checkbox" id="message-notifications" />
            <label class="switch-painel" for="message-notifications">
              <div class="btn-switch"></div>
            </label>
          </li>
          <li>
            <span>Notificações de match</span>
            <input type="checkbox" id="match-notifications" />
            <label class="switch-painel" for="match-notifications">
              <div class="btn-switch"></div>
            </label>
          </li>
        </ul>

        <a href="#" class="back">Sair</a>
      </section>

      <section id="conf-def">
        <h1 class="title">Configurações</h1>
        <ul class="on-of-list">
          <li>
            <span>Mostrar quando estou online automaticamente</span>
            <input type="checkbox" id="showme-online" />
            <label class="switch-painel" for="showme-online">
              <div class="btn-switch"></div>
            </label>
          </li>
          <li>
            <span>Ficar Invisível</span>
            <input type="checkbox" id="let-invisible" />
            <label class="switch-painel" for="let-invisible">
              <div class="btn-switch"></div>
            </label>
          </li>
          <li>
            <span>Exibir meu perfil</span>
            <input type="checkbox" id="show-me" />
            <label class="switch-painel" for="show-me">
              <div class="btn-switch"></div>
            </label>
          </li>
        </ul>

        <a href="#" class="back">Sair</a>
      </section>

      <section id="form-delete-account">
        <h1 class="title">Formulário de encerramento</h1>

        <div class="delete-list">
          <div>
            <input name="motivo-delete" required type="radio" />
            <span>Lorem Ipsum exemplo</span>
          </div>
          <div>
            <input name="motivo-delete" type="radio" />
            <span>Lorem Ipsum exemplo</span>
          </div>
          <div>
            <input name="motivo-delete" type="radio" />
            <span>Lorem Ipsum exemplo</span>
          </div>
          <div>
            <input name="motivo-delete" type="radio" />
            <span>Lorem Ipsum exemplo</span>
          </div>
          <div>
            <input name="motivo-delete" type="radio" />
            <span>Lorem Ipsum exemplo</span>
          </div>
          <div>
            <input name="motivo-delete" type="radio" />
            <span>Lorem Ipsum exemplo</span>
          </div>
          <div>
            <input name="motivo-delete" type="radio" />
            <span>Lorem Ipsum exemplo</span>
          </div>
          <div>
            <input name="motivo-delete" type="radio" />
            <span>Lorem Ipsum exemplo</span>
          </div>
        </div>

        <div>
          <button class="btn-register">Prosseguir</button>
          <a href="#" class="back">Sair</a>
        </div>
      </section>
      <form action="#" id="delete-account-options">
        <h1 class="title">Opção de conta</h1>
        <div class="btns">
          <button class="btn-register">Excluir</button>
          <button>Desactivar</button>
        </div>
        <div id="justification">
          <span>Conte o motivo para a nossa equipe</span>
          <textarea></textarea>
        </div>

        <div>
          <button class="btn-register">Prosseguir</button>
          <a href="#" class="back">Sair</a>
        </div>
      </form>
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