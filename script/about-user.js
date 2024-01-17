const erros2 = []


const elementos = document.querySelectorAll("select").forEach((element) => {
  element.addEventListener("change", opacidade);

  //Estilizando para que a opacidade seja reduzida para a metade, caso os valores selecionados façam parte do Array.search
  function opacidade() {
    if (element.options[0] == element.options[element.selectedIndex]) {
      element.style.color = "rgba(0, 0, 0, .5)";
    } else element.style.color = "rgb(0, 0, 0)";
  }
  opacidade();
});



/*
*****************************************
***     Para a barra de progresso     ***
*****************************************
*/
function setProgressVal(val) {
  const progressBar = document.querySelector(".progress-bar");
  const progressVal = document.querySelector(".progress-val");

  progressBar.setAttribute("style", "width: " + val + "%");
  progressVal.textContent = val + "%";
}

// Valor de progresso em localstorage
setProgressVal(localStorage.finishedPercent);



/*
***************************************************************************************
***     Campos que se completam com outros, que nem quantidade de filhos e pets     ***
***************************************************************************************
*/
try {
  function onOff(conf, fazerEm) {
    const qtdFilhos = document.querySelector("#" + fazerEm);
    qtdFilhos.addEventListener("change", condicionar);
    const filhos = document.querySelector("#" + conf);
    filhos.addEventListener("change", () => {
      condicionar();
      if (filhos.value == "Sim") {
        qtdFilhos.options[1].selected = true
        qtdFilhos.style.color = "#000"
      }
    });


    function condicionar() {
      if (filhos.value == "Sim") {
        qtdFilhos.removeAttribute("disabled");
        qtdFilhos.setAttribute("required", "true");
      } else {
        qtdFilhos.value = "00";
        qtdFilhos.setAttribute("disabled", "true");
        qtdFilhos.removeAttribute("required");
      }
    }
  }
  onOff("filhos", "quantidade-filhos");
  onOff("pets", "quantidade-pets");

  const qtdPets = document.querySelector("#quantidade-pets");
  qtdPets.addEventListener("change", Pets);
  const pets = document.querySelector("#pets");
  pets.addEventListener("change", Pets);
  function Pets() {
    if (pets.value == "Sim") {
      qtdPets.removeAttribute("disabled")
    }
    else {
      qtdPets.setAttribute("disabled", "true");
    }

    if ("01".includes(pets.options[pets.selectedIndex].textContent))
      pets.style.color = "rgba(0, 0, 0, 1)";
  }
  Pets();
} catch (error) {
  erros2.push(error)
}

