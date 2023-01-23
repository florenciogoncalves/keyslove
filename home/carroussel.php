<?php
require_once __DIR__ . "./../_app/models/profileModel.php";
require_once __DIR__ . "./../_app/boot/helpers.php";
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
  <title>Carroussel &mid; Keyslov</title>
  <link rel="shortcut icon" href="./../images/favicon.svg" type="image/x-icon" />

  <link rel="stylesheet" href="./../style/css/style.css" />
  <link rel="stylesheet" href="./../style/css/style-responsivo.css" />


  <style>
    .carrousselPhoto {
      width: 721px !important;
      height: 963px !important;
    }

    .alert {
      position: relative;
      padding: 1rem 1rem;
      margin-bottom: 1rem;
      border: 1px solid transparent;
      border-radius: 0.25rem;
    }

    .alert-warning {
      color: #664d03;
      background-color: #fff3cd;
      border-color: #ffecb5;
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
          $empty = new stdClass();

          if (!$get) {
            $empty->alert = 'none';
          }

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

            <?php

            ?>

            <div class="this-status">
              <input type="radio" name="online-agora" id="invisivel" value="invisivel" class="s-status" />
              <label for="invisivel">Invisível</label>
            </div>
          </div>
        </div>
      </div>

      <nav>
        <ul id="menu-left">
          <li><a href="./perfil.php">Perfil</a></li>
          <li><a href="chamada.php">Chamada de video</a></li>
          <li><a href="#" class="pagina-selecionada">Carroussel</a></li>
          <li><a href="curtidas.php">Curtidas</a></li>
          <li><a href="planos.php">Planos</a></li>
          <li><a href="favoritos.php">Favoritos</a></li>
          <li><a href="configuracoes.php">Configurações</a></li>
          <li><a href="mensagens.php">Mensagens</a></li>
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

    <main id="carroussel">
      <h1 class="title">Carroussel</h1>

      <figure id="informacoes-perfil">


        <?php
        if (!isset($empty->alert)) :
        ?>

          <img src="./../_storage/images/<?= $get['photo']; ?>" alt="Foto de perfil" class="carroussel-photo" />
        <?php
        endif;
        ?>
        <figcaption id="descricao-perfil">

          <?php

          $data = new profileModel();
          $for = $data->getUserToCarroussel();

          $others = $data->User('tb_job_tb', 'user', $_SESSION['username']);

          $about = $data->User('tb_sobre_mim', 'user', $_SESSION['username'], '!=');

          if (!$for) :
            $empty->alertNotUserYet = '<h3><center>Nenhum usuário disponível no momento para ser exibido!</center></h3>';
            $empty->empty = '';
          endif;

          ?>



          <h2>
            <?php
            if (isset($empty->alert)) :
              echo $empty->alertNotUserYet;
            else :
              echo $for['nome'];
            endif;
            ?>
          </h2>

          <p>
            <?php
            if (!isset($empty->alertNotUserYet)) :
              echo $others['cargo'];
            else :
              echo $empty->empty;
            endif;

            ?>
            <?php
            if (!isset($empty->alertNotUserYet)) :
            ?>
              <span>&middot;</span>
            <?php
            else :
              echo $empty->empty;
            endif;
            ?>
            <span class="idade">
              <?php


              $fullYear = new profileModel();
              if (!isset($empty->alertNotUserYet)) :
                $getY = $fullYear->Age('data_nascimento', $for['nome']);
                $show = UserAge($getY);
                echo $show;
              endif;

              ?>
              <?php
              if (!isset($empty->alertNotUserYet)) :
              ?>
            </span>&nbsp;anos
          <?php
              endif;
          ?>
          </p>
          <p>
            <?php
            if (isset($empty->alertNotUserYet)) :
              echo $empty->empty;
            else :
              echo $about['sobre'] . "<br>";
            endif; ?>
          </p>
          <?php
          if (!isset($empty->alertNotUserYet)) :
          ?>
            <div class="botoes">

              <form action="./../_app/controllers/curtidasController.php" method="post">

                <button class="dislike" name="deslike" value="<?= $for['nome']; ?>"></button>
                <button class="like" name="like" value="<?= $for['nome']; ?>"></button>
              </form>

              <?php
              if (isset($_SESSION['message'])) :
              ?>

                <script>
                  alert("<?php echo $_SESSION['message']; ?>");
                  // unset(<?php $_SESSION['message']; ?>);
                  <?php

                  ?>
                </script>
              <?php
                unset($_SESSION['message']);
              endif;
              ?>
            </div>
          <?php
          else :
            echo $empty->empty;
          endif;
          ?>
        </figcaption>
      </figure>


      <?php
      $teste = new profileModel();
      ?>


      <section class="outras-pessoas">



        <?php
        $fullYear = new profileModel();
        $age = UserAge($fullYear->userAge());


        // $get = ;
        // $dd = $fullYear->User('tb_cadastroConta2', 'nome', $_SESSION['username'], '!=', 'fetchAll', 4);



        $user = $teste->User('tb_job_tb', 'user', $_SESSION['username'], '!=', 'fetchAll');
        foreach ($user as $item) {
          $_SESSION['nameUser'] = $item['user'];
          $Modal = $photo->User('tb_photos', 'user', $item['user'], '=');

          $getY = $fullYear->Age('data_nascimento', $item['user']);
          $show = UserAge($getY);

          echo "
          <div class='outro-perfil'>
          <img src='./../_storage/images/{$Modal['photo']}'alt='Foto Perfil'>
          <div class='textual'>
          {$item['user']}

          <p>
          {$item['cargo']}<span>&middot;</span>
          <span class='idade'>
            {$show}
          </span> &nbsp;anos
          </p>
          </div>

          <a href='mensagens.php?user={$item['user']}'>
          <button class='conversar'></button>
        </a>

          </div>";
        }

        ?>


      </section>

    </main>
    <footer id="footer-mobile">
      <nav>
        <ul>
          <li><a href="./index.html"></a></li>
          <li><a href="./localizar-pessoas.html"></a></li>
          <li><a href="./favoritos.html"></a></li>
          <li><a href="./mensagens.html"></a></li>
          <li><button id="mostra-menu-mobile"></button></li>
        </ul>
      </nav>
    </footer>
  </div>

  <script src="./../script/script.js"></script>
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