const $cep = document.querySelector('#txt_cep');
const $logradouro = document.getElementById("txt_logradouro");
const $bairro = document.getElementById("txt_bairro");
const $localidade = document.getElementById("txt_localidade");
const $uf = document.getElementById("txt_uf");

const erroBuscaUrl = (erro) =>{
    alert("Cep não encontrado!");
}
let teste = "";
const mostrarDados = (json) => {
    console.log(json);
    teste = json;
    $logradouro.value = json.logradouro;
    $bairro.value = json.bairro;
    $localidade.value = json.localidade;
    $uf.value = json.uf;


}


const formatarCep = (cep) =>{

    cep = cep.replace(".", "");
    cep = cep.replace("-", "");
    return cep;
}

const buscarViaCep = (cep) =>{
    let url = `https://viacep.com.br/ws/${cep}/json/`;
    fetch(url)
        .then( res => res.json())
        .then( res => mostrarDados(res))
        .catch( res => erroBuscaUrl(res));
}


const buscarCep = (cep) =>{
    let zipCode = formatarCep(cep);

    buscarViaCep(zipCode);

}


const eventos = () =>{
    
    $cep.addEventListener('change', () => buscarCep($cep.value));

}

eventos();