<?php

session_start();

?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Complete o perfil &mid; Keyslov</title>
  <link rel="shortcut icon" href="./../images/favicon.svg" type="image/x-icon" />
  <link rel="stylesheet" href="./../style/style.css" />
  <link rel="stylesheet" href="./../style/style-responsivo.css" />
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
          <div class="foto-de-perfil">
            <img src="./../debug-images/temp.png" alt="Foto de perfil" id="img-perfil" />
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
          <li><a href="./../home/online.php">Online agora</a>
          </li>
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

      <form action="./../_app/controllers/caracteristicasFisicasController.php" method="POST" class="principal-content">
        <header class="content-header">
          <img src="./../images/Book_check_fill.svg" />
          <h1>Características Físicas</h1>
        </header>

        <div id="container-elements">

          <div class="iten">
            <label for="cor-cabelos">Cor dos cabelos</label>
            <select id="cor-cabelos" name="cor-cabelos" required>
              <option selected hidden disabled value="">Selecionar...</option>
              <option value="Loiro">Loiro</option>
              <option value="Castanho claro">Castanho Claro</option>
              <option value="Castanho médio">Castanho Médio</option>
              <option value="Castanho escuro">Castanho Escuro</option>
              <option value="Castanho meio ruivo">Castanho meio Ruivo</option>
              <option value="Ruivo">Ruivo</option>
              <option value="Moreno">Moreno</option>
              <option value="Preto">Preto</option>
              <option value="Cinza ou Grisalho">Cinza ou Grizalho</option>
              <option value="Branco">Branco</option>
            </select>
          </div>

          <div class="iten">
            <label for="cor-olhos">Cor dos olhos</label>
            <select id="cor-olhos" name="cor-olhos" required>
              <option selected hidden disabled value="">Selecionar...</option>
              <option value="Azul">Azul</option>
              <option value="Azul-esverdeado">Azul-esverdeado</option>
              <option value="Cinza">Cinza</option>
              <option value="Castanho">Castanho</option>
              <option value="Verde">Verde</option>
              <option value="Avelã">Avelã(castanhos-esverdeados)</option>
              <option value="Âmbar">Âmbar(ocre ou mel)</option>
              <option value="Vermelho">Vermelho(albinismo)</option>
              <option value="">Violeta</option>
            </select>
          </div>

          <div class="iten">
            <label for="altura">Altura</label>
            <select id="altura" name="altura" required>
              <option selected hidden disabled value="">Selecionar...</option>
              <option value="1.41m - 1.50m">1.41 metros - 1.50 metros</option>
              <option value="1.51m - 1.60m">1.51 metros - 1.60 metros</option>
              <option value="1.61m - 1.70m">1.61 metros - 1.70 metros</option>
              <option value="1.71m - 1.80m">1.71 metros - 1.80 metros</option>
              <option value="1.81m - 1.90m">1.81 metros - 1.90 metros</option>
              <option value="1.91m - 2.00m">1.91 metros - 2.00 metros</option>
              <option value="+2.00m">+2.00 metros</option>
            </select>
          </div>

          <div class="iten">
            <label for="peso">Peso</label>
            <select id="peso" name="peso" required>
              <option selected hidden disabled value="">Selecionar...</option>
              <option value="40Kg - 50Kg">40Kg - 50Kg</option>
              <option value="50Kg - 60Kg">50Kg - 60Kg</option>
              <option value="60Kg - 70Kg">60Kg - 70Kg</option>
              <option value="70Kg - 80Kg">70Kg - 80Kg</option>
              <option value="80Kg - 90Kg">80Kg - 90Kg</option>
              <option value="90Kg - 100Kg">90Kg - 100Kg</option>
              <option value="+100Kg">+100Kg</option>
            </select>
          </div>



          <div class="iten">
            <label for="tipo-fisico">Tipo físico</label>
            <select id="tipo-fisico" name="tipo-fisico" required>
              <option selected hidden disabled value="">Selecionar...</option>
              <option value="Ectomorfo">Ectomorfo</option>
              <option value="Mesomorfo">Mesomorfo</option>
              <option value="Endomorfo">Endomorfo</option>
            </select>
          </div>

          <div class="iten">
            <label for="grupo-etnico">Grupo étnico</label>
            <select id="grupo-etnico" name="grupo-etnico" required>
              <option selected hidden disabled value="">Selecionar...</option>
              <option value="Branco">Branco</option>
              <option value="Pardo">Pardo</option>
              <option value="Preto">Preto</option>
              <option value="Amarelo">Amarelo</option>
              <option value="Indígena">Indígena</option>
            </select>
          </div>

          <div class="iten">
            <label for="arte-corporal">Arte corporal</label>
            <select id="arte-corporal" name="arte-corporal" required>
              <option selected hidden disabled value="">Selecionar...</option>
              <option value="Nenhuma">Nenhuma</option>
              <option value="Tatuagem">Tatuagem</option>
              <option value="Piercings">Piercings</option>
              <option value="Alargadores">Alargadores</option>
              <option value="Pintura corporal">Pintura corporal</option>
              <option value="Microdermal">Microdermal</option>
              <option value="Escarificação">Escarificação</option>
              <option value="Implante Subcutâneo">Implante Subcutâneo</option>
              <option value="Bifurcação da língua">Bifurcação da língua</option>
            </select>
          </div>

          <div class="iten">
            <label for="aparencia">Minha aparência</label>
            <select id="aparencia" name="aparencia" required>
              <option selected hidden disabled value="">Selecionar...</option>
              <option value="Bagunçado">Bagunçado</option>
              <option value="Ralo">Ralo</option>
              <option value="Com frizz">Com frizz</option>
              <option value="Brilhante">Brilhante</option>
              <option value="Limpo">Limpo</option>
            </select>
          </div>

        </div>

        <div class="progress-next">
          <div class="progress-bar-content">
            <div class="progress-bar">
              <span class="progress-val"></span>
            </div>
          </div>

          <button class="next-page-about" name="btn-submit">
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
  <script src="./../script/resize-windown.js"></script>
</body>

</html>