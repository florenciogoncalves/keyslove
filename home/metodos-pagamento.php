<?php

session_start();

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Métodos de pagamento &middot; Keyslov</title>
  <link rel="shortcut icon" href="./../images/favicon.svg" type="image/x-icon" />
  <link rel="stylesheet" href="./../style/style.css" />
  <link rel="stylesheet" href="./../style/style-responsivo.css" />
  <style>
    .padrao {
      min-height: max-content;
      height: calc(100vh - 100px);
      max-height: max-content;
      padding: 40px 30px;
    }
  </style>
</head>

<body>
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
          <li><a href="./perfil.html">Perfil</a></li>
          <li><a href="chamada.html">Chamada de video</a></li>
          <li><a href="carroussel.html">Carroussel</a></li>
          <li><a href="curtidas.html">Curtidas</a></li>
          <li>
            <a href="planos.html" class="pagina-selecionada">Planos</a>
          </li>
          <li><a href="favoritos.html">Favoritos</a></li>
          <li><a href="configuracoes.html">Configurações</a></li>
          <li>
            <a href="mensagens.html">Mensagens</a>
          </li>
          <li><a href="servicos.html">Serviços</a></li>
          <li><a href="online.html">Online agora</a>
          </li>
          <li><a href="teste-de-amor.html">Teste de amor</a></li>
        </ul>
      </nav>
      <a href="localizar-pessoas.html">
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
      <section id="metodo-pagamento">
        <h1 class="title">Métodos de Pagamento</h1>
        <div class="method-container">
          <section class="left-side">
            <h3>Cadastrar cartão de credito</h3>
            <label for="">Número do cartão</label>
            <input type="number" placeholder="Insira o número" />
            <label for="">Nome do titular</label>
            <input type="text" id="" placeholder="Nome titular" />
            <div class="card-validity">
              <div>
                <span>Mês</span>
                <select class="select-placeholder">
                  <option hidden selected disabled value="">MM</option>
                </select>
              </div>

              <div>
                <span>Ano</span>
                <select class="select-placeholder">
                  <option hidden disabled selected value="">AAAA</option>
                </select>
              </div>

              <div>
                <span>CVV</span>
                <input type="number" placeholder="CVV" />
              </div>
            </div>
            <select>
              <option hidden selected>Número de parcelas</option>
              <option value="1">1 parcela</option>
              <option value="2">2 parcelas</option>
              <option value="3">3 parcelas</option>
              <option value="4">4 parcelas</option>
            </select>
            <button class="btn-register">Salvar método de pagamento</button>
          </section>
          <section class="right-side">
            <section id="payment-method">
              <!-- As opções aqui são dinamicamente inseridas pelo JavaScript -->
            </section>

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