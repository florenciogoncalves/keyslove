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
  <title>Mensagens &mid; Keyslov</title>
  <link rel="shortcut icon" href="./../images/favicon.svg" type="image/x-icon" />
  <link rel="stylesheet" href="./../style/style.css" />
  <link rel="stylesheet" href="./../style/style-responsivo.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/autosize.js/4.0.2/autosize.min.js"></script>
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
              <li class="goto-blocked">Membros Bloqueados</li>
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
          <li><a href="perfil.php">Perfil</a></li>
          <li><a href="chamada.php">Chamada de video</a></li>
          <li><a href="carroussel.php">Carroussel</a></li>
          <li><a href="curtidas.php">Curtidas</a></li>
          <li><a href="planos.php">Planos</a></li>
          <li><a href="favoritos.php">Favoritos</a></li>
          <li><a href="configuracoes.php">Configurações</a></li>
          <li>
            <a href="mensagens.php" class="pagina-selecionada">Mensagens</a>
          </li>
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
    <main id="mensagens">
      <div class="peoples-to-chat">
        <h2>Últimas mensagens</h2>
        <ul class="list-peoples">
          <li class="person" id="person-selected">
            <div class="foto-de-perfil">
              <img src="./../debug-images/temp.png" alt="Foto de perfil" class="img-perfil" />
              <div class="status"></div>
            </div>
            <div class="dados">
              <span>Lorem ipsum</span>
              <p>Pessoas conversando normal</p>
            </div>
          </li>

          <li class="person">
            <div class="foto-de-perfil">
              <img src="./../debug-images/temp.png" alt="Foto de perfil" class="img-perfil" />
              <div class="status"></div>
            </div>
            <div class="dados">
              <span>Lorem ipsum</span>
              <p>Pessoas conversando normal</p>
            </div>
          </li>

          <li class="person">
            <div class="foto-de-perfil">
              <img src="./../debug-images/temp.png" alt="Foto de perfil" class="img-perfil" />
              <div class="status"></div>
            </div>
            <div class="dados">
              <span>Lorem ipsum</span>
              <p>Pessoas conversando normal</p>
            </div>
          </li>
          <li class="person">
            <div class="foto-de-perfil">
              <img src="./../debug-images/temp.png" alt="Foto de perfil" class="img-perfil" />
              <div class="status"></div>
            </div>
            <div class="dados">
              <span>Lorem ipsum</span>
              <p>Pessoas conversando normal</p>
            </div>
          </li>
          <li class="person">
            <div class="foto-de-perfil">
              <img src="./../debug-images/temp.png" alt="Foto de perfil" class="img-perfil" />
              <div class="status"></div>
            </div>
            <div class="dados">
              <span>Lorem ipsum</span>
              <p>Pessoas conversando normal</p>
            </div>
          </li>
          <li class="person">
            <div class="foto-de-perfil">
              <img src="./../debug-images/temp.png" alt="Foto de perfil" class="img-perfil" />
              <div class="status"></div>
            </div>
            <div class="dados">
              <span>Lorem ipsum</span>
              <p>Pessoas conversando normal</p>
            </div>
          </li>
          <li class="person">
            <div class="foto-de-perfil">
              <img src="./../debug-images/temp.png" alt="Foto de perfil" class="img-perfil" />
              <div class="status"></div>
            </div>
            <div class="dados">
              <span>Lorem ipsum</span>
              <p>Pessoas conversando normal</p>
            </div>
          </li>
          <li class="person">
            <div class="foto-de-perfil">
              <img src="./../debug-images/temp.png" alt="Foto de perfil" class="img-perfil" />
              <div class="status"></div>
            </div>
            <div class="dados">
              <span>Lorem ipsum</span>
              <p>Pessoas conversando normal</p>
            </div>
          </li>
          <li class="person">
            <div class="foto-de-perfil">
              <img src="./../debug-images/temp.png" alt="Foto de perfil" class="img-perfil" />
              <div class="status"></div>
            </div>
            <div class="dados">
              <span>Lorem ipsum</span>
              <p>Pessoas conversando normal</p>
            </div>
          </li>
          <li class="person">
            <div class="foto-de-perfil">
              <img src="./../debug-images/temp.png" alt="Foto de perfil" class="img-perfil" />
              <div class="status"></div>
            </div>
            <div class="dados">
              <span>Lorem ipsum</span>
              <p>Pessoas conversando normal</p>
            </div>
          </li>
          <li class="person">
            <div class="foto-de-perfil">
              <img src="./../debug-images/temp.png" alt="Foto de perfil" class="img-perfil" />
              <div class="status"></div>
            </div>
            <div class="dados">
              <span>Lorem ipsum</span>
              <p>Pessoas conversando normal</p>
            </div>
          </li>
          <li class="person">
            <div class="foto-de-perfil">
              <img src="./../debug-images/temp.png" alt="Foto de perfil" class="img-perfil" />
              <div class="status"></div>
            </div>
            <div class="dados">
              <span>Lorem ipsum</span>
              <p>Pessoas conversando normal</p>
            </div>
          </li>
          <div class="gradient"></div>
        </ul>
      </div>
      <section class="chat">
        <div id="friend-information">
          <figure>
            <div class="foto-de-perfil">
              <img src="./../debug-images/temp.png" alt="Foto de perfil" class="img-perfil" />
              <div class="friend-status"></div>
            </div>
            <figcaption>
              <h2>Lorem Ipsun Silva</h2>
            </figcaption>
            <div class="botoes-top">
              <a href="/home/chamada.php"><button class="video-call"></button></a>
              <button class="options"></button>
              <div class="options-container">
                <div class="translate">
                  <span>
                    Translate
                    <label for="active-translator">
                      <input type="checkbox" id="active-translator" />
                      <span class="translate-on-off"></span>
                    </label>
                  </span>
                  <div class="talk-now">
                    <div class="img-1-container">
                      <img src="./../images/br-icon.svg" alt="Brasil" class="img-2" />
                      <span>Port</span>
                    </div>
                    &nbsp;
                    <img src="./../images/Group 8777.svg" id="invert-language" />&nbsp;
                    <div class="img-2-container">
                      <img src="./../images/usa-icon.svg" alt="Inglês" class="img-1" />
                      <span>Inglês</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </figure>
        </div>
        <section id="privado">
          <div id="sended">
            <!-- Contém as mensagens enviadas -->
            <div class="the-message-container">
              <div class="identifier">
                <object data="./../debug-images/temp-5.png"></object>
                <span>Lorem ipsum <span>&middot;</span> as 14:40</span>
              </div>
              <!-- Contém a mensagem já enviada -->
              <div class="text-container">
                <p class="writed-message blur">
                  Lorem ipsum dolor sit amet. Quo voluptas tenetur et
                  similique molestias est
                </p>
                <div class="interaction">
                  <div class="interaction-info">
                    <img src="./../images/unlocked.svg" />
                    <span>Lorem ipsum dolor sit amet. Quo voluptas tenetur et
                      similique molestias est
                    </span>
                  </div>
                  <a href="planos.php"><button class="confirm">Assinar pacote</button></a>
                </div>
              </div>
            </div>
            <div class="the-message-container user">
              <div class="identifier">
                <span>Hoje <span>&middot;</span> as 14:40</span>
              </div>
              <!-- Contém cada mensagem já enviada -->
              <div class="text-container">
                <p class="writed-message">
                  Lorem ipsum dolor sait amet. Quo voluptas tenetur et
                  similique molestias est
                </p>
              </div>
            </div>
            <div class="the-message-container">
              <div class="identifier">
                <object data="./../debug-images/temp-5.png"></object>
                <span>Lorem ipsum <span>&middot;</span> as 14:40</span>
              </div>
              <!-- Contém a mensagem já enviada -->
              <div class="text-container">
                <p class="writed-message">
                  Lorem ipsum dolor sit amet. Quo voluptas tenetur et
                  similique molestias est
                </p>
              </div>
            </div>
            <div class="the-message-container user">
              <div class="identifier">
                <span>Hoje <span>&middot;</span> as 14:40</span>
              </div>
              <!-- Contém cada mensagem já enviada -->
              <div class="text-container">
                <p class="writed-message">
                  Lorem ipsum dolor sit amet. Quo voluptas tenetur et
                  similique molestias est
                </p>
              </div>
            </div>
          </div>
          <div id="create-message">
            <input type="file" id="select-file" style="display: none" />
            <label class="add-media" for="select-file">+</label>
            <div class="message-text-container">
              <textarea rows="1" id="message-text" placeholder="Escreva a mensagem..."></textarea>
              <button class="send-message" onclick="enviar()"></button>
            </div>
          </div>
        </section>
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