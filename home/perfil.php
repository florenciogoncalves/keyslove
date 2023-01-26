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
  <title>Perfil &mid; Keyslov</title>
  <link rel="shortcut icon" href="./../images/favicon.svg" type="image/x-icon" />
  <link rel="stylesheet" href="./../style/css/style.css" />
  <link rel="stylesheet" href="./../style/css/style-responsivo.css" />
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

            <div class="this-status">
              <input type="radio" name="online-agora" id="invisivel" value="invisivel" class="s-status" />
              <label for="invisivel">Invisível</label>
            </div>
          </div>
        </div>
      </div>

      <nav>
        <ul id="menu-left">
          <li>
            <a href="./perfil.php" class="pagina-selecionada">Perfil</a>
          </li>
          <li><a href="chamada.php">Chamada de video</a></li>
          <li><a href="carroussel.php">Carroussel</a></li>
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

  <div id="perfil-container">
    <section class="perfil-spliter">
      <main id="perfil">
        <ul class="home-bar">
          <li class="visualized"></li>
          <li class="visualized"></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
        </ul>

        <div class="home-nav">
          <button id="preview-carroussel">&lt;</button>
          <button id="next-carroussel">&gt;</button>
        </div>



        <div class="add-more-photos">

          <span class="add-box"><input type="file" accept="image/png, image/jpeg" name="foto-1" /><button></button></span>
          <span class="add-box"><input type="file" accept="image/png, image/jpeg" name="foto-2" /><button></button></span>
          <span class="add-box"><input type="file" accept="image/png, image/jpeg" name="foto-3" /><button></button></span>
          <span class="add-box"><input type="file" accept="image/png, image/jpeg" name="foto-4" /><button></button></span>

        </div>
        <img src="" id="main-image" />
        <p class="__background-text">Escolha antes uma Foto</p>
      </main>

      <section id="perfil-information">
        <?php
        if (isset($_SESSION['username'])) :
        ?>


          <h2>
          <?= $_SESSION['username'];
        endif ?>
          </h2>
          <span>Idade:
            <?php


            $fullYear = new profileModel();
            echo UserAge($fullYear->userAge());

            ?>
            anos
          </span>

          <!--   -->


          <div>

            <h3>Descrição</h3>
            <textarea placeholder="Lorem Ipsum dolor sit amet" name="description"></textarea>
          </div>
          <h3>Tags</h3>
          <div>
            <input type="checkbox" id="tag-cachorros" />
            <label for="tag-cachorros" name="tag-cachorros">Cachorros</label><input type="checkbox" id="tag-design" name="tag-cachorros" />
            <label for="tag-design" name="tag-gatos">Desing</label><input type="checkbox" id="tag-gatos" name="tag-gatos" />
            <label for="tag-gatos" name="tag-gatos">Gatos</label><input type="checkbox" id="tag-geografia" name="tag-gatos" />
            <label for="tag-geografia" name="tag-geografia">Geografia</label>
            <button class="add-option-before">+ Adicionar</button>
          </div>
          <h3>Signo</h3>

          <div>
            <input type="radio" id="signo-virgem" />
            <label for="signo-virgem">Virgem</label>
            <button class="add-option-before">+ Adicionar</button>
          </div>

          <button style="width: 100%; line-height: 40px;">Postar</button>

      </section>
    </section>
    <form action="./../_app/controllers/profileController.php" method="post" enctype="multipart/form-data">

    </form>

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

  <dialog id="modal-perfil-1">
    <div>
      <img src="./../images/capture-red.svg" alt="">
      <h1>melhore seu perfil</h1>
      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
        standard dummy text ever since the 1500s, when an unknown printer took a galley of type </p>
      <button class="red-btn">Melhorar agora</button>
      <button class="simple-btn">Talvez mais tarde</button>
      <button class="close-modal simple-btn">X</button>
    </div>
  </dialog>

  <dialog id="add-option-modal">
    <div>
      <img src="./../images/edit.svg">
      <h1>Adicione uma tag</h1>
      <p>Informe a seguir o valor que deseja adicionar</p>
      <input type="text" placeholder="Valor a adicionar">
      <button id="add-elemento" class="red-btn">Adicionar</button>
      <button class="simple-btn">Cancelar</button>
      <button class="close-modal simple-btn">X</button>
    </div>
  </dialog>

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