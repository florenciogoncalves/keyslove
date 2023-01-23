<?php
require_once __DIR__ . "./../_app/models/profileModel.php";


?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>

  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Métodos de pagamento &middot; Keyslov</title>
  <link rel="shortcut icon" href="./../images/favicon.svg" type="image/x-icon" />
  <link rel="stylesheet" href="./../style/css/style.css" />
  <link rel="stylesheet" href="./../style/css/style-responsivo.css" />


  <style>
    .padrao {
      min-height: max-content;
      height: calc(100vh - 100px);
      max-height: max-content;
      padding: 40px 30px;
    }

    .alert {
      position: relative;
      padding: 1rem 1rem;
      margin-bottom: 1rem;
      border: 1px solid transparent;
      border-radius: 0.25rem;
    }

    .alert-danger {
      color: #842029;
      background-color: #f8d7da;
      border-color: #f5c2c7;
    }

    .alert-success {
      color: #0f5132;
      background-color: #d1e7dd;
      border-color: #badbcc;
    }

    .text-center {
      text-align: center;
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

      <?php
      if (isset($_SESSION['return'])) :
      ?>

        <div class="alert alert-success text-center" role="alert">

          <?php

          echo $_SESSION['return'];
          unset($_SESSION['return']);

          ?>

        </div>

      <?php
      endif;
      ?>

      <section id="metodo-pagamento">
        <h1 class="title">Métodos de Pagamento</h1>
        <div class="method-container">
          <section class="left-side">

            <h3>Cadastrar cartão de credito</h3>

            <form action="./../_app/controllers/planosController.php" method="post" class="left-side" novalidate>


              <label for="">Número do cartão</label>
              <input type="number" placeholder="Insira o número" name="card-number" />
              <label for="">Nome do titular</label>
              <input type="text" id="" placeholder="Nome titular" name="card-titular" />
              <div class="card-validity">
                <div>
                  <span>Mês</span>
                  <select class="select-placeholder" name="mes">
                    <option hidden selected disabled value="">MM</option>
                  </select>
                </div>

                <div>
                  <span>Ano</span>
                  <select class="select-placeholder" name="ano">
                    <option hidden disabled selected value="">AAAA</option>
                  </select>
                </div>

                <div>
                  <span>CVV</span>
                  <input type="number" placeholder="CVV" name="cvv" />
                </div>
              </div>
              <select name="parcelas">
                <option hidden selected name="parcelas">Número de parcelas</option>
                <option value="1">1 parcela</option>
                <option value="2">2 parcelas</option>
                <option value="3">3 parcelas</option>
                <option value="4">4 parcelas</option>
              </select>
              <button class="btn-register" id="btn">Salvar método de pagamento</button>

          </section>
          <section class="right-side">
            <section id="payment-method" name="metodoPagamento">
              <!-- As opções aqui são dinamicamente inseridas pelo JavaScript -->
            </section>


            </form>

          

            <div id="card-bank">
              <div class="bank-indicative">
                <img src="./../images/card-chip.svg" alt="" />
                <span>banco</span>
              </div>
              <span id="card-number">XXXXXXXXXXXXXXXX</span>
              <div>
                <span>Nome exemplo</span>
                <span>09/29</span>
              </div>
            </div>
          </section>
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