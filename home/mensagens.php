<?php


require_once __DIR__ . "./../_app/models/messageModel.php";
include_once __DIR__ . "/../_app/boot/helpers.php";
include_once __DIR__ . "/app/Models/Model.php";
if (!$_SESSION['username']) {
  header("Location: ../");
  $_SESSION['messageAuth'] = "Precisa Fazer Login Primeiro!";
}

$Model = new Model();
$token = generateRandomString(50);


?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Mensagens &mid; Keyslov</title>
  <link rel="shortcut icon" href="./../images/favicon.svg" type="image/x-icon" />
  <link rel="stylesheet" href="./../style/css/style.css" />
  <link rel="stylesheet" href="./../style/css/style-responsivo.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/autosize.js/4.0.2/autosize.min.js"></script>

  <style>
    .sender_img {
      width: 42px;
      height: 42px;
      border-radius: 50px;
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
            <a href="bloqueados.php" class="pessoas-bloqueadas">
              <li class="goto-blocked">Membros Bloqueados</li>
            </a>
            <a class="logout" href="./../index.php">
              <li>Sair</li>
            </a>
          </ul>
        </div>
        <div id="online-now">
          <div class="changing-status">
            <div class="this-status">
              <input type="radio" name="online-agora" value="online" id="online" class="s-status" />
              <label for="online">Online</label>
            </div>

            <div class="this-status">
              <input type="radio" name="online-agora" id="ocupado" value="ocupado" class="s-status" />
              <label for="ocupado">Ocupado</label>
            </div>

            <div class="this-status">
              <input type="radio" name="online-agora" id="invisivel" value="invisivel" class="s-status" />
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

        <?php

        $model = new messageModel();
        $getAll = $model->User('tb_curtidas', 'curtiu', $_SESSION['username'], '=', 'fetch');
        $_SESSION['reciver'] = $_GET['user'] ?? $getAll['curtido'];

        if (!isset($_GET['user'])) {
          $peopleToChat = $model->User('tb_curtidas', 'curtiu', $_SESSION['username'], '=', 'fetch', 1);
          $_GET['user'] = $peopleToChat['curtido'];
        }
        $peopleToChat = $model->User('tb_curtidas', 'curtiu', $_SESSION['username'], '=', 'fetchAll');

        if (!$peopleToChat) {
          header("Location: ./carroussel.php");
        }

        $sender_photo = $model->User('tb_photos', 'user', $_SESSION['username']);


        foreach ($peopleToChat as $users) {



          $user = $users['curtido'] ?? $_GET['user'];




          $reciver_photo_user = $model->User('tb_photos', 'user', $user, '=');
          $_SESSION['photo'] = $reciver_photo_user;
          $short_message_user = $model->where('tb_mensagens', '=', 'sender', $user);



        ?>
          <a href="?user=<?= $users['curtido'] . "&token={$token}&display=flexbox" ?? null; ?>" style="text-decoration:none;color:black">
            <ul class="list-peoples">
              <li class="person" id="person-selected">
                <div class="foto-de-perfil">
                  <img src="./../_storage/images/<?= $reciver_photo_user['photo']; ?>" alt="Foto de perfil" class="img-perfil" />
                  <div class="status"></div>
                </div>
                <div class="dados">
                  <span>
                    <?php

                    if (isset($short_message_user['sender'])) {
                      echo  $short_message_user['sender'];
                    } else {
                      echo $user;
                    }
                    ?></span>
                  <p>
                    <?php
                    echo $short_message_user['message'] ?? 'Me envie uma mensagem!';
                    ?></p>
                </div>
              </li>
            </ul>
          </a>
        <?php
        }

        ?>


      </div>


      <?php
      if (isset($_GET['display'])) {
        $display = $_GET['display'];
      }
      ?>

      <section class="chat" style="display: <?= $display ?? "none"; ?>;">



        <div id="friend-information">
          <figure>
            <div class="foto-de-perfil">
              <?php
              foreach ($Model->userPhoto($_GET['user']) as $profilePhoto);
              ?>
              <img src="./../_storage/images/<?= $profilePhoto['photo'] ?>" alt="Foto de perfil" class="img-perfil" />
              <div class="friend-status"></div>
            </div>
            <figcaption>
              <h2>
                <?php
                // if (isset($reciver)) {
                //   echo $reciver;
                // }
                echo $_GET['user'] ?? $user;
                ?>
              </h2>
            </figcaption>



            <div class="botoes-top">
              <a href="/home/chamada.php"><button class="video-call"></button></a>
              <button class="options"></button>
              <div class="options-container">
                <div class="translate">
                  <span class="label">
                    Translate
                    <label for="active-translator">
                      <input type="checkbox" id="active-translator" />
                      <span class="translate-toggle"></span>
                    </label>
                  </span>
                  <div class="talk-now">
                    <div class="img-1-container">
                      <img src="./../images/br-icon.svg" alt="Brasil" class="img-2" />
                      <span>Port</span>
                    </div>
                    <img src="./../images/Group 8777.svg" id="invert-language" />
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
            <?php
            include_once __DIR__ . "/../_app/boot/helpers.php";
            $model = new messageModel();

            $user = $_GET['user'] ?? $getAll['curtido'];


            $getMessageByActiveUser = $model->showMessages($_SESSION['username'], $user, 110);



            foreach ($getMessageByActiveUser as $message) {




              $hora = $message['created_at'];
              $str1 = explode(' ', $hora);
              $str2 = $str1[1];
              $sendHour = getHour($str2);
              if ($message['sender'] == $_SESSION['username']) :

            ?>


                <div class='the-message-container user'>
                  <div class='identifier'>
                    <span class="__sended-data"><?= $sendHour ?></span>
                  </div>


                  <div class='text-container'>
                    <p class='writed-message'>
                      <?= $message['message'] ?>
                    </p>
                  </div>
                </div>
              <?php
              else :
              ?>

                <div class='the-message-container'>
                  <div class='identifier'>
                    <object data='./../_storage/images/<?= $sender_photo['photo'] ?>' class='sender_img'></object>
                    <span class="__sended-data"><b><?= $user ?></b><span> &middot; </span> as <?= $sendHour ?></span>
                  </div>

                  <div class='text-container'>
                    <p class='writed-message'>
                      <?= $message['message'] ?>
                    </p>
                  </div>

                </div>





            <?php

              endif;
            }

            ?>


          </div>


          <form method="POST" action="./../_app/controllers/messageController.php" enctype="multipart/form-data">

            <div id="create-message">
              <input type="file" id="select-file" style="display: none" name="fileUser" />
              <label class="add-media" for="select-file">+</label>
              <div class="message-text-container">
                <textarea rows="1" id="message-text" placeholder="Escreva a mensagem..." name="message"></textarea>
                <button class="send-message" onclick="enviar()" type="submit" name="submitBtn"></button>
              </div>
            </div>

          </form>


        </section>



      </section>
    </main>
    <footer id="footer-mobile">
      <nav>
        <ul>
          <li><a href="./index.php"></a></li>
          <li><a href="./localizar-pessoas.php"></a></li>
          <li><a href="./favoritos.php"></a></li>
          <li id="nav-selecionada"><a href="./mensagens.php"></a></li>
          <li><button id="mostra-menu-mobile"></button></li>
        </ul>
      </nav>
    </footer>
  </div>

  <script src="./../script/script.js"></script>
  <script src="./../script/message.js" defer></script>
  <script>
    const status = localStorage.getItem('status');

    for (c = 0; c < 3; c++) {
      const btn = document.getElementsByClassName('s-status')[c]
      btn.addEventListener('click', () => {
        window.location.href = './app/Controllers/statusController.php?status=' + btn.value
      })
    }
  </script>
</body>

</html>