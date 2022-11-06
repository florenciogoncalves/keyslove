<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cadastro &mid; Keyslov</title>
    <link
      rel="shortcut icon"
      href="./../images/favicon.svg"
      type="image/x-icon"
    />
    <link rel="stylesheet" href="./../style/cadastro.css" />
    <link rel="stylesheet" href="./../style/responsive-login.css" />
  </head>
  <body>
    <header class="header-content">
      <img src="./../images/Keyslov.svg" class="header-logo" />
      <nav class="nav-btn">
        <a href="../login.html"><button class="white-btn">Entrar</button></a>
      </nav>
    </header>

    <div class="form-cadastro-container">
      <div class="cadastro-layout">
        <form
          action="./../about-user/trabalho-e-profissao.html"
          method="get"
          id="form-cadastro6"
        >
          <h1 id="h1">Código de confirmação</h1>
          <p class="p6">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam non
            fringilla lacus. Aliquam eget accumsan turpis
          </p>

          <section id="password-section">
            <div id="insert-password">
              <!-- Este input recebe o valor completo da password-otp que é inserida por fatias -->
              <input type="password" id="otp-pass" name="otp-pass" style="display: none">

              <input type="password" class="pass-camp" maxlength="1" required/>
              <input type="password" class="pass-camp" maxlength="1" required/>
              <input type="password" class="pass-camp" maxlength="1" required/>
              <input type="password" class="pass-camp" maxlength="1" required/>
            </div>
          </section>
          
          <div>
            <button id="requisicao-otp" class="continue btn-register">Enviar</button>
            <button class="continue btn-register" type="button">
              Reenviar
            </button>
          </div>
        </form>
      </div>
    </div>
    <script src="./../script/cadastro.js"></script>
    <script src="./../script/resize-windown.js"></script>
  </body>
</html>
