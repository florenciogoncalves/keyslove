<?php

require_once __DIR__ . "./../_app/models/profileModel.php";
require_once __DIR__ . "./../_app/boot/helpers.php";

// session_start();
if (!isset($_SESSION['step']) || $_SESSION['step'] < 6) {
  header("Location: ./../cadastro/cadastro-6.php");
}

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
          $get = $photo->User('tb_photos', 'user', $_SESSION['username'], '!=');
          $profile = $photo->User('tb_photos', 'user', $_SESSION['username'], '=');
          ?>


          <div class="foto-de-perfil">
            <img src="./../_storage/images/<?= $profile['photo']; ?>" alt="Foto de perfil" id="img-perfil" />

            <div class="status"></div>
          </div>

          <?php
          if (isset($_SESSION['username'])) :
          ?>

            <figcaption>
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

      <nav id="nav">
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
      <form action="./../_app/controllers/trabalhoController.php" method="POST" class="principal-content">
        <header class="content-header">
          <img src="./../images/Book_check_fill.svg" />
          <h1 class="__title">Trabalho e Profissão</h1>
        </header>

        <div id="container-elements">
          <div class="iten">
            <label for="cargo">Cargo</label>
            <input type="text" id="cargo" placeholder="exemplo" name="cargo" required />
          </div>

          <div class="iten">
            <label for="empresa">Empresa</label>
            <input type="text" id="empresa" placeholder="exemplo" name="empresa" required />
          </div>

          <div class="iten">
            <label for="formado-em">Formado em:</label>
            <input type="text" id="formado-em" placeholder="exemplo" name="formacao" required />
          </div>

          <div class="iten">
            <label for="regime-trabalho">Regime de trabalho</label>
            <select id="regime-trabalho" name="regime-trabalho" required>
              <option selected disabled hidden value="">exemplo</option>
              <option value="clt">CLT</option>
              <option value="contratacao-temporaria">
                Contratação temporária
              </option>
              <option value="trabalho-autonomo">Trabalho Autônomo</option>
              <option value="estagio">Estágio</option>
              <option value="jovem-aprendiz">Jovem aprendiz</option>
              <option value="freelancer">Freelancer</option>
              <option value="trabalho-parcial">Terceirização</option>
              <option value="trabalho remoto">Trabalho Remoto</option>
              <option value="trabalho-intermitente">
                Trabalho Intermitente
              </option>
            </select>
          </div>

          <div class="iten">
            <label for="renda-anual">Renda Anual</label>
            <!-- <select id="renda-anual" name="renda-anual">
                <option selected disabled hidden>exemplo</option></select> -->
            <input list="renda" id="renda-anual" name="renda-anual" placeholder="exemplo" required>

            <datalist id="renda">
              <option value="Mínimo">13.200,00 R$</option>
              <option value="Médio">84.000,00 R$</option>
              <option value="Máximo">180.000,00 R$</option>
            </datalist>
          </div>

          <div class="iten">
            <label for="situacao-moradia">Situação de moradia</label>
            <select id="situacao-moradia" name="situacao-moradia" required>
              <option selected disabled hidden>exemplo</option>
              <option value="casa-propria">Casa própria</option>
              <option value="Aluguel">Aluguel</option>
              <option value="casa-dos-pais">Casa dos pais</option>
              <option value="Outra...">Outra...</option>
            </select>
          </div>

          <div class="iten">
            <label for="disp-mudar-pais">Disposição para mudar de país</label>
            <select id="disp-mudar-pais" name="disp-mudar-pais" required>
              <option selected disabled hidden>exemplo</option>
              <option value="Disponível">Disponível</option>
              <option value="por-um-certo-prazo">Por um certo prazo</option>
              <option value="Tanto faz">Tanto faz</option>
              <option value="Não quero">Não disponível</option>
            </select>
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