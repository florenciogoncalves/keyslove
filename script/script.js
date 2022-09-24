//Para a barra de progresso para o carroussel da página home
function setProgressVal(val) {
  if (val <= 100) {
    const progressBar = document.querySelector("#home-progress-bar");
    const progressVal = document.querySelector("#home-progress-val");

    progressBar.setAttribute("style", "width: " + val + "%");
    progressVal.textContent = val + "%";
  }
}

//Esta chamada serve simplesmente para demonstração. Apagar de seguida
try {
  setProgressVal(34);
} catch (erro) {
  console.error(erro);
}

/*
 *Menu suspenso de 'online agora'
 */
const onlineAgora = document.querySelectorAll("[name = 'online-agora']");
onlineAgora.forEach((element) =>
  element.addEventListener("click", () => {
    var setado = document.querySelector("#user-information .status");
    if (element.value == "online") {
      setado.style.display = "block";
      setado.style.backgroundColor = "var(--status-on)";
    } else if (element.value == "ocupado") {
      setado.style.display = "block";
      setado.style.backgroundColor = "var(--status-off)";
    } else {
      setado.style.display = "none";
    }
  })
);

/*Para as caixas de confirmação flutuante*/
const closes = document.querySelectorAll(".dialog-container button");
closes.forEach((element) => {
  element.addEventListener("click", () => {
    if (element.value == "info-close") var i = 0;
    else var i = 1;
    document.querySelectorAll(".dialog-container")[i].style.display = "none";
  });
});

/*Chamar caixa de confirmação flutuante
 *Valores possíveis para windowName: ['information', 'question'],
 *Valores possíveis para displayName:['flex', 'none']*/
function callDialogWindow(windowName, displayName) {
  document.querySelector(
    ".dialog-container.dialog-" + windowName
  ).style.display = displayName;
  if (displayName != "none")
    document.querySelector("body").setAttribute("style", "overflow: hidden;");
  else document.querySelector("body").removeAttribute("style", "overflow");
}
try {
  callDialogWindow("information", "none");
  callDialogWindow("question", "none");
} catch (erro) {
  console.error(erro);
}
