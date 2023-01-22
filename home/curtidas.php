<?php

session_start();
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
  <title>Curtidas &mid; Keyslov</title>
  <link rel="shortcut icon" href="./../images/favicon.svg" type="image/x-icon" />
  <link rel="stylesheet" href="./../style/css/style.css" />
  <link rel="stylesheet" href="./../style/css/style-responsivo.css" />

  <style>
    .photoModal {
      width: 271px !important;
      height: 302px !important;
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
          <li>
            <a href="curtidas.php" class="pagina-selecionada">Curtidas</a>
          </li>
          <li><a href="planos.php">Planos</a></li>
          <li><a href="favoritos.php">Favoritos</a></li>
          <li><a href="configuracoes.php">Configurações</a></li>
          <li>
            <a href="mensagens.php">Mensagens</a>
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
    <main class="padrao" id="curtidas">
      <h1 class="title">Curtidas</h1>


      <?php
      $getLiked = new profileModel();

      $user = $getLiked->User('tb_curtidas', 'curtiu', $_SESSION['username'], '=', 'fetchAll');


      foreach ($user as $item) {



        $getterPhoto = $getLiked->User('tb_job_tb', 'user', $item['curtido'], '=', 'fetchAll');
        foreach ($getterPhoto as $item2) {
          $_SESSION['nameUser'] = $item2['user'];
          $Modal = $getLiked->User('tb_photos', 'user', $item2['user'], '=');


          
        }




        if ($item['action'] == 'like') {
          $button = "<button class='dislike'name='deslike' value='{$item['curtido']}'></button>";
        } else {
          $button = "<button class='like'name='like' value='{$item['curtido']}'></button>";
        }
        echo "
        <ul class='list'>
        <li>
        <img src='./../_storage/images/{$Modal['photo']}' class='photoModal'/>
          <section>
            <article>
              <div>
                <div class='status-div'></div>
                <span>{$item['curtido']}</span>
              </div>
              <ul>
                <li>Drinks</li>
                <li>Drinks</li>
                <li>Drinks</li>
              </ul>
            </article>
              <div class='botoes'>
            <form action='./../_app/controllers/curtidasController.php' method='post'>
                {$button}
            </form>

              </div>
          </section>
        </li>
        </ul>
        
        
        ";
      }
      ?>
      <!--

      <ul class="list">
        <li>


          <img src="./../debug-images/temp-4.png" />
          <section>
            <article>
              <div>
                <div class="status-div"></div>
                <span>Lorem Ipsumssssssssssssssss</span>
              </div>
              <ul>
                <li>Drinks</li>
                <li>Drinks</li>
                <li>Drinks</li>
              </ul>
            </article>
            <div class="botoes">
              <button class="dislike"></button>
              <button class="like"></button>
            </div>
          </section>
        </li>
     
       

        <li>
          <img src="./../debug-images/temp-4.png" />
          <section>
            <article>
              <div>
                <div class="status-div"></div>
                <span>Lorem Ipsumssssssssssssssss</span>
              </div>
              <ul>
                <li>Drinks</li>
                <li>Drinks</li>
                <li>Drinks</li>
              </ul>
            </article>
            <div class="botoes">
              <button class="dislike"></button>
              <button class="like"></button>
            </div>
          </section>
        </li>
        <li>
          <img src="./../debug-images/temp-4.png" />
          <section>
            <article>
              <div>
                <div class="status-div"></div>
                <span>Lorem Ipsumssssssssssssssss</span>
              </div>
              <ul>
                <li>Drinks</li>
                <li>Drinks</li>
                <li>Drinks</li>
              </ul>
            </article>
            <div class="botoes">
              <button class="dislike"></button>
              <button class="like"></button>
            </div>
          </section>
        </li>
        <li>
          <img src="./../debug-images/temp-4.png" />
          <section>
            <article>
              <div>
                <div class="status-div"></div>
                <span>Lorem Ipsumssssssssssssssss</span>
              </div>
              <ul>
                <li>Drinks</li>
                <li>Drinks</li>
                <li>Drinks</li>
              </ul>
            </article>
            <div class="botoes">
              <button class="dislike"></button>
              <button class="like"></button>
            </div>
          </section>
        </li>
        <li>
          <img src="./../debug-images/temp-4.png" />
          <section>
            <article>
              <div>
                <div class="status-div"></div>
                <span>Lorem Ipsumssssssssssssssss</span>
              </div>
              <ul>
                <li>Drinks</li>
                <li>Drinks</li>
                <li>Drinks</li>
              </ul>
            </article>
            <div class="botoes">
              <button class="dislike"></button>
              <button class="like"></button>
            </div>
          </section>
        </li>
        <li>
          <img src="./../debug-images/temp-4.png" />
          <section>
            <article>
              <div>
                <div class="status-div"></div>
                <span>Lorem Ipsumssssssssssssssss</span>
              </div>
              <ul>
                <li>Drinks</li>
                <li>Drinks</li>
                <li>Drinks</li>
              </ul>
            </article>
            <div class="botoes">
              <button class="dislike"></button>
              <button class="like"></button>
            </div>
          </section>
        </li>
        <li>
          <img src="./../debug-images/temp-4.png" />
          <section>
            <article>
              <div>
                <div class="status-div"></div>
                <span>Lorem Ipsumssssssssssssssss</span>
              </div>
              <ul>
                <li>Drinks</li>
                <li>Drinks</li>
                <li>Drinks</li>
              </ul>
            </article>
            <div class="botoes">
              <button class="dislike"></button>
              <button class="like"></button>
            </div>
          </section>
        </li>
        <li>
          <img src="./../debug-images/temp-4.png" />
          <section>
            <article>
              <div>
                <div class="status-div"></div>
                <span>Lorem Ipsumssssssssssssssss</span>
              </div>
              <ul>
                <li>Drinks</li>
                <li>Drinks</li>
                <li>Drinks</li>
              </ul>
            </article>
            <div class="botoes">
              <button class="dislike"></button>
              <button class="like"></button>
            </div>
          </section>
        </li>
        <li>
          <img src="./../debug-images/temp-4.png" />
          <section>
            <article>
              <div>
                <div class="status-div"></div>
                <span>Lorem Ipsumssssssssssssssss</span>
              </div>
              <ul>
                <li>Drinks</li>
                <li>Drinks</li>
                <li>Drinks</li>
              </ul>
            </article>
            <div class="botoes">
              <button class="dislike"></button>
              <button class="like"></button>
            </div>
          </section>
        </li>
        <li>
          <img src="./../debug-images/temp-4.png" />
          <section>
            <article>
              <div>
                <div class="status-div"></div>
                <span>Lorem Ipsumssssssssssssssss</span>
              </div>
              <ul>
                <li>Drinks</li>
                <li>Drinks</li>
                <li>Drinks</li>
              </ul>
            </article>
            <div class="botoes">
              <button class="dislike"></button>
              <button class="like"></button>
            </div>
          </section>
        </li>
        <li>
          <img src="./../debug-images/temp-4.png" />
          <section>
            <article>
              <div>
                <div class="status-div"></div>
                <span>Lorem Ipsumssssssssssssssss</span>
              </div>
              <ul>
                <li>Drinks</li>
                <li>Drinks</li>
                <li>Drinks</li>
              </ul>
            </article>
            <div class="botoes">
              <button class="dislike"></button>
              <button class="like"></button>
            </div>
          </section>
        </li>
        <li>
          <img src="./../debug-images/temp-4.png" />
          <section>
            <article>
              <div>
                <div class="status-div"></div>
                <span>Lorem Ipsumssssssssssssssss</span>
              </div>
              <ul>
                <li>Drinks</li>
                <li>Drinks</li>
                <li>Drinks</li>
              </ul>
            </article>
            <div class="botoes">
              <button class="dislike"></button>
              <button class="like"></button>
            </div>
          </section>
        </li>
        <li>
          <img src="./../debug-images/temp-4.png" />
          <section>
            <article>
              <div>
                <div class="status-div"></div>
                <span>Lorem Ipsum</span>
              </div>
              <ul>
                <li>Drinks</li>
                <li>Drinks</li>
                <li>Drinks</li>
              </ul>
            </article>
            <div class="botoes">
              <button class="dislike"></button>
              <button class="like"></button>
            </div>
          </section>
        </li>
        <li>
          <img src="./../debug-images/temp-4.png" />
          <section>
            <article>
              <div>
                <div class="status-div"></div>
                <span>Lorem Ipsum</span>
              </div>
              <ul>
                <li>Drinks</li>
                <li>Drinks</li>
                <li>Drinks</li>
              </ul>
            </article>
            <div class="botoes">
              <button class="dislike"></button>
              <button class="like"></button>
            </div>
          </section>
        </li>
        <li>
          <img src="./../debug-images/temp-4.png" />
          <section>
            <article>
              <div>
                <div class="status-div"></div>
                <span>Lorem Ipsum</span>
              </div>
              <ul>
                <li>Drinks</li>
                <li>Drinks</li>
                <li>Drinks</li>
              </ul>
            </article>
            <div class="botoes">
              <button class="dislike"></button>
              <button class="like"></button>
            </div>
          </section>
        </li>
        <li>
          <img src="./../debug-images/temp-4.png" />
          <section>
            <article>
              <div>
                <div class="status-div"></div>
                <span>Lorem Ipsum</span>
              </div>
              <ul>
                <li>Drinks</li>
                <li>Drinks</li>
                <li>Drinks</li>
              </ul>
            </article>
            <div class="botoes">
              <button class="dislike"></button>
              <button class="like"></button>
            </div>
          </section>
        </li>
        <li>
          <img src="./../debug-images/temp-4.png" />
          <section>
            <article>
              <div>
                <div class="status-div"></div>
                <span>Lorem Ipsum</span>
              </div>
              <ul>
                <li>Drinks</li>
                <li>Drinks</li>
                <li>Drinks</li>
              </ul>
            </article>
            <div class="botoes">
              <button class="dislike"></button>
              <button class="like"></button>
            </div>
          </section>
        </li>
      </ul>
    -->
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