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

//Para a barra de progresso
function setProgressVal(val) {
  const progressBar = document.querySelector(".progress-bar");
  const progressVal = document.querySelector(".progress-val");

  progressBar.setAttribute("style", "width: " + val + "%");
  progressVal.textContent = val + "%";
}

//Esta chamada serve simplesmente para demonstração. Apagar de seguida
setProgressVal(20);
try {
  function onOff(conf, fazerEm) {
    const qtdFilhos = document.querySelector("#"+fazerEm);
    qtdFilhos.addEventListener("change", condicionar);
    const filhos = document.querySelector("#"+conf);
    filhos.addEventListener("change", condicionar);
    function condicionar() {
      if (filhos.value == "Sim") qtdFilhos.removeAttribute("disabled");
      else {
        qtdFilhos.setAttribute("disabled", "true");
        qtdFilhos.value = "00";
      }
    }
  }
  onOff('filhos', 'quantidade-filhos')
  onOff('pets', 'quantidade-pets')

  const qtdPets = document.querySelector("#quantidade-pets");
  qtdPets.addEventListener("change", Pets);
  const pets = document.querySelector("#pets");
  pets.addEventListener("change", Pets);
  function Pets() {
    if (pets.value == "Sim") qtdPets.removeAttribute("disabled");
    else {
      qtdPets.setAttribute("disabled", "true");
      qtdPets.value = "Selecionar...";
    }

    if ("01".includes(element.options[element.selectedIndex].textContent))
      element.style.color = "rgba(0, 0, 0, 1)";
  }
  Pets();
} catch (error) {
  console.error(error);
}
