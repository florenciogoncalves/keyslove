<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Carroussel &mid; Keyslov</title>
    <link
      rel="shortcut icon"
      href="./../images/favicon.svg"
      type="image/x-icon"
    />
    <link rel="stylesheet" href="./../style/style.css" />
    <link rel="stylesheet" href="./../style/style-responsivo.css" />
  </head>
  <body>
    <div id="menu-esquerdo">
      <div id="div-left">
        <div id="user-information">
          <figure>
            <div class="foto-de-perfil">
              <img
                src="./../debug-images/temp.png"
                alt="Foto de perfil"
                id="img-perfil"
              />
              <div class="status"></div>
            </div>
            <figcaption>
              <h2>Lorem Ipsun Silva</h2>
              <span id="show-status-window">Escolher status</span>
            </figcaption>
          </figure>

          <img  class="vizualizar-menu" src="./../images/option.svg" />
          <div class="hidden-list">
            <ul>
              <a href="bloqueados.php" class="pessoas-bloqueadas"><li>Membros Bloqueados</li></a>
              <a class="logout" href="./../index.php"><li>Sair</li></a>
            </ul>
          </div><div id="online-now">

            <div class="changing-status">
              <div class="this-status">
                <input
                  type="radio"
                  name="online-agora"
                  value="online"
                  id="online"
                />
                <label for="online">Online</label>
              </div>

              <div class="this-status">
                <input
                  type="radio"
                  name="online-agora"
                  id="ocupado"
                  value="ocupado"
                />
                <label for="ocupado">Ocupado</label>
              </div>

              <div class="this-status">
                <input
                  type="radio"
                  name="online-agora"
                  id="invisivel"
                  value="invisivel"
                />
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
        <a href="localizar-pessoas.php"
          ><div id="peoples-left">
            <h4>Pessoas pela região</h4>

            <div class="people-organizer">
              <img src="./../debug-images/temp-2.svg" />
              <img src="./../debug-images/temp-2.svg" />
              <img src="./../debug-images/temp-2.svg" />
            </div></div
        ></a>
      </div>
    </div>

    <div id="main-container">
     
      <main id="carroussel">
        <h1 class="title">Carroussel</h1>

        <figure id="informacoes-perfil">
          <img src="./../debug-images/temp-4.png" alt="Foto de perfil" />
          <figcaption id="descricao-perfil">
            <h2>Lorem Ipsum</h2>
            <p>
              Lorem ipsum <span>&middot;</span>
              <span class="idade">100</span>&nbsp;anos
            </p>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam
              non fringilla lacus. Aliquam eget accumsan turpis<br />
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam
              non fringilla lacus. Aliquam eget accumsan turpis<br />
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam
              non fringilla lacus. Aliquam eget accumsan turpis<br />
            </p>
            <div class="botoes">
              <button class="dislike"></button>
              <button class="like"></button>
            </div>
          </figcaption>
        </figure>

        <section class="outras-pessoas">

          <div class="outro-perfil">
            <img src="./../debug-images/temp-4.png" alt="Foto perfil" />
            <div class="textual">
              <h2>Lorem Ipsum</h2>
              <p>
                Lorem ipsum<span>&middot;</span>
                <span class="idade">100</span>&nbsp;anos
              </p>
            </div>
            <a href="mensagens.php">
              <button class="conversar"></button>
            </a>
          </div>

          <div class="outro-perfil">
            <img src="./../debug-images/temp-4.png" alt="Foto perfil" />
            <div class="textual">
              <h2>Lorem Ipsum</h2>
              <p>
                Lorem ipsum<span>&middot;</span>
                <span class="idade">100</span>&nbsp;anos
              </p>
            </div>
            <a href="mensagens.php">
              <button class="conversar"></button>
            </a>
          </div>

          <div class="outro-perfil">
            <img src="./../debug-images/temp-4.png" alt="Foto perfil" />
            <div class="textual">
              <h2>Lorem Ipsum</h2>
              <p>
                Lorem ipsum<span>&middot;</span>
                <span class="idade">100</span>&nbsp;anos
              </p>
            </div>
            <a href="mensagens.php">
              <button class="conversar"></button>
            </a>
          </div>

          <div class="outro-perfil">
            <img src="./../debug-images/temp-4.png" alt="Foto perfil" />
            <div class="textual">
              <h2>Lorem Ipsum</h2>
              <p>
                Lorem ipsum<span>&middot;</span>
                <span class="idade">100</span>&nbsp;anos
              </p>
            </div>
            <a href="mensagens.php">
              <button class="conversar"></button>
            </a>
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
