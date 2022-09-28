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
 *Menu suspenso de 'changing-status'
 */
const onlineAgora = document.querySelectorAll("[name = 'online-agora']");
const changingStatus = document.querySelector(".changing-status");
changingStatus.style.display = "none";
document.querySelector("#online-now").addEventListener("click", () => {
  if (changingStatus.style.display != "none")
    changingStatus.style.display = "none";
  else changingStatus.style.display = "block";
});

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

/*Documento mensagens.html
 *Mostrar janela de tradução*/
const translatorWindow = document.querySelector(".options-container");

try {
  translatorWindow.setAttribute("style", "display: none;");
  document
    .querySelector(".botoes-top .options")
    .addEventListener("click", () => {
      translatorWindow.style.display = "block";
    });
} catch (e) {
  console.error(e);
}

/*Para ocultar qualquer janela que por predefinição é oculta*/
document.addEventListener("mousedown", (e) => {
  try{if (translatorWindow.contains(e.target)) {
    translatorWindow.style.display = "block";
  } else {
    translatorWindow.style.display = "none";
  }}catch(erro){
    console.log(erro)
  }
  if (changingStatus.contains(e.target)) {
    changingStatus.style.display = "block";
  } else {
    changingStatus.style.display = "none";
  }
});
