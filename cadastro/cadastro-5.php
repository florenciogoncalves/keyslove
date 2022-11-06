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
      <div class="cadastro-layout" id="cadastro-5">
        <form action="cadastro-6.html" method="get" id="form-cadastro5">
          <h1>Adicione duas Fotos</h1>
          <p>Adicione suas fotos com o limite de 15 fotos por perfil</p>

          <div class="social-cad-imgs">
            <img src="./../images/facebook-social.svg" />
            <img src="./../images/instagram-social.svg" />
          </div>

          <section class="add-photos-cad">
            <label id="photo1" class="area-drop">
              <input
                type="file"
                name="img-2"
                id="photo1"
                accept="image/png, image/jpeg"
                required
              />
              <!-- <form action="/target" class="dropzone area-drop" id="get-photo"> -->
              <span>Arraste sua foto</span>
            </label>
            <label class="area-drop">
              <input
                type="file"
                name="img-2"
                id="photo2"
                accept="image/png, image/jpeg"
                required
              />
              <!-- <form action="/target" class="dropzone" id="get-photo"></form> -->
              <span>Arraste sua foto</span>
            </label>
          </section>
          <button class="continue btn-register" type="submit">
            Adicionar Fotos
          </button>
        </form>

        <!-- <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script> -->
        <script src="./../script/cadastro.js"></script>
        <script src="./../script/resize-windown.js"></script>
      </div>
    </div>
  </body>
</html>
