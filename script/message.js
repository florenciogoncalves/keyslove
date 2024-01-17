// /*==================== TOOGLE LANGUAGE ====================*/
// const switchLang = document.querySelector("#invert-language");
// switchLang.parentNode.style.flexDirection = "row";
// switchLang.addEventListener("click", () => {
// 	if (switchLang.parentNode.style.flexDirection == "row")
// 		switchLang.parentNode.style.flexDirection = "row-reverse";
// 	else switchLang.parentNode.style.flexDirection = "row";
// });



// /*==================== ENVIAR MENSAGEM ====================*/
// //Enviar arquivo
// const escreverMensagem = pegar("textarea#message-text");

// const sendFile = document.querySelector("#select-file");
// const labelFile = document.querySelector("#message-file");
// let refFile;

// labelFile.querySelector("button").addEventListener("click", () => {
// 	labelFile.firstChild.textContent = "File";
// 	labelFile.style.display = "none";
// 	sendFile.value = "";
// });

// //Evento para o envio de arquivo
// try {
//   document
// 	.querySelector("#create-message .send-message")
// 	.addEventListener("click", () => {
// 		if (labelFile.style.display == "block") {
// 			setSendFile();
// 		} else enviar();
// 	});

// sendFile.addEventListener("change", () => {
// 	//Evento para o envio
// 	window.addEventListener("keydown", (k) => {
// 		console.log(k.code);
// 		if (k.key == "Enter" && labelFile.style.display == "block") {
// 			setSendFile();
// 		}
// 	});

// 	// Caso tenha sido carregado algum ficheiro
// 	if (sendFile.files && sendFile.files[0]) {
// 		var file = new FileReader();

// 		file.onload = function (e) {
// 			labelFile.style.display = "block";

// 			labelFile.firstChild.textContent = sendFile.files[0].name;
// 			refFile = e.target.result;
// 		};
// 		file.readAsDataURL(sendFile.files[0]);
// 	}
// });

// function setSendFile() {
// 	updateDate();
// 	let enviarFicheiro =
// 		"<div class='the-message-container user'><div class='identifier'><span>" +
// 		dia +
// 		"<span> &middot; </span> as " +
// 		hora +
// 		":" +
// 		minuto +
// 		"</span></div><div class='text-container sended-file'><a class='writed-message' href='" +
// 		refFile +
// 		"' download>" +
// 		sendFile.files[0].name +
// 		"</a></div>";

// 	document.querySelector("#sended").innerHTML += enviarFicheiro;
// 	refFile = "";

// 	labelFile.style.display = "none";
// 	pegar("#sended").scrollTo(0, 1000);
// }
// } catch (error) {
//   console.error('Ups!')
// }

// //Enviar mensagem de texto
// //Nova linha <br> \n
// escreverMensagem.addEventListener("keydown", (e) => {
// 	if ((e.keyCode == 13 && e.ctrlKey) || (e.keyCode == 13 && e.shiftKey))
// 		escreverMensagem.value += "\n";
// 	else if (
// 		e.keyCode == 13 &&
// 		!e.ctrlKey &&
// 		labelFile.style.display != "block"
// 	) {
// 		enviar();
// 	} else if (e.keyCode == 13 && labelFile.style.display == "block") {
// 		escreverMensagem.blur();
// 		setSendFile();
// 	}
// });

// function updateDate() {
// 	let horario = new Date();
// 	const diasDeSemana = [
// 		"Domingo",
// 		"Segunda",
// 		"Terça",
// 		"Quarta",
// 		"Quinta",
// 		"Sexta",
// 		"Sábado",
// 	];
// 	dia = diasDeSemana[horario.getDay()];
// 	hora = horario.getHours();
// 	minuto = horario.getMinutes();

// 	function formating(value) {
// 		if (value < 10) {
// 			value = "0" + value;
// 		}

// 		return value;
// 	}

// 	hora = formating(hora);
// 	minuto = formating(minuto);
// }

// function enviar() {
// 	if (escreverMensagem.value != "") {
// 		updateDate();

// 		var enviar = (
// 			"<div class='the-message-container user'><div class='identifier'><span>" +
// 			dia +
// 			"<span> &middot; </span> as " +
// 			hora +
// 			":" +
// 			minuto +
// 			"</span></div><div class='text-container'><p class='writed-message'></p></div>"
// 		).toString();
// 		pegar("#sended").innerHTML += enviar;
// 		document.querySelector(
// 			"#sended .user:last-of-type .writed-message"
// 		).innerText = escreverMensagem.value.replaceAll("<br>", "\n");
// 	}
// 	escreverMensagem.blur();
// 	escreverMensagem.value = "";
// 	escreverMensagem.style.height = "max-content";
// 	pegar("#sended").scrollTo(0, 1000);
// }
