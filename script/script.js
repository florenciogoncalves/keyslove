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
  console.error("Demonstrando barra de progresso" + erro);
}

/*
 *Menu suspenso de 'changing-status'
 */
const onlineAgora = document.querySelectorAll("[name = 'online-agora']");
const changingStatus = document.querySelector(".changing-status");
changingStatus.style.display = "none";
document.querySelector("#show-status-window").addEventListener("click", () => {
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
const menuOculto = document.querySelector(".hidden-list");
menuOculto.setAttribute("style", "display: none;");

document
  .querySelector("#user-information>img")
  .addEventListener("click", (e) => {
    if (menuOculto.style.display == "none") {
      menuOculto.style.display = "flex";
      var temp = true;
      document.removeEventListener("click", () => {});
    } else {
      menuOculto.style.display = "none";
      var temp = false;
    }
    if (temp)
      document.addEventListener("click", (e) => {
        if (document.querySelector("#user-information>img").contains(e.target))
          menuOculto.style.display = "flex";
        else if (!menuOculto.contains(e.target))
          menuOculto.style.display = "none";
      });
  });

try {
  translatorWindow.setAttribute("style", "display: none;");
  document
    .querySelector(".botoes-top .options")
    .addEventListener("click", () => {
      translatorWindow.style.display = "block";
    });
} catch (e) {
  console.error("Disponível só na área de mensagens >" + e);
}

/*Para ocultar qualquer janela por click*/
document.addEventListener("mousedown", (e) => {
  try {
    if (translatorWindow.contains(e.target)) {
      translatorWindow.style.display = "block";
    } else {
      translatorWindow.style.display = "none";
    }
  } catch (erro) {
    console.log("Sem janela para ocultar" + erro);
  }
  if (changingStatus.contains(e.target)) {
    changingStatus.style.display = "block";
  } else {
    changingStatus.style.display = "none";
  }
});

//Redimensionando automaticamente a textarea da mensagem com uma biblioteca externa
document.addEventListener(
  "DOMContentLoaded",
  function () {
    try {
      autosize(document.querySelectorAll("#message-text"));
    } catch (erro) {
      console.error("Disponível em mensagens " + erro);
    }
  },
  true
);

try {
  document
    .querySelector("#goto-metodo-pagamento")
    .addEventListener("click", () => {
      document.querySelector("#pacotes-pagamento").style.display = "none";
      document.querySelector("#metodo-pagamento").style.display = "flex";
    });
} catch (erro) {
  console.error("Sem janela de planos" + erro);
}

/*Gambiarra para placeholder cinza para preto de selects*/
try {
  document.querySelectorAll(".select-placeholder").forEach((element, index) => {
    if (index == 0) {
      for (let c = 1; c <= 12; c++) {
        var addOption = document.createElement("option");
        addOption.value = c;
        addOption.textContent = "0" + c;
        if (c >= 10) addOption.textContent = c;
        element.appendChild(addOption);
      }
    }
    if (index == 1) {
      for (
        let c = new Date().getFullYear();
        c <= new Date().getFullYear() + 10;
        c++
      ) {
        var addOption = document.createElement("option");
        addOption.value = c;
        addOption.textContent = "0" + c;
        if (c >= 10) addOption.textContent = c;
        element.appendChild(addOption);
      }
    }
    element.style.color = "#999";
    document
      .querySelectorAll(".select-placeholder option")
      .forEach((current) => (current.style.color = "#000"));
    element.addEventListener("change", () => (element.style.color = "#000"));
  });
} catch (erro) {
  console.error("Gambiarra placeholder" + erro);
}

/* incrementando os meios de pagamento de forma dinâmica*/
try {
  const addFlag = document.querySelector("#planos #payment-method");
  const flags = [
    "Visa",
    "Mastercard",
    "AMEX",
    "PayPal",
    "GooglePay",
    "ApplePay",
    "Pix",
  ].forEach((element) => {
    let insert = document.createElement("input");
    insert.setAttribute("type", "radio");
    insert.setAttribute("value", element);
    insert.setAttribute("name", "card-flag");
    insert.style.backgroundImage =
      "url(./../images/payment-method/" + element + ".svg)";

    addFlag.appendChild(insert);
  });
} catch (notFound) {
  console.error("Meios de pagamento" + notFound);
}

try {
  const cardNumber = document.querySelector("#card-number");
  let newCardNum = "";
  cardNumber.textContent.split("").forEach((char, ind) => {
    newCardNum += char;
    if ((ind + 1) % 4 == 0) newCardNum += " ";
  });
  cardNumber.textContent = newCardNum;
} catch (erro) {
  console.error("Elemento não encontrado" + erro);
}
document.querySelectorAll("#favoritos nav label").forEach((element) => {
  element.addEventListener("click", () => {
    document
      .querySelectorAll("#favoritos nav label")
      .forEach(
        (current) =>
          (document.querySelector(
            "#sep-" + current.getAttribute("for")
          ).style.display = "none")
      );
    document.querySelector(
      "#sep-" + element.getAttribute("for")
    ).style.display = "block";
  });
});

/*Adicionando função editar*/
document.querySelectorAll("#conf-list span.edit").forEach((element, index) => {
  btnsEdit = document.querySelectorAll("#conf-list input");
  element.addEventListener("click", () => {
    btnsEdit[index].removeAttribute("disabled");
    btnsEdit[index].focus();
    /*Mostrar campo de password*/
    if (btnsEdit[index].getAttribute("type") == "password") {
      btnsEdit[index].setAttribute("type", "text");
    }
    if (
      btnsEdit[index].addEventListener("keyup", (e) => {
        if (e.key == "Enter") btnsEdit[index].setAttribute("disabled", true);
      })
    )
      alert();
    btnsEdit[index].addEventListener("focusout", () => {
      btnsEdit[index].setAttribute("disabled", true);
      /*Ocultar password*/
      if (index == 3) {
        btnsEdit[index].setAttribute("type", "password");
      }
    });

    /*As requisições vão aqui*/
  });
});

/*Para .exit de configurações
 *Constantes das telas*/
const defConf = document.querySelector("#conf-select");
const confAccount = document.querySelector("#conf-account");

/*Para a lista de opções em configurações*/
try {
  document
    .querySelectorAll("#configuracoes .back")
    .forEach((current, index) => {
      current.addEventListener("click", () => {
        if (index < 4) {
          current.parentNode.style.display = "none";
          defConf.style.display = "flex";
        } else if (index == 4) {
          current.parentNode.parentNode.style.display = "none";
          confAccount.style.display = "flex";
        } else if (index == 5) {
          current.parentNode.parentNode.style.display = "none";
          document.querySelector("#form-delete-account").style.display = "flex";
        }
      });
    });

  document.querySelectorAll("#conf-list li").forEach((element, index) => {
    if (index == 0)
      element.addEventListener("click", () => {
        defConf.style.display = "none";
        confAccount.style.display = "flex";
      });
    else if (index == 1)
      element.addEventListener("click", () => {
        defConf.style.display = "none";
        document.querySelector("#conf-payment").style.display = "flex";
      });
    else if (index == 2)
      element.addEventListener("click", () => {
        defConf.style.display = "none";
        document.querySelector("#conf-notifications").style.display = "flex";
      });
    else if (index == 3)
      element.addEventListener("click", () => {
        defConf.style.display = "none";
        document.querySelector("#conf-def").style.display = "flex";
      });
  });
} catch (error) {
  console.log("Não está na tela de configurações > " + error);
}

/*Ir para exclusão de conta*/
const deleteAccount = document.querySelector("#delete-account");
try {
  deleteAccount.addEventListener("click", () => {
    deleteAccount.parentNode.parentNode.style.display = "none";
    defConf.style.display = "none";
    document.querySelector("#form-delete-account").style.display = "flex";
  });

  document
    .querySelector("#form-delete-account button")
    .addEventListener("click", () => {
      document.querySelector("#form-delete-account").style.display = "none";
      document.querySelector("#delete-account-options").style.display = "flex";
    });
} catch (error) {
  console.error("Não foi requisitada a exclusão da conta >" + error);
}

/*Planos, pegar fotos e botoar como background*/
const arrayPhotos = [];
document
  .querySelectorAll(".add-more-photos input")
  .forEach((current, index) => {
    /*Current é o input actual
    ao ser efectuada uma mudança no input actual*/
    current.addEventListener(
      "change",
      () => {
        if (current.files && current.files[0]) {
          const preview = document.querySelector("#perfil>img");
          
          preview.style.display = "flex";
          preview.nextElementSibling.style.display = "none";
          
          var file = new FileReader();

          file.onload = function (e) {
            arrayPhotos.splice(index, 1, e.target.result);
            preview.src = e.target.result;

            /*Estiliza a card contendo a imagem, quando possui um caminho*/
            current.parentNode.style.backgroundImage =
              "url(" + e.target.result + ")";
            current.parentNode.style.boxShadow = "0px 0px 9px rgba(0, 0, 0, 1)";
            current.nextElementSibling.setAttribute(
              "style",
              "background: url(./../images/delete.svg) no-repeat center; background-size: 100%;"
            );
            current.nextElementSibling.setAttribute("class", "remove-photo");
          };

          file.readAsDataURL(current.files[0]);

          /*Ao remover uma imagem*/
            current.nextElementSibling.addEventListener("click", () => {
              current.value = ''
              // arrayPhotos.splice(index, 1)
              arrayPhotos.splice(index, 1);
              let test = false
              for(element in arrayPhotos) {
                if (arrayPhotos[element].length > 1) {
                  preview.src = arrayPhotos[element];
                  test = true
                } else if(!test){
                  preview.style.display = "none";
                  document.querySelector("#perfil>p").display = "flex";
                }
              };

              current.nextElementSibling.removeAttribute("class");
              current.parentNode.removeAttribute("style", "background-image");
              current.nextElementSibling.setAttribute(
                "style",
                "background: rgba(128, 128, 128, 0.603); border: 0.2px solid rgba(85, 85, 85, 0.144);"
              );
            });
          
        }
      },
      false
    );
  });

/*Modais */
document.querySelectorAll('dialog button').forEach((current) => current.addEventListener('click', () => {
  current.parentNode.parentNode.style.display = 'none'
}))

