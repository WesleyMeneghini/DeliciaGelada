// alert('tse');

const $btnCategorias = document.getElementById('btn_categorias');
const $btnSubCategorias = document.getElementById('btn_sub_categorias');
const $conteudo = document.getElementById('conteudo');


let contPag = 0;




const cadastrarCatSub = (tipo) => {
    // if (contPag == 0) {
    // contPag = 1;

    let pagina = `
            <div id='container_usuario' class='center'>
                <div id='cadastro_usuario' class='form-crud center txt-center'>
                    
                    <h1>Cadastrar ${tipo}</h1>
                    
                    <form 
                        name='frm_${tipo}' 
                        method='post' 
                        action='router.php?controller=${tipo}&modo=novo'>

                        <p>
                            Nome: 
                            <input
                                class='input-txt'
                                type='text'
                                name='txt_nome'
                                max-length='45'
                                required/>
                        </p>

                        <input class='button' type='submit' value='Salvar'></input>

                    </form>
                </div>
                <div id='container_consulta_usuarios' class='center'>
                    <table class='tbl-crud center'>
                        <tr class='bkg-primary'>
                            <td class='negrito'>Nome</td>
                            <td class='negrito'>Editar</td>
                            <td class='negrito'>Ativar/Desativar</td>
                            <td class='negrito'>Excluir</td>
                        </tr>
                    </table>
                </div>
            </div>
        `;
    $conteudo.innerHTML = pagina;
    // } else {
    //     contPag = 0;
    //     limpar();
    // }
}

const limpar = () => {
    $conteudo.innerHTML = "";
}



const eventos = () => {

    $btnCategorias.addEventListener('click', () => cadastrarCatSub("categoria"));

    $btnSubCategorias.addEventListener('click', () => cadastrarCatSub("sub-categoria"));

}

eventos();