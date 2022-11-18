/*Navegar entre imagens*/
function navImages(arrayNavegado, ondeMostrar) {
  actual = 0;
  const proxima = pegar("#next-carroussel");
  const anterior = pegar("#preview-carroussel");

  proxima.addEventListener("click", () => {
    if (actual >= arrayNavegado.length - 1) actual = 0;
    else actual++;

    while (arrayNavegado[actual] == "") {
      proxima.click();
    }

    ondeMostrar.src = arrayNavegado[actual];
  });

  anterior.addEventListener("click", () => {
    if (actual <= 0) actual = arrayNavegado.length - 1;
    else actual--;

    while (arrayNavegado[actual] == "") {
      anterior.click();
    }

    ondeMostrar.src = arrayNavegado[actual];
  });
}
