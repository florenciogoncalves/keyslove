/*
*   Formatando o arquivo cadastro-2.html
*   
* Estes script consiste em adicionar feactures à forma como a data é escolhida,
* Proibe o usuário de selecionar uma data que não seja de exatamente 18 anos do dia anterior
*/


let dataAtual = new Date

//Pegando as tags select da data de nascimento
const bornDay = document.querySelector('#born-day')
const bornMonth = document.querySelector('#born-month')
const bornYear = document.querySelector('#born-year')

upDay(31)
upMonth()
upYear()

//Variáveis usadas para pegar os valores selecionados na caixa de seleção
let selectedDay = parseInt(bornDay.options[bornDay.selectedIndex].textContent)
let selectedMonth = parseInt(bornMonth.options[bornMonth.selectedIndex].textContent)
let selectedYear = parseInt(bornYear.options[bornYear.selectedIndex].textContent)

//Evento para inserir os dias quando o mês for alterado
bornMonth.addEventListener('change', reconfirmDay)
//Evento para verificar se o mês é bissexto e adicionar 1 dia ao Fevereiro
bornYear.addEventListener('change', reconfirmFebruary)
bornDay.addEventListener('change', reconfirm)

const max30 = [4, 6, 9, 11]//Meses com 30 dias
const max31 = [1, 3, 5, 7, 8, 10, 12]//Meses com 31 dias
let valFeb = 28//Reservada para Fevereiro

//Cria um tag option quando chamada a função
function create(c){
    insert = document.createElement('Option')
    insert.textContent = c
    insert.value
    if(insert.textContent.length == 1)
        insert.textContent = '0' + c
}

//Actualiza os dias de primeira instância
function upDay(limitDay){
    for(let c = 1; c <= limitDay; c++){
        create(c)
        bornDay.appendChild(insert)
    }
}

//Insere os meses na tag select de id born-month
function upMonth(){
    for(let c = 1; c <= 12; c++){
        create(c)
        bornMonth.appendChild(insert)
    }
}

//Insere os anos, de acordo com o ano actual
function upYear(){
    for(let c = dataAtual.getFullYear() - 18; c >= dataAtual.getFullYear() - 100; c--){
        create(c)
        bornYear.appendChild(insert)
    }

}

//Pega os valores dos da data escolhida pelo usuário
function upDate(){
    selectedDay = parseInt(bornDay.options[bornDay.selectedIndex].textContent)
    selectedMonth = parseInt(bornMonth.options[bornMonth.selectedIndex].textContent)
    selectedYear = parseInt(bornYear.options[bornYear.selectedIndex].textContent)
}

//Remove todos os dias
function remove(){
        while(bornDay.firstChild)
            bornDay.removeChild(bornDay.firstChild)
}

function reconfirm(){
    selectedDay = parseInt(bornDay.options[bornDay.selectedIndex].textContent)
}

//Adiciona os dias de acordo com o mês selecionado
function reconfirmDay(){
    const preserved = selectedDay
    upDate()
    
    if(max30.includes(selectedMonth)){
        remove()
        upDay(30)
    }
    
    else if(max31.includes(selectedMonth)){
        remove()
        upDay(31)
    }
    reconfirmFebruary()
    if(preserved <= bornDay.childElementCount)
        bornDay.options[preserved - 1].setAttribute('selected', true)
}

//Verificando o ano, caso seja bissexto, seta o valor de Fevereiro para 29, caso não, volta para 28
function reconfirmFebruary(){
    const preservedM = selectedMonth
    upDate()
    if(selectedYear % 4 == 0)
        valFeb = 29
    else
        valFeb = 28
    if(selectedMonth == 2){
        remove()
        upDay(valFeb)
    }

    if(selectedYear == parseInt(dataAtual.getFullYear()) - 18){
        for(let c = parseInt(dataAtual.getMonth()) + 1; c < 12; c++)
            bornMonth.options[c].setAttribute('disabled', true)
        
        if(selectedMonth >= parseInt(dataAtual.getMonth()) + 1){
            for(let c = parseInt(dataAtual.getUTCDate()); c < bornDay.options.length; c++)
                bornDay.options[c].setAttribute('disabled', true)

            if(preservedM > parseInt(dataAtual.getMonth()) + 1){
                bornMonth.options[0].setAttribute('selected', true)
                bornDay.options[0].setAttribute('selected', true)
                ableDay()
                ableMonth()
            }
            }

        else
            for(let c = parseInt(dataAtual.getUTCDate()) + 1; c < bornDay.options.length; c++)
            bornDay.options[c].removeAttribute('disabled')
    }

    else{
        ableDay()
        ableMonth()
    }

    function ableDay(){
        for(let c = parseInt(dataAtual.getUTCDate()) + 1; c < bornDay.options.length; c++)
            bornDay.options[c].removeAttribute('disabled')
    }

    function ableMonth(){
        for(let c = parseInt(dataAtual.getMonth()) + 1; c < 12; c++)
            bornMonth.options[c].removeAttribute('disabled')
    }

}
reconfirmFebruary()
