<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Complete o perfil &mid; Keyslov</title>
    <link
      rel="shortcut icon"
      href="./../images/favicon.svg"
      type="image/x-icon"
    />
    <link rel="stylesheet" href="./../style/style.css" />
    <link rel="stylesheet" href="./../style/style-responsivo.css" />
  </head>
  <body id="sobre-usuario">
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
            </div>

            <figcaption>
              <div class="status"></div>
              <h2>Lorem Ipsun Silva</h2>
              <span id="show-status-window">Escolher status</span>
            </figcaption>
          </figure>

          <img class="vizualizar-menu" src="./../images/option.svg" />
          <div class="hidden-list">
            <ul>
              <a href="bloqueados.html" class="pessoas-bloqueadas"
                ><li>Membros Bloqueados</li></a
              >
              <li>Lorem Ipsum exemplo</li>
            </ul>
          </div>
          <div id="online-now">
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
            <li><a href="./../home/perfil.html">Perfil</a></li>
            <li><a href="./../home/chamada.html">Chamada de video</a></li>
            <li><a href="./../home/carroussel.html">Carroussel</a></li>
            <li><a href="./../home/curtidas.html">Curtidas</a></li>
            <li><a href="./../home/planos.html">Planos</a></li>
            <li><a href="./../home/favoritos.html">Favoritos</a></li>
            <li><a href="./../home/configuracoes.html">Configurações</a></li>
            <li><a href="./../home/mensagens.html">Mensagens</a></li>
            <li><a href="./../home/servicos.html">Serviços</a></li>
            <li><a href="./../home/online.html">Online agora</a></li>
            <li><a href="teste-de-amor.html">Teste de amor</a></li>
          </ul>
        </nav>

        <a href="./../home/localizar-pessoas.html">
          <div id="peoples-left">
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
      <header id="mobile-header">
        <img src="./../images/Keyslov.svg" alt="Keyslov - logo" />
      </header>
      <div id="content-right">
        <form action="../home/index.php" method="get" class="principal-content">
          <header class="content-header">
            <img src="./../images/Book_check_fill.svg" />
            <h1>Estilo de vida</h1>
          </header>

          <div id="container-elements" style="justify-content: flex-start">
            <div class="part-1">
              <div class="iten">
                <label for="beber">Você bebe?</label>
                <select id="beber" name="beber">
                  <option selected hidden disabled>Selecionar...</option>
                  <option value="Sim">Sim</option>
                  <option value="Não">Não</option>
                  <option value="Por vezes">Por vezes</option>
                </select>
              </div>
              <div class="iten">
                <label for="fumar">Você fuma?</label>
                <select id="fumar" name="fumar">
                  <option selected hidden disabled>Selecionar...</option>
                  <option value="Sim">Sim</option>
                  <option value="Não">Não</option>
                  <option value="Por vezes">Por vezes</option>
                </select>
              </div>
              <div class="iten">
                <label for="ocupacao">Ocupação</label>
                <select id="ocupacao" name="ocupacao">
                  <option selected hidden disabled>Selecionar...</option>
                </select>
              </div>
              <div class="iten">
                <label for="filhos">Possui filhos?</label>
                <select id="filhos" name="filhos">
                  <option selected hidden disabled>Selecionar...</option>
                  <option value="Sim">Sim</option>
                  <option value="Não">Não</option>
                </select>
              </div>
              <div class="iten">
                <label for="quantidade-filhos">Quantidade de filhos</label>
                <select
                  id="quantidade-filhos"
                  name="quantidade-filhos"
                  disabled
                >
                  <option selected hidden disabled>00</option>
                  <option value="0">00</option>
                  <option value="1">01</option>
                  <option value="2">02</option>
                  <option value="3">03</option>
                  <option value="4">04</option>
                  <option value="5">05</option>
                  <option value="6">06</option>
                  <option value="7">07</option>
                  <option value="+7">+7</option>
                </select>
              </div>
            </div>

            <div class="part-2" style="display: none">
              <div class="iten">
                <label for="pets">Possui animais de estimação?</label>
                <select id="pets" name="pets">
                  <option selected hidden disabled>Selecionar...</option>
                  <option value="Sim">Sim</option>
                  <option value="Não">Não</option>
                </select>
              </div>

              <div class="iten">
                <label for="quantidade-pets">Quantidade</label>
                <select id="quantidade-pets" disabled name="quantidade-pets">
                  <option selected hidden disabled>Selecionar...</option>
                  <option value="0">00</option>
                  <option value="1">01</option>
                  <option value="2">02</option>
                  <option value="3">03</option>
                  <option value="4">04</option>
                  <option value="5">05</option>
                  <option value="6">06</option>
                  <option value="7">07</option>
                  <option value="+7">+7</option>
                </select>
              </div>

              <div class="iten">
                <label for="moradia">Situação de moradia</label>
                <select id="moradia" name="moradia">
                  <option selected hidden disabled>Selecionar...</option>
                </select>
              </div>

              <div class="iten">
                <label for="disposi-mudar-pais"
                  >Disposição para mudar de país</label
                >
                <select id="disposi-mudar-pais" name="disposi-mudar-pais">
                  <option selected hidden disabled>Selecionar...</option>
                </select>
              </div>

              <div class="iten">
                <label for="religiao">Religião</label>
                <select id="religia" name="religia">
                  <option selected hidden disabled>Selecionar...</option>
                </select>
              </div>
            </div>
          </div>

          <div class="progress-next">
            <div class="progress-bar-content">
              <div class="progress-bar">
                <span class="progress-val"></span>
              </div>
            </div>

            <button
              class="next-page-about"
              type="button"
              onclick="proxJanela(document.querySelector('button.next-page-about'), 
          document.querySelector('.part-2'), document.querySelector('.part-1'))"
            >
              >
            </button>
          </div>
        </form>
      </div>
      <footer id="footer-mobile">
        <nav>
          <ul>
            <li  ><a href=""></a></li>
            <li><a href=""></a></li>
            <li><a href=""></a></li>
            <li><a href=""></a></li>
            <li><button id="mostra-menu-mobile"></button></li>
          </ul>
        </nav>
      </footer>
    </div>
    <script src="./../script/trabalho-profissao.js"></script>
    <script src="./../script/script.js"></script>
    <script src="./../script/resize-windown.js"></script>
  </body>
</html>
