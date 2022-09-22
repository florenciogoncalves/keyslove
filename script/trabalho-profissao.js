const elementos = document.querySelectorAll('select').forEach((element  => {
    element.addEventListener('change', opacidade)

    //Estilizando para que a opacidade seja reduzida para a metade, caso os valores selecionados façam parte do Array.search
    function opacidade(){
        var search = ['exemplo', 'Selecionar...', '01']
        if(search.includes(element.options[element.selectedIndex].textContent)){
            element.style.color = 'rgba(0, 0, 0, .5)'
            console.log(search.includes(element.options[element.selectedIndex].textContent))
        }
        else
            element.style.color = 'rgb(0, 0, 0)'
    }
    opacidade()

}))


//Para a barra de progresso
function setProgressVal(val){   

    const progressBar = document.querySelector('.progress-bar');
    const progressVal = document.querySelector('.progress-val');
    
    progressBar.setAttribute('style', 'width: ' + val + '%');
    progressVal.textContent = val + '%';  

}

//Esta chamada serve simplesmente para demonstração. Apagar de seguida
setProgressVal(20)