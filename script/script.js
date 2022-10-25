const statusOn = localStorage.getItem("status");

try {
  let estado = false;
  //Botão de acesso ao menu oculto
  const mostrarMenuMobile = document.querySelector("#mostra-menu-mobile");
  //Seleciona o menu oculto
  const menuMobile = document.querySelector("#menu-esquerdo");

  
  //Mostrar menu oculto ao clicar no botão de acesso ao menu oculto
  mostrarMenuMobile.addEventListener("click", () => menuMobile.style.display = 'flex');
  
  //Evento para clique no menu oculto
  menuMobile.addEventListener("click", (evt) => {
    if(!(document.querySelector('#div-left').contains(evt.target)))
      menuMobile.style.display = 'none'
  });
} catch (error) {
  console.error(error);
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
} catch (erro) {
  console.error("Demonstrando barra de progresso" + erro);
}

/*
 *Menu suspenso de 'changing-status'
 */
const onlineAgora = document.querySelectorAll("[name = 'online-agora']");

onlineAgora.forEach((element) =>
  element.addEventListener("click", () => {
    var setado = document.querySelector("#user-information .status");
    if (element.value == "online") {
      localStorage.clear();

      localStorage.setItem("status", "online");

      setado.style.display = "block";
      setado.style.backgroundColor = "var(--status-on)";
    } else if (element.value == "ocupado") {
      // if(statusOn){
      //   localStorage.removeItem('status')
      // }

      localStorage.clear();
      localStorage.setItem("status", "ocupado");

      setado.style.display = "block";
      setado.style.backgroundColor = "var(--status-off)";
    } else {
      // if(statusOn){
      //   localStorage.removeItem('status')
      // }

      localStorage.clear();

      localStorage.setItem("status", "offline");
      setado.style.display = "none";

      console.log("Status Offline");
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
  console.error("Janelas ocultas não encontradas" + error);
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
} catch (e) {
  console.error("Disponível só na área de mensagens >" + e);
}

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
      "url(../images/payment-method/" + element + ".svg)";

    addFlag.appendChild(insert);
  });
} catch (notFound) {
  console.error("Meios de pagamento" + notFound);
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
  console.error("Não está na tela de configurações > " + error);
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
  console.error("Não foi requisitada a exclusão da conta >" + error);
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
  console.error("Tente postar uma foto antes, vá para perfil" + error);
}

/*Modais */
try {
  document.querySelectorAll("dialog button").forEach((current) =>
    current.addEventListener("click", () => {
      current.parentNode.parentNode.style.display = "none";
    })
  );
} catch (error) {
  console.error("Não existem modais para esta página");
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

/*Navegar entre imagens*/
function navImages(arrayNavegado, ondeMostrar) {
  actual = 0;
  const proxima = pegar("#next-carroussel");
  const anterior = pegar("#preview-carroussel");

  proxima.addEventListener("click", () => {
    if (actual >= arrayNavegado.length - 1) actual = 0;
    else actual++;

    ondeMostrar.src = arrayNavegado[actual];
  });

  anterior.addEventListener("click", () => {
    if (actual <= 0) actual = arrayNavegado.length - 1;
    else actual--;

    ondeMostrar.src = arrayNavegado[actual];
  });
}

/*Ao clicar em outro perfil, ir para index.html*/
pegarTodos(".outro-perfil").forEach((current) => {
  current.addEventListener("dblclick", () => {
    window.location.replace("./../home/index.html");
  });
});

/*Enviar mensagem */
try {
  const escreverMensagem = pegar("textarea#message-text");
  escreverMensagem.addEventListener("keydown", (e) => {
    if (e.keyCode == 13 && e.ctrlKey) escreverMensagem.value += "\n";
    else if (e.keyCode == 13 && !e.ctrlKey) {
      enviar();
    }
  });
  function enviar() {
    if (escreverMensagem.value != "") {
      dia = "Segunda";
      hora = "18";
      minuto = "22";
      var enviar =
        "<div class='the-message-container user'><div class='identifier'><span>" +
        dia +
        "<span> &middot; </span> as " +
        hora +
        ":" +
        minuto +
        "</span></div><div class='text-container'><p class='writed-message'>" +
        escreverMensagem.value.replaceAll("\n", "<br>") +
        "</p></div>";
      pegar("#sended").innerHTML += enviar;
    }
    escreverMensagem.blur();
    pegar("#sended").lastChild.focus();
    escreverMensagem.value = "";
    escreverMensagem.style.height = "max-content";
    pegar("#sended").scrollTo(0, 1000);
  }
} catch (error) {
  console.error("Tente mandar uma mensagem" + error);
}

/*Alterar pessoa com quem se conversa */
try {
  pegarTodos(".person").forEach((person) => {
    person.addEventListener("click", () => {
      pegar("#person-selected").removeAttribute("id");
      person.setAttribute("id", "person-selected");
    });
  });
} catch (error) {
  console.error("Altere antes entre as conversas" + error);
}
