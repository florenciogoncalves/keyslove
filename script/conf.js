/*Adicionando função editar*/

/*Para .exit de configurações
 *Constantes das telas*/
const defConf = document.querySelector("#conf-select");
const confAccount = document.querySelector("#conf-account");

/*Para a lista de opções em configurações*/
document.querySelectorAll("#configuracoes .back").forEach((current, index) => {
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

/*Ir para exclusão de conta*/
const deleteAccount = document.querySelector("#delete-account");
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
