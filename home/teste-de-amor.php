<?php

// session_start();
require_once __DIR__ . "./../_app/models/profileModel.php";


?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Teste do amor &mid; Keyslov</title>
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
            <a href="configuracoes.php">Configurações</a>
          </li>
          <li>
            <a href="mensagens.php">Mensagens</a>
          </li>
          <li>
            <a href="servicos.php">Serviços</a>
          </li>
          <li><a href="online.php">Online agora</a>
          </li>
          <li>
            <a href="teste-de-amor.php" class="pagina-selecionada">Teste de amor</a>
          </li>
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
    <main class="padrao" id="teste-de-amor">
      <h1 class="title">Teste do amor</h1>
      <section id="formulario-teste">
        <div class="categoria">
          <h3>Como você gosta de aproveitar seu tempo?</h3>
          <div class="opcao">
            <input type="radio" name="opcoes-1" id="opcoes-1-1" />
            <label for="opcoes-1-1">Assistindo filmes e séries.</label>
          </div>
          <div class="opcao">
            <input type="radio" name="opcoes-1" id="opcoes-1-2" />
            <label for="opcoes-1-2">Com muitos amigos diferentes, em festas divertidas.</label>
          </div>
          <div class="opcao">
            <input type="radio" name="opcoes-1" id="opcoes-1-3" />
            <label for="opcoes-1-3">Com alguém que o (a) faça sentir-se especial e que torne os momentos de lazer.</label>
          </div>
          <div class="opcao">
            <input type="radio" name="opcoes-1" id="opcoes-1-4" />
            <label for="opcoes-1-4">Em família, é muito caseiro(a)</label>
          </div>
        </div>

        <div class="categoria">
          <h3>Como você se imagina daqui para frente?</h3>
          <div class="opcao">
            <input type="radio" name="opcoes-2" id="opcoes-2-1" />
            <label for="opcoes-2-1">Ter uma família sua.</label>
          </div>
          <div class="opcao">
            <input type="radio" name="opcoes-2" id="opcoes-2-2" />
            <label for="opcoes-2-2">Ser um profissional de sucesso.</label>
          </div>
          <div class="opcao">
            <input type="radio" name="opcoes-2" id="opcoes-2-3" />
            <label for="opcoes-2-3">Fazer viagens inesquecíveis com o seu amor.</label>
          </div>
          <div class="opcao">
            <input type="radio" name="opcoes-2" id="opcoes-2-4" />
            <label for="opcoes-2-4">Não gosta de fazer planos a longo prazo.</label>
          </div>
        </div>

        <div class="categoria">
          <h3>Para você o amor verdadeiro é?</h3>
          <div class="opcao">
            <input type="radio" name="opcoes-3" id="opcoes-3-1" />
            <label for="opcoes-3-1">Sentimento muito forte de afeto entre duas pessoas.</label>
          </div>
          <div class="opcao">
            <input type="radio" name="opcoes-3" id="opcoes-3-2" />
            <label for="opcoes-3-2">Persiste no coração e resiste a qualquer quantidade de tempo.</label>
          </div>
          <div class="opcao">
            <input type="radio" name="opcoes-3" id="opcoes-3-3" />
            <label for="opcoes-3-3">Uma missão difícil de alcançar.</label>
          </div>
          <div class="opcao">
            <input type="radio" name="opcoes-3" id="opcoes-3-4" />
            <label for="opcoes-3-4">O amor que sente por sí próprio (a).</label>
          </div>
        </div>

        <div class="categoria">
          <h3>Pensa nos seus ex...</h3>
          <div class="opcao">
            <input type="radio" name="opcoes-4" id="opcoes-4-1" />
            <label for="opcoes-4-1">Nunca.</label>
          </div>
          <div class="opcao">
            <input type="radio" name="opcoes-4" id="opcoes-4-2" />
            <label for="opcoes-4-2">Ex? Nunca tive relacionamentos, mas gostava...</label>
          </div>
          <div class="opcao">
            <input type="radio" name="opcoes-4" id="opcoes-4-3" />
            <label for="opcoes-4-3">Não fico preso(a) ao passado, etou sempre a projectar o fututo.</label>
          </div>
        </div>

        <div class="categoria">
          <h3>O que mais incomoda em um relacionamento?</h3>
          <div class="opcao">
            <input type="radio" name="opcoes-5" id="opcoes-5-1" />
            <label for="opcoes-5-1">No calor da emoção do negativismo a pessoa mostra ser desiquilibrada, falta de paciência.</label>
          </div>
          <div class="opcao">
            <input type="radio" name="opcoes-5" id="opcoes-5-2" />
            <label for="opcoes-5-2">Estar sempre a tentar agradar a outra pessoa.</label>
          </div>
          <div class="opcao">
            <input type="radio" name="opcoes-5" id="opcoes-5-3" />
            <label for="opcoes-5-3">Nunca estive em um relacionamento, mas acho que nada incomodaria.</label>
          </div>
          <div class="opcao">
            <input type="radio" name="opcoes-5" id="opcoes-5-4" />
            <label for="opcoes-5-4">Em um relacionamento sério, nada é incômodo.</label>
          </div>
        </div>

        <div class="categoria">
          <h3>Quais são as vantagens de ter um relacionamento?</h3>
          <div class="opcao">
            <input type="radio" name="opcoes-6" id="opcoes-6-1" />
            <label for="opcoes-6-1">Mais a felicidade te faz ser uma pessoa melhor.</label>
          </div>
          <div class="opcao">
            <input type="radio" name="opcoes-6" id="opcoes-6-2" />
            <label for="opcoes-6-2">Ter alguém disponível quando mais necessário.</label>
          </div>
          <div class="opcao">
            <input type="radio" name="opcoes-6-3" />
            <label for="opcoes-6-3">Ter companhia para eventos sociais.</label>
          </div>
          <div class="opcao">
            <input type="radio" name="opcoes-6" id="opcoes-6-4" />
            <label for="opcoes-6-4">Não vejo nenhuma vantagem.</label>
          </div>
          <div class="opcao">
            <input type="radio" name="opcoes-6" id="opcoes-6-5" />
            <label for="opcoes-6-5">Só vantagens!!</label>
          </div>
        </div>
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