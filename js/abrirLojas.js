$(document).ready(function(){
    $(this).click(function(ele){

        // Pegar o id do elemento clicado
        let flipId = ele.target.id;

        // armazenar em array o elemento para pegar o numero
        let flipIdArray = flipId.split("_");

        // ver se o elemento clicado é a classe que ouvir o click
        if(flipIdArray[0] == "flip"){

            // pegar o elemento clicado
            $panel = document.querySelector(`#panel_${flipIdArray[1]}`);

            // remover a classes que foram abertas
            removerClasses("div", "panel2");
            
            // adicionar a classe de abertura no elemento
            $panel.classList.add('panel2');

            //abrir o elemento com feito slow
            $(".panel2").slideToggle("slow");
        }

        
    })
})

function removerClasses(elemento, classe){
    const $elemento = Array.from( document.querySelectorAll(elemento));
    $elemento.map( e  => e.classList.remove(classe));
}