<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bloqueados &mid; Keyslov</title>
    <link
      rel="shortcut icon"
      href="./../images/favicon.svg"
      type="image/x-icon"
    />
    <link rel="stylesheet" href="./../style/style.css" />
    <link rel="stylesheet" href="./../style/style-responsivo.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/autosize.js/4.0.2/autosize.min.js"></script>
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
              <a href="bloqueados.html" class="pessoas-bloqueadas"><li>Membros Bloqueados</li></a>
              <li>Lorem Ipsum Exemplo exemplo</li>
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
            <li><a href="./perfil.html">Perfil</a></li>
            <li><a href="chamada.html">Chamada de video</a></li>
            <li><a href="carroussel.html">Carroussel</a></li>
            <li><a href="curtidas.html">Curtidas</a></li>
            <li><a href="planos.html">Planos</a></li>
            <li><a href="favoritos.html">Favoritos</a></li>
            <li><a href="configuracoes.html">Configurações</a></li>
            <li>
              <a href="mensagens.html">Mensagens</a
              >
            </li>
            <li><a href="servicos.html">Serviços</a></li>
            <li><a href="online.html">Online agora</a>
            </li>
            <li><a href="teste-de-amor.html">Teste de amor</a></li>
          </ul>
        </nav>
        <a href="localizar-pessoas.html"
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
      <main id="bloqueados" class="padrao">
        
          <h2 class="title">Membros bloqueados</h2>
          <ul id="blacklist">
            <li class="person person-selected">
              <object data=""></object>
              <div class="dados">
                <span>Lorem Ipsum Exemplo</span>
              </div>
              <button class="simple-btn">Desbloquear</button>
            </li>
            <li class="person">
              <object data=""></object>
              <div class="dados">
                <span>Lorem Ipsum Exemplo</span>
              </div>
              <button class="simple-btn">Desbloquear</button>
            </li>
            <li class="person">
              <object data=""></object>
              <div class="dados">
                <span>Lorem Ipsum Exemplo</span>
                
              </div>
            </li>
            <li class="person">
              <object data=""></object>
              <div class="dados">
                <span>Lorem Ipsum Exemplo</span>
                
              </div>
            </li>
            <li class="person">
              <object data=""></object>
              <div class="dados">
                <span>Lorem Ipsum Exemplo</span>
                
              </div>
            </li>
            <li class="person">
              <object data=""></object>
              <div class="dados">
                <span>Lorem Ipsum Exemplo</span>
                
              </div>
            </li>
            <li class="person">
              <object data=""></object>
              <div class="dados">
                <span>Lorem Ipsum Exemplo</span>
                
              </div>
            </li>
            <li class="person">
              <object data=""></object>
              <div class="dados">
                <span>Lorem Ipsum Exemplo</span>
                
              </div>
            </li>
            <li class="person">
              <object data=""></object>
              <div class="dados">
                <span>Lorem Ipsum Exemplo</span>
                
              </div>
            </li>
            <li class="person">
              <object data=""></object>
              <div class="dados">
                <span>Lorem Ipsum Exemplo</span>
                
              </div>
            </li>
            <li class="person">
              <object data=""></object>
              <div class="dados">
                <span>Lorem Ipsum Exemplo</span>
                
              </div>
            </li>
            <li class="person">
              <object data=""></object>
              <div class="dados">
                <span>Lorem Ipsum Exemplo</span>
                
              </div>
            </li>
            <div class="gradient"></div>
          </ul>
        
      </main>
    </div>

    <script src="./../script/script.js"></script>
  </body>
</html>
