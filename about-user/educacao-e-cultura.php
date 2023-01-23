<?php

require_once __DIR__ . "./../_app/models/profileModel.php";
require_once __DIR__ . "./../_app/boot/helpers.php";

// session_start();

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Complete o perfil &mid; Keyslov</title>
  <link rel="shortcut icon" href="./../images/favicon.svg" type="image/x-icon" />
  <link rel="stylesheet" href="./../style/css/style.css" />
  <link rel="stylesheet" href="./../style/css/style-responsivo.css" />
</head>

<body id="sobre-usuario">
  <div id="menu-esquerdo">
    <div id="div-left">
      <div id="user-information">
        <figure>

          <?php
          $photo = new profileModel();
          $profile = $photo->User('tb_photos', 'user', $_SESSION['username'], '=');
          ?>


          <div class="foto-de-perfil">
            <img src="./../_storage/images/<?= $profile['photo']; ?>" alt="Foto de perfil" id="img-perfil" />

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
            <a class="logout" href="./../index.php">
              <li>Sair</li>
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
          <h1 class="__title">Educação e Cultura</h1>
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
              <option value="Eritreia">Eritreia</option>
              <option value="Estoniano">Estoniano</option>
              <option value="Etíope">Etíope</option>
              <option value="Fijiano">Fijiano</option>
              <option value="Filipino">Filipino</option>
              <option value="Finlandês">Finlandês</option>
              <option value="Francês">Francês</option>
              <option value="Gabonês">Gabonês</option>
              <option value="Gambian">Gambiano</option>
              <option value="Georgian">Georgiano</option>
              <option value="Glemão">Alemão</option>
              <option value="Ganês">Ganês</option>
              <option value="Grego">Grego</option>
              <option value="Granadino">Granadino</option>
              <option value="Guatemalteco">Guatemalteco</option>
              <option value="Guinea-bissauan">Guiné-Bissau</option>
              <option value="Guineense">Guineense</option>
              <option value="Guianês">Guianês</option>
              <option value="Haitiano">Haitiano</option>
              <option value="Herzegovina">Herzegovina</option>
              <option value="Hondurenho">Hondurenho</option>
              <option value="Húngaro">Húngaro</option>
              <option value="Islandês">Islandês</option>
              <option value="Indiano">Indiano</option>
              <option value="Indonésio">Indonésio</option>
              <option value="Iraniano">Iraniano</option>
              <option value="Iraquiano">Iraquiano</option>
              <option value="Irlandês">Irlandês</option>
              <option value="Israeli">Israelense</option>
              <option value="Italiano">Italiano</option>
              <option value="Ivorian">Costa do Marfim</option>
              <option value="Jamaican">Jamaicano</option>
              <option value="Japonês">Japonês</option>
              <option value="Jordanian">Jordanian</option>
              <option value="Cazaquistão">Cazaquistão</option>
              <option value="Queniano">Queniano</option>
              <option value="Kittian and nevisian">Kittian e Nevisian</option>
              <option value="Kuwaiti">Kuwait</option>
              <option value="Quirguiz">Quirguistão</option>
              <option value="Laotian">Laosiano</option>
              <option value="Letão">Letão</option>
              <option value="Libanese">Libanês</option>
              <option value="Liberian">Liberiano</option>
              <option value="Líbia">Líbia</option>
              <option value="Liechtensteiner">Liechtensteiner</option>
              <option value="Lituano">lituano</option>
              <option value="Luxemburguês">Luxemburguês</option>
              <option value="Macedônio">Macedônio</option>
              <option value="Malgaxe">Malgaxe</option>
              <option value="Malawian">Malawian</option>
              <option value="Malaio">Malaio</option>
              <option value="Maldivas">Maldivas</option>
              <option value="Maliano">Maliano</option>
              <option value="Maltês">Maltês</option>
              <option value="Marshallese">Marshallese</option>
              <option value="Mauritano">Mauritano</option>
              <option value="Maurício">Maurício</option>
              <option value="Mexicano">Mexicano</option>
              <option value="Micronésio">Micronésio</option>
              <option value="Moldavo">moldavo</option>
              <option value="Monacan">Monacan</option>
              <option value="Mongol">Mongol</option>
              <option value="Marroquino">Marroquino</option>
              <option value="Mosotho">Mosotho</option>
              <option value="Motswana">Motswana</option>
              <option value="Moçambicano">Moçambicano</option>
              <option value="Namibiano">Namibiano</option>
              <option value="Nauruano">Nauruano</option>
              <option value="Nepalês">Nepalês</option>
              <option value="Novo zelandês">Neozelandês</option>
              <option value="Ni-vanuatu">Ni-Vanuatu</option>
              <option value="Nicaraguense">Nicaraguense</option>
              <option value="Nigerien">Nigerien</option>
              <option value="Norte-coreano">norte-coreano</option>
              <option value="Northern Irish">Northern Irish</option>
              <option value="Norueguês">Norueguês</option>
              <option value="Omani">Omani</option>
              <option value="Paquistanês">Paquistanês</option>
              <option value="Palauano">Palauano</option>
              <option value="Panamenho">Panamenho</option>
              <option value="Papua nova guiné">Papua Nova Guiné</option>
              <option value="Paraguayan">Paraguaio</option>
              <option value="Peruano">Peruano</option>
              <option value="Polaco">Polaco</option>
              <option value="Português">Português</option>
              <option value="Qatari">Catar</option>
              <option value="Romeno">Romeno</option>
              <option value="Russo">Russo</option>
              <option value="Ruandês">Ruandês</option>
              <option value="Saint lucian">Saint Lucian</option>
              <option value="Salvadoran">Salvadorenho</option>
              <option value="Samoan">Samoan</option>
              <option value="San Marinese">San Marinese</option>
              <option value="São tomeano">São-tomense</option>
              <option value="Saudita">Saudita</option>
              <option value="Escocês">Escocês</option>
              <option value="Senegalesa">Senegalesa</option>
              <option value="Sérvio">Sérvio</option>
              <option value="Seichelense">Seichelense</option>
              <option value="Serra leoa">Serra Leoa</option>
              <option value="Singapurense">Singapurense</option>
              <option value="Eslovaco">Eslovaco</option>
              <option value="Esloveno">Esloveno</option>
              <option value="Salomão Islander">Solomon Island</option>
              <option value="Somali">Somali</option>
              <option value="South African">Sul Africano</option>
              <option value="Sul-coreano">sul-coreano</option>
              <option value="Espanhol">Espanhol</option>
              <option value="Sri lankan">Sri Lanka</option>
              <option value="Sudanês">Sudanês</option>
              <option value="Surinamer">Suriname</option>
              <option value="Suazi">Suazi</option>
              <option value="Sueco">sueco</option>
              <option value="Swiss">Swiss</option>
              <option value="sírio">Sírio</option>
              <option value="Taiwanesa">Taiwanesa</option>
              <option value="Tajique">Tajique</option>
              <option value="Tanzaniano">Tanzaniano</option>
              <option value="Tailandês">Tailandês</option>
              <option value="Togolês">Togolês</option>
              <option value="Tonga">Tonga</option>
              <option value="Trinidad or tobagonian">
                Trinidad or Tobagonian
              </option>
              <option value="Tunisiano">Tunisiano</option>
              <option value="Turco">Turco</option>
              <option value="Tuvaluano">Tuvaluano</option>
              <option value="Ugandês">Uganda</option>
              <option value="Ucraniano">Ucraniano</option>
              <option value="Uruguaio">Uruguaio</option>
              <option value="Uzbequistão">Usbequistão</option>
              <option value="Venezuelana">Venezuelana</option>
              <option value="Vietnamita">Vietnamita</option>
              <option value="Welsh">Welsh</option>
              <option value="Iemenita">Iemenita</option>
              <option value="Zambian">Zambiano</option>
              <option value="Zimbabwean">Zimbábue</option>
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
</body>

</html>