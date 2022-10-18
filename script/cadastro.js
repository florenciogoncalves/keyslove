/*Formatando cadastro-1 */
//Input Tel > Número de telefone
try {
  //Adicionar o indicativo automaticamente
  const telefone = document.querySelector("#cad-tel");
  let indicativo = "+55";

  telefone.addEventListener("input", checkNumber);
  telefone.addEventListener;
  telefone.addEventListener("focus", () => {
    if (telefone.value == "") {
      telefone.value = indicativo;
    }
  });

  function checkNumber() {
    //Define o tamanho máximo de dígitos
    if (telefone.value.length >= 17)
      telefone.value = telefone.value.substring(0, 17);

    //Deixa inalterável o indicativo do país
    if (telefone.value.substring(0, 3) != "+55") {
      if (telefone.value.substring(4).length > 0)
        telefone.value = indicativo + telefone.value.substring(3);
      else telefone.value = indicativo;
    }

    //Abre parênteses
    if (
      telefone.value.substring(0, 3) == "+55" &&
      telefone.value.length >= 3 &&
      telefone.value[3] != "("
    ) {
      let transform = telefone.value.split("");
      transform.splice(3, 0, "(");
      transform = transform.join("");

      telefone.value = transform;
    }

    //Fecha parênteses
    if (
      telefone.value.substring(0, 3) == "+55" &&
      telefone.value.length >= 6 &&
      telefone.value[6] != ")" &&
      !telefone.value.includes(")")
    ) {
      let transform = telefone.value.split("");
      transform.splice(6, 0, ") ");
      transform = transform.join("");
      telefone.value = transform;
    }

    //Leva o cursor para a última posição depois de color ou alterar o indicativo de estado
    if (telefone.value[6] == ")") {
      let gamb = (telefone.value = telefone.value.substring(0));
      telefone.value = "";
      telefone.value = gamb;
    }

    //Acrescenta espaço após o fechamento de parênteses
    if (telefone.value.indexOf(")") != -1 && !telefone.value.includes(" ")) {
      let transform = telefone.value.split("");
      transform.splice(7, 0, " ");
      transform = transform.join("");

      telefone.value = transform;
    }
  }

  //Caso o usuário não tenha digitádo nada depois de clicar no campo no número de telefone, remove o valor fixo de digitação
  telefone.addEventListener("blur", () => {
    if (telefone.value == indicativo) telefone.value = "";
  });

  //Campo senha
  const passWord = document.querySelector("#cad-pass");
  const msgError = document.querySelector(".info-erro-senha");

  passWord.addEventListener("input", () => {
    function valoresAceites() {
      if (!passWord.value.match(/[A-Z]+/)) {
        forcaPass("A senha deve conter: letra maiúscula");
        return;
      } else if (!passWord.value.match(/[@#$%&;*?_+*!]/)) {
        forcaPass("A senha deve conter: caracter especial");
        return;
      } else if (!passWord.value.match(/[1-9]+/)) {
        forcaPass("A senha deve conter: número");
        return;
      } else if (passWord.value.length < 6 && passWord.value != "") {
        forcaPass("A senha deve conter: mínimo 6 caracteres");
        return;
      }
      msgError.style.display = "none";
      passWord.removeAttribute("class", " not-correct");
    }
    valoresAceites();

    function forcaPass(mensagem) {
      passWord.className += " not-correct";

      //Mensagem de erro
      if (passWord.matches(".not-correct")) {
        msgError.innerText = mensagem;
        msgError.style.display = "flex";
      } else {
        msgError.innerText = "";
        msgError.style.display = "none";
      }
    }
    if (confPassWord.value != "") checkPassWords();
  });

  //Campo confirmar senha
  const confPassWord = document.querySelector("#cad-confirm-pass");
  confPassWord.addEventListener("input", checkPassWords);

  function checkPassWords() {
    if (!(passWord.value == confPassWord.value && passWord.value != "")) {
      confPassWord.className = "not-correct";
    } else confPassWord.removeAttribute("class", "not-correct");
  }

  setInterval(() => {
    if (document.querySelectorAll(".not-correct").length < 1 && passWord.value != '' && confPassWord.value != '' && telefone.value.length >= 14) {
      document.querySelector("#verify-pass").setAttribute("type", "submit");
    } else {
      document.querySelector("#verify-pass").setAttribute("type", "button");
    }
  }), 1000;
} catch (error) {
  console.error("Verifique a primeira janela de cadastro" + error);
}

/*   Formatando o arquivo cadastro-2.html
 *  Inserir datas possíveis nos selects,
 * Proibe o usuário de selecionar uma data que não seja de exatamente 18 anos do dia anterior
 */
try {
  let dataAtual = new Date();

  //Pegando os campos de seleção de data
  document.querySelectorAll(".select-placeholder").forEach((element) => {
    element.style.color = "#999";
    element.addEventListener("change", () => (element.style.color = "#000"));
  });

  //Botando cor cinza para opções que ficam de placeholder
  function colorDisabled() {
    document.querySelectorAll("option").forEach((current) => {
      if (!current.getAttribute("disabled")) {
        current.style.color = "#000";
      } else current.style.color = "#999";
    });
  }

  //Pegando as tags select da data de nascimento
  const bornDay = document.querySelector("#born-day");
  const bornMonth = document.querySelector("#born-month");
  const bornYear = document.querySelector("#born-year");
  
  document.querySelector('#first-year').textContent = dataAtual.getFullYear() - 18

  upDay(31);
  upMonth();
  upYear();
  colorDisabled();

  //Variáveis usadas para pegar os valores selecionados na caixa de seleção
  let selectedDay = parseInt(
    bornDay.options[bornDay.selectedIndex].textContent
  );
  let selectedMonth = parseInt(
    bornMonth.options[bornMonth.selectedIndex].textContent
  );
  let selectedYear = parseInt(
    bornYear.options[bornYear.selectedIndex].textContent
  );

  //Evento para inserir os dias quando o mês for alterado
  bornMonth.addEventListener("change", reconfirmDay);
  //Evento para verificar se o mês é bissexto e adicionar 1 dia ao Fevereiro
  bornYear.addEventListener("change", reconfirmFebruary);
  bornDay.addEventListener("change", reconfirm);

  const max30 = [4, 6, 9, 11]; //Meses com 30 dias
  const max31 = [1, 3, 5, 7, 8, 10, 12]; //Meses com 31 dias
  let valFeb = 28; //Reservada para Fevereiro

  //Cria um tag option quando chamada a função
  function create(c) {
    insert = document.createElement("Option");
    insert.textContent = c;
    insert.value;
    if (insert.textContent.length == 1) insert.textContent = "0" + c;
  }

  //Actualiza os dias de primeira instância
  function upDay(limitDay) {
    for (let c = 1; c <= limitDay; c++) {
      create(c);
      bornDay.appendChild(insert);
    }
  }

  //Insere os meses na tag select de id born-month
  function upMonth() {
    for (let c = 1; c <= 12; c++) {
      create(c);
      bornMonth.appendChild(insert);
    }
  }

  //Insere os anos, de acordo com o ano actual
  function upYear() {
    for (
      let c = dataAtual.getFullYear() - 18;
      c >= dataAtual.getFullYear() - 100;
      c--
    ) {
      create(c);
      bornYear.appendChild(insert);
    }
  }

  //Pega os valores da data escolhida pelo usuário
  function upDate() {
    selectedDay = parseInt(bornDay.options[bornDay.selectedIndex].textContent);
    selectedMonth = parseInt(
      bornMonth.options[bornMonth.selectedIndex].textContent
    );
    selectedYear = parseInt(
      bornYear.options[bornYear.selectedIndex].textContent
    );
  }

  //Remove todos os dias
  function remove() {
    while (bornDay.firstChild) bornDay.removeChild(bornDay.firstChild);
  }

  function reconfirm() {
    selectedDay = parseInt(bornDay.options[bornDay.selectedIndex].textContent);
    colorDisabled();
  }

  //Adiciona os dias de acordo com o mês selecionado
  function reconfirmDay() {
    const preserved = selectedDay;
    upDate();

    //Caso o novo mês selecionado possua o dia selecionado, matém o valor
    if (max30.includes(selectedMonth)) {
      remove();
      upDay(30);
    } else if (max31.includes(selectedMonth)) {
      remove();
      upDay(31);
    }
    reconfirmFebruary();

    if (preserved <= bornDay.childElementCount)
      bornDay.options[preserved - 1].setAttribute("selected", true);
    colorDisabled();
  }

  //Verificando o ano, caso seja bissexto, seta o valor de Fevereiro para 29, caso não, volta para 28
  function reconfirmFebruary() {
    const preservedM = selectedMonth;
    upDate();
    if (selectedYear % 4 == 0) valFeb = 29;
    else valFeb = 28;
    //Setando os valores, caso seja selecionado Fevereiro
    if (selectedMonth == 2) {
      remove();
      upDay(valFeb);
    }
    //Define o limite de data, caso tenha selecionado o último ano possível
    if (selectedYear == parseInt(dataAtual.getFullYear()) - 18) {
      for (let c = parseInt(dataAtual.getMonth()) + 2; c <= 12; c++)
        bornMonth.options[c].setAttribute("disabled", true);

      if (selectedMonth >= parseInt(dataAtual.getMonth()) + 1) {
        for (
          let c = parseInt(dataAtual.getUTCDate());
          c < bornDay.options.length;
          c++
        )
          bornDay.options[c].setAttribute("disabled", true);

        if (preservedM > parseInt(dataAtual.getMonth()) + 1) {
          bornMonth.options[0].setAttribute("selected", true);
          bornDay.options[0].setAttribute("selected", true);
          ableDay();
          ableMonth();
        }
      } else
        for (
          let c = parseInt(dataAtual.getUTCDate()) + 1;
          c < bornDay.options.length;
          c++
        )
          bornDay.options[c].removeAttribute("disabled");
    } else {
      ableDay();
      ableMonth();
    }

    function ableDay() {
      for (
        let c = parseInt(dataAtual.getUTCDate()) + 1;
        c < bornDay.options.length;
        c++
      )
        bornDay.options[c].removeAttribute("disabled");
    }

    function ableMonth() {
      for (let c = parseInt(dataAtual.getMonth()) + 1; c < 12; c++)
        bornMonth.options[c].removeAttribute("disabled");
    }
    colorDisabled();
  }
  reconfirmFebruary();
} catch (error) {
  console.error("Sem data a inserir" + error);
}

/*   Formatando o arquivo cadastro-6.html
 *   Interatividade da área de inserção de senha*/
try {
  const passCamp = document.querySelectorAll(".pass-camp");
  Object.keys(passCamp).map((indice) => {
    passCamp[indice].loc = indice;
    passCamp[indice].addEventListener("input", nextPassCamp);
    passCamp[indice].addEventListener("keyup", keyPassCamp);
  });

  function nextPassCamp() {
    if (passCamp[this.loc].value != "")
      passCamp[parseInt(this.loc) + 1].focus();
    console.log(this);
  }

  function keyPassCamp() {
    if (event.key == "Backspace" && passCamp[this.loc].value == "")
      passCamp[parseInt(this.loc) - 1].focus();
    if (event.key.length == 1 && passCamp[this.loc].value != "") {
      passCamp[parseInt(this.loc) + 1].focus();
      passCamp[parseInt(this.loc) + 1].value = event.key;
    }
  }
} catch (error) {
  console.log("Cadastro OTP code not found" + error);
}

//Imagens para pegar em cadastro-5
try {
  document.querySelectorAll('input[type="file"]').forEach((current) => {
    console.log(current);
    current.addEventListener(
      "change",
      () => {
        if (current.files && current.files[0]) {
          const preview = document.querySelector("#perfil>img");

          var file = new FileReader();

          file.onload = function (e) {
            current.parentNode.style.background =
              "url(" + e.target.result + ") cover no-repeat";

            /*Estiliza a card contendo a imagem, quando possui um caminho*/
            current.parentNode.style.backgroundImage =
              "url(" + e.target.result + ")";
            current.parentNode.style.boxShadow =
              "0px 0px 9px rgba(0, 0, 0, .2)";
            current.parentNode.style.border = "none";
            current.parentNode.style.backgroundSize = "cover";
            current.parentNode.style.backgroundPosition = "center";
            current.nextElementSibling.setAttribute(
              "style",
              "background: url(../images/delete.svg) no-repeat center; background-size: 100%;"
            );
            current.nextElementSibling.setAttribute("class", "remove-photo");

            current.nextElementSibling.style.display = "none";
          };

          file.readAsDataURL(current.files[0]);
        }
      },
      false
    );
  });
} catch (error) {
  console.error("Tente pegar uma imagem para a dropzone" + error);
}
