<?php

session_start();

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Complete o perfil &mid; Keyslov</title>
  <link rel="shortcut icon" href="./../images/favicon.svg" type="image/x-icon" />
  <link rel="stylesheet" href="./../style/style.css" />
  <link rel="stylesheet" href="./../style/style-responsivo.css" />
</head>

<body id="sobre-usuario">
  <div id="menu-esquerdo">
    <div id="div-left">
    <div id="user-information">
        <figure>
          <div class="foto-de-perfil">
            <img src="./../debug-images/temp.png" alt="Foto de perfil" id="img-perfil" />
            <div class="status"></div>
          </div>

          <?php
          if (isset($_SESSION['username'])) :
          ?>

            <figcaption>
              <h2><?= $_SESSION['username'];
                endif ?></h2>
              <span id="show-status-window">Escolher status</span>
            </figcaption>
        </figure>

        <img class="vizualizar-menu" src="./../images/option.svg" />
        <div class="hidden-list">
          <ul>
            <a href="bloqueados.php" class="pessoas-bloqueadas">
              <li>Membros Bloqueados</li>
            </a>
            <a href="./../index.php">
              <li class="logout">Sair</li>
            </a>
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
          <li><a href="./../home/perfil.php">Perfil</a></li>
          <li><a href="./../home/chamada.php">Chamada de video</a></li>
          <li><a href="./../home/carroussel.php">Carroussel</a></li>
          <li><a href="./../home/curtidas.php">Curtidas</a></li>
          <li><a href="./../home/planos.php">Planos</a></li>
          <li><a href="./../home/favoritos.php">Favoritos</a></li>
          <li><a href="./../home/configuracoes.php">Configurações</a></li>
          <li><a href="./../home/mensagens.php">Mensagens</a></li>
          <li><a href="./../home/servicos.php">Serviços</a></li>
          <li><a href="./../home/online.php">Online agora</a></li>
          <li><a href="teste-de-amor.php">Teste de amor</a></li>
        </ul>
      </nav>

      <a href="./../home/localizar-pessoas.php">
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
    <header id="mobile-header">
      <img src="./../images/Keyslov.svg" alt="Keyslov - logo" />
    </header>
    <div id="content-right">
      <form action="./../_app/controllers/educacaoController.php" method="POST" class="principal-content">
        <header class="content-header">
          <img src="./../images/Book_check_fill.svg" />
          <h1>Educação e Cultura</h1>
        </header>

        <div id="container-elements">
          <div class="iten">
            <label for="nacionalidade">Nacionalidade</label>

            <input type="text" list="nacionalidade-lista" id="nacionalidade" name="nacionalidade" oninput="this.value = this.value.charAt(0).toUpperCase() + this.value.slice(1);" placeholder="Selecionar..." required>
            <!-- <select id="nacionalidade">
                <option selected hidden disabled>Selecionar...</option>
              </select> -->
            <datalist id="nacionalidade-lista">
              <option value="afegão">Afegão</option>
              <option value="Albanês">Albanês</option>
              <option value="argelino">argelino</option>
              <option value="americano">americano</option>
              <option value="andorran">Andorra</option>
              <option value="angolano">Angolano</option>
              <option value="antiguans">Antiguans</option>
              <option value="argentino">Argentino</option>
              <option value="armênio">Armênio</option>
              <option value="australiano">Australiano</option>
              <option value="austríaco">Austríaco</option>
              <option value="azerbaijano">Azerbaijano</option>
              <option value="bahamense">bahamense</option>
              <option value="bahraini">Bahrein</option>
              <option value="bangladeshi">Bangladesh</option>
              <option value="barbadian">Barbadian</option>
              <option value="barbudanos">Barbudanos</option>
              <option value="batswana">Batswana</option>
              <option value="bielorrusso">Bielorrusso</option>
              <option value="belga">Belga</option>
              <option value="belizean">Belize</option>
              <option value="beninense">beninense</option>
              <option value="butanese">Butanese</option>
              <option value="boliviano">Boliviano</option>
              <option value="bósnio">Bósnio</option>
              <option value="brazilian">Brasileiro</option>
              <option value="britânico">Britânico</option>
              <option value="bruneian">Brunei</option>
              <option value="búlgaro">Búlgaro</option>
              <option value="burkinabe">Burkinabe</option>
              <option value="birmanês">Birmanês</option>
              <option value="burundiano">Burundi</option>
              <option value="cambojano">Cambojano</option>
              <option value="camaronês">camaronês</option>
              <option value="canadense">canadense</option>
              <option value="cabo-verdiano">Cabo-verdiano</option>
              <option value="centro africano">Centro africano</option>
              <option value="chadian">Chadian</option>
              <option value="chileno">Chileno</option>
              <option value="chinês">Chinês</option>
              <option value="colombiano">Colombiano</option>
              <option value="comoran">Comoran</option>
              <option value="congolês">Congolês</option>
              <option value="costa-riquenho">Costa-riquenho</option>
              <option value="croata">Croata</option>
              <option value="cubano">Cubano</option>
              <option value="cipriota">Cipriota</option>
              <option value="tcheco">Checo</option>
              <option value="dinamarquês">Dinamarquês</option>
              <option value="djibuti">Djibuti</option>
              <option value="dominicano">Dominicana</option>
              <option value="holandês">Holandês</option>
              <option value="timorense">Timorense</option>
              <option value="ecuadorean">Equatoriano</option>
              <option value="egípcio">Egípcio</option>
              <option value="emirian">Emirian</option>
              <option value="guineense equatorial">
                Guineense equatorial
              </option>
              <option value="eritreia">Eritreia</option>
              <option value="estoniano">Estoniano</option>
              <option value="etíope">Etíope</option>
              <option value="fijiano">Fijiano</option>
              <option value="filipino">Filipino</option>
              <option value="finlandês">Finlandês</option>
              <option value="francês">Francês</option>
              <option value="gabonês">Gabonês</option>
              <option value="gambian">Gambiano</option>
              <option value="georgian">Georgiano</option>
              <option value="alemão">Alemão</option>
              <option value="ganês">Ganês</option>
              <option value="grego">Grego</option>
              <option value="granadino">Granadino</option>
              <option value="guatemalteco">Guatemalteco</option>
              <option value="guinea-bissauan">Guiné-Bissau</option>
              <option value="guineense">Guineense</option>
              <option value="guianês">Guianês</option>
              <option value="haitiano">Haitiano</option>
              <option value="herzegovina">Herzegovina</option>
              <option value="hondurenho">Hondurenho</option>
              <option value="húngaro">Húngaro</option>
              <option value="islandês">Islandês</option>
              <option value="indiano">Indiano</option>
              <option value="indonésio">Indonésio</option>
              <option value="iraniano">Iraniano</option>
              <option value="iraquiano">Iraquiano</option>
              <option value="irlandês">Irlandês</option>
              <option value="israeli">Israelense</option>
              <option value="italiano">Italiano</option>
              <option value="ivorian">Costa do Marfim</option>
              <option value="jamaican">Jamaicano</option>
              <option value="japonês">Japonês</option>
              <option value="jordanian">Jordanian</option>
              <option value="cazaquistão">Cazaquistão</option>
              <option value="queniano">Queniano</option>
              <option value="kittian and nevisian">Kittian e Nevisian</option>
              <option value="kuwaiti">Kuwait</option>
              <option value="quirguiz">Quirguistão</option>
              <option value="laotian">Laosiano</option>
              <option value="letão">Letão</option>
              <option value="libanese">Libanês</option>
              <option value="liberian">Liberiano</option>
              <option value="líbia">Líbia</option>
              <option value="liechtensteiner">Liechtensteiner</option>
              <option value="lituano">lituano</option>
              <option value="luxemburguês">Luxemburguês</option>
              <option value="macedônio">Macedônio</option>
              <option value="malgaxe">Malgaxe</option>
              <option value="malawian">Malawian</option>
              <option value="malaio">Malaio</option>
              <option value="maldivas">Maldivas</option>
              <option value="maliano">Maliano</option>
              <option value="maltês">Maltês</option>
              <option value="marshallese">Marshallese</option>
              <option value="mauritano">Mauritano</option>
              <option value="maurício">Maurício</option>
              <option value="mexicano">Mexicano</option>
              <option value="micronésio">Micronésio</option>
              <option value="moldavo">moldavo</option>
              <option value="monacan">Monacan</option>
              <option value="mongol">Mongol</option>
              <option value="marroquino">Marroquino</option>
              <option value="mosotho">Mosotho</option>
              <option value="motswana">Motswana</option>
              <option value="moçambicano">Moçambicano</option>
              <option value="namibiano">Namibiano</option>
              <option value="nauruano">Nauruano</option>
              <option value="nepalês">Nepalês</option>
              <option value="novo zelandês">Neozelandês</option>
              <option value="ni-vanuatu">Ni-Vanuatu</option>
              <option value="nicaraguense">Nicaraguense</option>
              <option value="nigerien">Nigerien</option>
              <option value="norte-coreano">norte-coreano</option>
              <option value="Northern Irish">Northern Irish</option>
              <option value="norueguês">Norueguês</option>
              <option value="omani">Omani</option>
              <option value="paquistanês">Paquistanês</option>
              <option value="palauano">Palauano</option>
              <option value="panamenho">Panamenho</option>
              <option value="papua nova guiné">Papua Nova Guiné</option>
              <option value="paraguayan">Paraguaio</option>
              <option value="peruano">Peruano</option>
              <option value="polaco">Polaco</option>
              <option value="português">Português</option>
              <option value="qatari">Catar</option>
              <option value="romeno">Romeno</option>
              <option value="russo">Russo</option>
              <option value="ruandês">Ruandês</option>
              <option value="saint lucian">Saint Lucian</option>
              <option value="salvadoran">Salvadorenho</option>
              <option value="samoan">Samoan</option>
              <option value="san Marinese">San Marinese</option>
              <option value="são tomeano">São-tomense</option>
              <option value="saudita">Saudita</option>
              <option value="escocês">Escocês</option>
              <option value="senegalesa">Senegalesa</option>
              <option value="sérvio">Sérvio</option>
              <option value="seichelense">Seichelense</option>
              <option value="serra leoa">Serra Leoa</option>
              <option value="singapurense">Singapurense</option>
              <option value="eslovaco">Eslovaco</option>
              <option value="esloveno">Esloveno</option>
              <option value="Salomão Islander">Solomon Island</option>
              <option value="somali">Somali</option>
              <option value="South African">Sul Africano</option>
              <option value="sul-coreano">sul-coreano</option>
              <option value="espanhol">Espanhol</option>
              <option value="sri lankan">Sri Lanka</option>
              <option value="sudanês">Sudanês</option>
              <option value="surinamer">Suriname</option>
              <option value="suazi">Suazi</option>
              <option value="sueco">sueco</option>
              <option value="swiss">Swiss</option>
              <option value="sírio">Sírio</option>
              <option value="taiwanesa">Taiwanesa</option>
              <option value="tajique">Tajique</option>
              <option value="tanzaniano">Tanzaniano</option>
              <option value="tailandês">Tailandês</option>
              <option value="togolês">Togolês</option>
              <option value="tonga">Tonga</option>
              <option value="trinidad or tobagonian">
                Trinidad or Tobagonian
              </option>
              <option value="tunisiano">Tunisiano</option>
              <option value="turco">Turco</option>
              <option value="tuvaluano">Tuvaluano</option>
              <option value="ugandês">Uganda</option>
              <option value="ucraniano">Ucraniano</option>
              <option value="uruguaio">Uruguaio</option>
              <option value="uzbequistão">Usbequistão</option>
              <option value="venezuelana">Venezuelana</option>
              <option value="vietnamita">Vietnamita</option>
              <option value="welsh">Welsh</option>
              <option value="iemenita">Iemenita</option>
              <option value="zambian">Zambiano</option>
              <option value="zimbabwean">Zimbábue</option>
            </datalist>
          </div>

          <div class="iten">
            <label for="educacao">Educação</label>

            <select id="educacao" name="educacao" required>
              <option selected hidden disabled value="">Selecionar...</option>
              <option value="Educação Básica">Educação básica</option>
              <option value="Educação superior">Educação superior</option>
              <option value="Mestrado">Mestrado</option>
              <option value="Doutorado">Doutorado</option>
            </select>
          </div>

          <div class="iten">
            <label for="idiomas">Idiomas</label>
            <select id="idiomas" name="idiomas" required>
              <option selected hidden disabled value="">Selecionar...</option>
              <option value="Inglês">Inglês</option>
              <option value="Mandarim">Mandarim</option>
              <option value="Hindi">Hindi</option>
              <option value="Espanhol">Espanhol</option>
              <option value="Francês">Francês</option>
              <option value="Árabe">Árabe</option>
              <option value="Bengali">Bengali</option>
              <option value="Russo">Russo</option>
              <option value="Português">Português</option>
              <option value="Indonésio">Indonésio</option>
              <option value="Urdu">Urdu</option>
              <option value="Alemão">Alemão</option>
              <option value="Japonês">Japonês</option>
              <option value="Suaíli">Suaíli</option>
              <option value="Marati">Marati</option>
              <option value="Telugo">Telugo</option>
              <option value="Punjabi">Punjabi</option>
              <option value="Chinês Wu">Chinês Wu</option>
              <option value="Tâmil">Tâmil</option>
              <option value="Turco">Turco</option>
            </select>
          </div>

          <div class="iten">
            <label for="nivel-ingles">Seu nível de inglês</label>
            <select id="nivel-ingles" name="nivel-ingles" required>
              <option selected disabled hidden value="">Selecionar...</option>
              <option value="A1">A1</option>
              <option value="A2">A2</option>
              <option value="B1">B1</option>
              <option value="B2">B2</option>
              <option value="C1">C1</option>
              <option value="C2">C2</option>
            </select>
          </div>

          <div class="iten">
            <label for="religiao">Religião</label>
            <select id="religiao" name="religiao" required>
              <option selected disabled hidden value="">Selecionar...</option>
              <option value="Cristianismo">Cristianismo</option>
              <option value="Umnanda">Umbanda</option>
              <option value="Candomblé">Candomblé</option>
              <option value="Espiritismo">Espiritismo</option>
              <option value="Judaísmo">Judaísmo</option>
              <option value="Islamismo">Islamismo</option>
              <option value="Hinduísmo">Hinduísmo</option>
              <option value="Budismo">Budismo</option>
            </select>
          </div>

          <div class="iten">
            <label for="signo">Signo</label>
            <select id="signo" name="signo" required>
              <option selected disabled hidden value="">Selecionar...</option>
              <option value="Áries">Áries</option>
              <option value="Touro">Touro</option>
              <option value="Gêmeos">Gêmeos</option>
              <option value="Câncer">Câncer</option>
              <option value="Leão">Leão</option>
              <option value="Virgem">Virgem</option>
              <option value="Libra">Libra</option>
              <option value="Escorpião">Escorpião</option>
              <option value="Sagitário">Sagitário</option>
              <option value="Capricórnio">Capricórnio</option>
              <option value="Aquário">Áquario</option>
              <option value="Peixes">Peixe</option>
            </select>
          </div>

        </div>

        <div class="progress-next">
          <div class="progress-bar-content">
            <div class="progress-bar">
              <span class="progress-val"></span>
            </div>
          </div>

          <button class="next-page-about">></button>
        </div>
      </form>
    </div>
    <footer id="footer-mobile">
        <nav>
          <ul>
            <li><a href="./../home/index.php"></a></li>
            <li><a href="./../home/localizar-pessoas.php"></a></li>
            <li><a href="./../home/favoritos.php"></a></li>
            <li><a href="./../home/mensagens.php"></a></li>
            <li><button id="mostra-menu-mobile"></button></li>
          </ul>
        </nav>
      </footer>
  </div>

  <script src="./../script/about-user.js"></script>
  <script src="./../script/script.js"></script>
  <script src="./../script/resize-windown.js"></script>
</body>

</html>