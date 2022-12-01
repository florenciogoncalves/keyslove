const erros = [];

// LocalStorage de status
if (!localStorage.status) {
  const statusOn = localStorage.setItem("status", "online");
}

if (localStorage.status == "online") {
  localStorage.setItem("status", "online");

  document.body.style.setProperty("--status-user", "#16c607");
} else if (localStorage.status == "ocupado") {
  localStorage.status = "ocupado";

  document.body.style.setProperty("--status-user", "#aaaaaa");
} else {
  localStorage.setItem("status", "offline");

  localStorage.status = "offline";

  document.body.style.setProperty("--status-user", "#aaaaaa00");
}

try {
  let estado = false;
  //Botão de acesso ao menu oculto
  const mostrarMenuMobile = document.querySelector("#mostra-menu-mobile");
  //Seleciona o menu oculto
  const menuMobile = document.querySelector("#menu-esquerdo");
  //Menu esquerdo
  const menu = document.querySelector("#div-left");

  //Mostrar menu oculto ao clicar no botão de acesso ao menu oculto
  mostrarMenuMobile.addEventListener("click", () => {
    menuMobile.style.display = "flex";
    setTimeout(() => {
      menu.style.transform = "translateY(0%)";
    }, 100);
  });
  //Evento para clique no menu oculto
  if (
    parseInt(window.getComputedStyle(document.querySelector("body")).width) <=
    992
  ) {
    menuMobile.addEventListener("click", (evt) => {
      if (!menu.contains(evt.target) && menuMobile.style.display == "flex") {
        menu.style.transform = "translateY(100%)";
        setTimeout(() => {
          menuMobile.style.display = "none";
        }, 350);
      }
    });
  }
} catch (error) {
  erros.push(error);
}
//Para a barra de progresso para o carroussel da página home
function setProgressVal(val) {
  if (val <= 100) {
    const progressBar = document.querySelector("#home-progress-bar");
    const progressVal = document.querySelector("#home-progress-val");

    progressBar.setAttribute("style", "width: " + val + "%");
    progressVal.textContent = val + "%";
  }
}

//Esta chamada serve simplesmente para demonstração da barra de progresso. Apagar de seguida
try {
  setProgressVal(34);
} catch (error) {
  erros.push(error);
}

/*
 *Menu suspenso de 'changing-status & Trocar status'
 */
const onlineAgora = document.querySelectorAll("[name = 'online-agora']");

onlineAgora.forEach((element) =>
  element.addEventListener("click", () => {
    var setado = document.querySelector("#user-information .status");
    if (element.value == "online") {
      localStorage.setItem("status", "online");

      document.body.style.setProperty("--status-user", "#16c607");
    } else if (element.value == "ocupado") {
      localStorage.status = "ocupado";

      document.body.style.setProperty("--status-user", "#aaaaaa");
    } else {
      localStorage.setItem("status", "offline");

      localStorage.status = "offline";

      document.body.style.setProperty("--status-user", "#aaaaaa00");
    }
  })
);

/*Ocultar qualquer janela por click*/
try {
  janelas = [
    ".vizualizar-menu",
    ".hidden-list",
    "#show-status-window",
    ".changing-status",
    ".botoes-top .options",
    ".botoes-top .options-container",
  ].map((element) => pegar(element));
  janelas.forEach((element, index) => {
    if ((index + 1) % 2 == 0) element.style.display = "none";
  });

  document.addEventListener("click", function fecharJanela(e) {
    if (!janelas.includes(e.target)) {
      janelas.forEach((current, index) => {
        if (index == 1 || index == 3 || index == 5)
          current.style.display = "none";
      });
    } else if (e.target == janelas[0]) {
      janelas[1].style.display = "flex";
      janelas[3].style.display = janelas[5].style.display = "none";
    } else if (e.target == janelas[2]) {
      janelas[3].style.display = "flex";
      janelas[1].style.display = janelas[5].style.display = "none";
    } else if (e.target == janelas[4]) {
      janelas[5].style.display = "block";
      janelas[1].style.display = janelas[3].style.display = "none";
    }
  });
} catch (error) {
  janelas = [
    ".vizualizar-menu",
    ".hidden-list",
    "#show-status-window",
    ".changing-status",
  ].map((element) => pegar(element));
  janelas.forEach((element, index) => {
    if ((index + 1) % 2 == 0) element.style.display = "none";
  });

  document.addEventListener("click", function fecharJanela(e) {
    if (!janelas.includes(e.target)) {
      janelas.forEach((current, index) => {
        if (index == 1 || index == 3) current.style.display = "none";
      });
    } else if (e.target == janelas[0]) {
      janelas[1].style.display = "flex";
      janelas[3].style.display = "none";
    } else if (e.target == janelas[2]) {
      janelas[3].style.display = "flex";
      janelas[1].style.display = "none";
    }
  });
  erros.push(error);
}

/*Inverter idioma em mensagens*/
try {
  const switchLang = pegar("#invert-language");
  switchLang.parentNode.style.flexDirection = "row";
  switchLang.addEventListener("click", () => {
    if (switchLang.parentNode.style.flexDirection == "row")
      switchLang.parentNode.style.flexDirection = "row-reverse";
    else switchLang.parentNode.style.flexDirection = "row";
  });
} catch (error) {
  erros.push(error);
}

//Redimensionando automaticamente a textarea da mensagem com uma biblioteca externa
document.addEventListener(
  "DOMContentLoaded",
  function () {
    try {
      autosize(document.querySelectorAll("#message-text"));
    } catch (error) {
      erros.push(error);
    }
  },
  true
);

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
  erros.push(error);
}

/* inplementando os meios de pagamento de forma dinâmica*/
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
    insert.setAttribute("name", element);
    insert.style.backgroundImage =
      "url(../images/payment-method/" + element + ".svg)";

    addFlag.appendChild(insert);
  });
} catch (error) {
  erros.push(error);
}

/*Criando o espaçamento no número de cartão */
try {
  const cardNumber = document.querySelector("#card-number");
  let newCardNum = "";
  cardNumber.textContent.split("").forEach((char, ind) => {
    newCardNum += char;
    if ((ind + 1) % 4 == 0) newCardNum += " ";
  });
  cardNumber.textContent = newCardNum;
} catch (error) {
  erros.push(error);
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
try {
  document
    .querySelectorAll("#conf-list span.edit")
    .forEach((element, index) => {
      const btnsEdit = document.querySelectorAll("#conf-list input");
      const saveValue = [];

      element.addEventListener("click", () => {
        btnsEdit[index].removeAttribute("disabled");
        btnsEdit[index].focus();
        saveValue[index] = btnsEdit[index].value;

        //Mostrar campo de password
        if (btnsEdit[index].getAttribute("type") == "password") {
          btnsEdit[index].setAttribute("type", "text");
        }
        if (
          btnsEdit[index].addEventListener("keyup", (e) => {
            if (e.key == "Enter")
              btnsEdit[index].setAttribute("disabled", true);
          })
        ) {
          btnsEdit[index].setAttribute("type", "text");
        }

        /*As requisições vão aqui*/
      });
      //Ao perder foco, deixar imutável
      btnsEdit[index].addEventListener("focusout", () => {
        if (index == 1 && btnsEdit[index].value.length < 11) {
          btnsEdit[index].value = saveValue[index];
        }

        if (index == 2) {
          if (
            !(
              btnsEdit[index].value.match("@") &&
              btnsEdit[index].value
                .substring(btnsEdit[index].value.match("@").index + 1)
                .includes(".") &&
              btnsEdit[index] != saveValue[index]
            )
          ) {
            alert("Insira um email correcto.");
            btnsEdit[index].value = saveValue[index];
          }
        }

        //Campo password
        if (index == 3) {
          btnsEdit[index].setAttribute("type", "password");
          function testPass() {
            if (!btnsEdit[index].value.match(/[A-Z]+/)) {
              return false;
            } else if (!btnsEdit[index].value.match(/[@#$%&;*?_+*!]/)) {
              return false;
            } else if (!btnsEdit[index].value.match(/[0-9]+/)) {
              return false;
            } else if (
              btnsEdit[index].value.length < 6 &&
              btnsEdit[index].value != ""
            ) {
              return false;
            } else return true;
          }

          if (!testPass()) {
            btnsEdit[index].setAttribute("disabled", true);
            btnsEdit;
            alert("Escolha uma password forte.");
          } else if (btnsEdit[index].value != saveValue[index]) {
            console.log(btnsEdit[index].value + " <> " + saveValue[index]);
            btnsEdit[index].setAttribute("disabled", true);
            alert("Sua palavra passe foi alterada.");
          }
        }

        if (btnsEdit[index].value.length < 2) {
          btnsEdit[index].value = saveValue[index];
        }

        btnsEdit[index].setAttribute("disabled", true);
      });
    });
} catch (error) {
  console.error(error);
}
/*Adicionando função editar*/

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
  erros.push(error);
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
      document.querySelector("#delete-account-options").style.display = "grid";
    });
} catch (error) {
  erros.push(error);
}

/*Planos, pegar fotos e botoar como background*/
try {
  const arrayPhotos = ["", "", "", ""];
  navImages(arrayPhotos, pegar("#perfil>img"));
  document
    .querySelectorAll(".add-more-photos input")
    .forEach((current, index) => {
      /*Current é o input actual
       *Ao ser efectuada uma mudança no input actual*/
      current.nextElementSibling.addEventListener("click", () => {
        if (current.nextElementSibling.className != "remove-photo")
          current.click();
      });
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
              current.parentNode.style.boxShadow =
                "0px 0px 9px rgba(0, 0, 0, 1)";
              current.nextElementSibling.setAttribute(
                "style",
                "background: url(../images/delete.svg) no-repeat center; background-size: 100%;"
              );
              current.nextElementSibling.setAttribute("class", "remove-photo");
            };

            file.readAsDataURL(current.files[0]);

            /*Ao remover uma imagem*/
            current.nextElementSibling.addEventListener("click", () => {
              current.value = "";
              arrayPhotos.splice(index, 1, "");
              var resta = false;

              current.nextElementSibling.removeAttribute("class");
              current.parentNode.removeAttribute("style", "background-image");
              current.nextElementSibling.setAttribute(
                "style",
                "background: url(./../images/plus.svg) no-repeat center;"
              );
              for (let c in arrayPhotos) {
                if (!arrayPhotos[c] == "") {
                  return (preview.src = arrayPhotos[c]);
                  resta = true;
                }
              }
              if (!resta) {
                preview.style.display = "none";
                preview.nextElementSibling.style.display = "flex";
              }
            });
          }
        },
        false
      );
    });
} catch (error) {
  erros.push(error);
}

/*Modais */
try {
  document.querySelectorAll("dialog button").forEach((current) =>
    current.addEventListener("click", () => {
      current.parentNode.parentNode.style.display = "none";
    })
  );
} catch (error) {
  erros.push(error);
}

/*Comum querySelector*/
function pegar(selector) {
  return document.querySelector(selector);
}

/*Comum querySelectorAll*/
function pegarTodos(selector) {
  return document.querySelectorAll(selector);
}

/*Próxima janela oculta, em user-about*/
function proxJanela(aoClicar, janelaMostrar, janelaOcultar) {
  janelaMostrar.style.display = "grid";
  janelaOcultar.style.display = "none";
  var pai = aoClicar.parentNode;
  pai.removeChild(aoClicar);
  filho = document.createElement("button");
  filho.setAttribute("class", "next-page-about");
  filho.textContent = ">";
  pai.appendChild(filho);
  aoClicar.setAttribute("type", "submit");
}

/*Adicionar tags, perfil*/
pegarTodos(".add-option-before").forEach((current) => {
  current.addEventListener("click", () => {
    pegar("#add-option-modal").setAttribute("open", "true");
    pegar("#add-option-modal").style.display = "grid";
    pegar("#add-elemento").addEventListener("click", pegarCaixa);
  });
  function pegarCaixa() {
    var valorPegado = pegar("#add-option-modal input").value;
    pegar("#add-option-modal input").value = "";

    var theInput = document.createElement("input");
    theInput.setAttribute("type", "checkbox");
    theInput.setAttribute("id", "tag-" + valorPegado);
    current.parentNode.insertBefore(theInput, current);

    var theLabel = document.createElement("label");
    theLabel.setAttribute("for", "tag-" + valorPegado);
    theLabel.textContent = valorPegado;
    current.parentNode.insertBefore(theLabel, current);

    pegar("#add-option-modal").close();
    pegar("#add-elemento").removeEventListener("click", pegarCaixa);
  }
});

/*Ao clicar em outro perfil, ir para index.php*/
pegarTodos(".outro-perfil").forEach((current) => {
  current.addEventListener("dblclick", () => {
    window.location.replace("./../home/index.php");
  });
});

/*Enviar mensagem */
try {
  //Enviar arquivo
  const escreverMensagem = pegar("textarea#message-text");

  const sendFile = document.querySelector("#select-file");
  const labelFile = document.querySelector("#message-file");
  let refFile;

  labelFile.querySelector("button").addEventListener("click", () => {
    labelFile.firstChild.textContent = "File";
    labelFile.style.display = "none";
    sendFile.value = "";
  });

  //Evento para o envio de arquivo
  document
    .querySelector("#create-message .send-message")
    .addEventListener("click", () => {
      if (labelFile.style.display == "block") {
        setSendFile();
      } else enviar();
    });

  sendFile.addEventListener("change", () => {
    //Evento para o envio
    window.addEventListener("keydown", (k) => {
      console.log(k.code);
      if (k.key == "Enter" && labelFile.style.display == "block") {
        setSendFile();
      }
    });

    // Caso tenha sido carregado algum ficheiro
    if (sendFile.files && sendFile.files[0]) {
      var file = new FileReader();

      file.onload = function (e) {
        labelFile.style.display = "block";

        labelFile.firstChild.textContent = sendFile.files[0].name;
        refFile = e.target.result;
      };
      file.readAsDataURL(sendFile.files[0]);
    }
  });

  function setSendFile() {
    updateDate();
    let enviarFicheiro =
      "<div class='the-message-container user'><div class='identifier'><span>" +
      dia +
      "<span> &middot; </span> as " +
      hora +
      ":" +
      minuto +
      "</span></div><div class='text-container sended-file'><a class='writed-message' href='" +
      refFile +
      "' download>" +
      sendFile.files[0].name +
      "</a></div>";

    document.querySelector("#sended").innerHTML += enviarFicheiro;
    refFile = "";

    labelFile.style.display = "none";
    pegar("#sended").scrollTo(0, 1000);
  }

  //Enviar mensagem de texto
  //Nova linha <br> \n
  escreverMensagem.addEventListener("keydown", (e) => {
    if ((e.keyCode == 13 && e.ctrlKey) || (e.keyCode == 13 && e.shiftKey))
      escreverMensagem.value += "\n";
    else if (
      e.keyCode == 13 &&
      !e.ctrlKey &&
      labelFile.style.display != "block"
    ) {
      enviar();
    } else if (e.keyCode == 13 && labelFile.style.display == "block") {
      escreverMensagem.blur();
      setSendFile();
    }
  });

  function updateDate() {
    let horario = new Date();
    const diasDeSemana = [
      "Domingo",
      "Segunda",
      "Terça",
      "Quarta",
      "Quinta",
      "Sexta",
      "Sábado",
    ];
    dia = diasDeSemana[horario.getDay()];
    hora = horario.getHours();
    minuto = horario.getMinutes();

    function formating(value) {
      if (value < 10) {
        value = "0" + value;
      }

      return value;
    }

    hora = formating(hora);
    minuto = formating(minuto);
  }

  function enviar() {
    if (escreverMensagem.value != "") {
      updateDate();

      var enviar = (
        "<div class='the-message-container user'><div class='identifier'><span>" +
        dia +
        "<span> &middot; </span> as " +
        hora +
        ":" +
        minuto +
        "</span></div><div class='text-container'><p class='writed-message'></p></div>"
      ).toString();
      pegar("#sended").innerHTML += enviar;
      document.querySelector(
        "#sended .user:last-of-type .writed-message"
      ).innerText = escreverMensagem.value.replaceAll("<br>", "\n");
    }
    escreverMensagem.blur();
    escreverMensagem.value = "";
    escreverMensagem.style.height = "max-content";
    pegar("#sended").scrollTo(0, 1000);
  }
} catch (error) {
  erros.push(error);
}

/*Alterar pessoa com quem se conversa */
try {
  const peoples = pegarTodos(".person");
  const backToPeoples = document.createElement("button");

  if (innerWidth <= 992) {
    pegar("#person-selected").removeAttribute("id");
  } else {
    backToPeoples.style.display = "none";
  }

  peoples.forEach((person) => {
    person.addEventListener("click", () => {
      if (innerWidth > 992) {
        pegar("#person-selected").removeAttribute("id");
        person.setAttribute("id", "person-selected");
      }

      if (innerWidth <= 992) {
        pegar(".peoples-to-chat").style.display = "none";
        pegar(".chat").className = "chat";

        backToPeoples.id = "back-to-peoples";
        backToPeoples.addEventListener("click", () => {
          pegar(".peoples-to-chat").style.display = "grid";
          pegar(".chat").className = "chat chat-mobile";
        });

        const headerFriend = pegar("#friend-information");
        headerFriend.insertBefore(backToPeoples, headerFriend.children[0]);
      }
    });
  });

  /* A diferenciação do comportamento quanto a tela de mensagens será diferenciada pelo display, quando grid, desktop, e quando flex, mobile.
   *Desse jeito poderá ocorrer comportamentos diferentes em ambientes diferentes*/
} catch (error) {
  erros.push(error);
}

/*
 *********************************************************
 ***     Máximo de 2000 caractéres para text-area      ***
 *********************************************************
 */
function maxCharTextArea(elemento) {
  //Atribuindo tamanho máximo de caractéres
  elemento.setAttribute("maxlength", "2000");
  const contador = elemento.parentNode.querySelector(".chars-count");
  contador.textContent = elemento.value.length + "/2000";

  //Elemento-contador
}

function showModalCondition(theModal, theButton, refModalName, definitive) {
  theModal = document.querySelector("#" + theModal);
  theButton = theModal.querySelector(theButton);

  if (definitive) {
    theButton.addEventListener("click", () => {
      localStorage.setItem(refModalName, "dontShowAgain");
    });

    if (localStorage.getItem(refModalName) == "dontShowAgain") {
      theModal.style.display = "none";
    }
  } else {
    theButton.addEventListener("click", () => {
      sessionStorage.setItem(refModalName, "showInNextSession");
    });

    if (sessionStorage.getItem(refModalName) == "showInNextSession") {
      theModal.style.display = "none";
    }
  }
}

//Para modal de home
try {
  showModalCondition("modal-home-1", ".close-modal", "homeModal1", true);

  showModalCondition("modal-home-2", ".close-modal", "homeModal2", true);
  showModalCondition("modal-home-2", "#active", "homeModal2", true);
  showModalCondition("modal-home-2", "#pass-this", "homeModal2", true);
} catch (error) {
  erros.push(error);
}

//Para o modal de perfil 'Melhore seu perfil'
try {
  showModalCondition("modal-perfil-1", ".close-modal", "perfilModal", true);
  showModalCondition("modal-perfil-1", ".red-btn", "perfilModal", true);
  showModalCondition(
    "modal-perfil-1",
    ".simple-btn:not(.close-modal)",
    "perfilModal",
    false
  );
} catch (error) {
  erros.push(error);
}

//Para modal de teste do amor
try {
  showModalCondition(
    "modal-teste-amor",
    ".simple-btn:not(.close-modal)",
    "testeAmorModal",
    false
  );
  showModalCondition(
    "modal-teste-amor",
    ".close-modal",
    "testeAmorModal",
    true
  );
  showModalCondition("modal-teste-amor", ".red-btn", "testeAmorModal", true);
} catch (error) {
  erros.push(error);
}

/*Para modal de teste do amor
try {
  showModalCondition(
    "modal-teste-amor",
    ".simple-btn:not(.close-modal)",
    "testeAmorModal",
    false
  );
  showModalCondition(
    "modal-teste-amor",
    ".close-modal",
    "testeAmorModal",
    true
  );
  showModalCondition("modal-teste-amor", ".red-btn", "testeAmorModal", true);
} catch (error) {
  erros.push(error);
}
*/
/*
 ***************************************************
 ***     LocalStorage para  as configurações     ***
 ***************************************************
 */
try {
  function switchStorage(element, ref, definitive) {
    element = document.querySelector(element);
    if (definitive) {
      if (localStorage.getItem(ref) == "on") element.checked = true;
      else element.checked = false;

      element.addEventListener("change", () => {
        if (element.checked) {
          localStorage.setItem(ref, "on");
        } else localStorage.setItem(ref, "off");
      });
    } else {
      if (sessionStorage.getItem(ref) == "on") element.checked = true;
      else element.checked = false;

      element.addEventListener("change", () => {
        if (element.checked) {
          sessionStorage.setItem(ref, "on");
        } else sessionStorage.setItem(ref, "off");
      });
    }
  }

  try {
    switchStorage("#active-translator", "translateChat", false);
  } catch (error) {
    erros.push(error);
  }

  //chamando...
  switchStorage("#showme-online", "beOnline", true);
  switchStorage("#let-invisible", "beInvisible", true);
  switchStorage("#show-me", "showMe", true);

  switchStorage("#active-notifications", "activeNotifications", true);
  switchStorage("#message-notifications", "messagesNotifications", true);
  switchStorage("#match-notifications", "matchNotifications", true);
} catch (error) {
  erros.push(error);
}

try {
  document.querySelector("#home .talk-now").addEventListener("click", () => {
    if (innerWidth <= 992) {
      sessionStorage.openChat = "on";
    }
  });
} catch (error) {
  erros.push(error);
}

try {
  if (sessionStorage.openChat == "on") {
    pegar(".peoples-to-chat").style.display = "none";
    pegar(".chat").className = "chat";
    sessionStorage.openChat = "off";
  }
} catch (error) {
  erros.push(error);
}
