/*
*   Formatando o arquivo cadastro-6.html
*   Interatividade da área de inserção de senha
*/

const passCamp = document.querySelectorAll('.pass-camp')
Object.keys(passCamp).map(indice =>{
    passCamp[indice].loc = indice
    passCamp[indice].addEventListener('input', nextPassCamp);
    passCamp[indice].addEventListener('keyup', keyPassCamp);
    
})

function nextPassCamp(){
    if(passCamp[(this.loc)].value != '')
        passCamp[(parseInt(this.loc)+1)].focus()
}

function keyPassCamp(){
    if(event.key == 'Backspace' && passCamp[this.loc].value == '')
        passCamp[(parseInt(this.loc)-1)].focus()
    if(event.key.length == 1 && passCamp[this.loc].value != ''){
        passCamp[(parseInt(this.loc)+1)].focus()
        passCamp[parseInt(this.loc) + 1].value = event.key
    }
}

/*  FIM   */
