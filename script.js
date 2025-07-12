let numeroSecreto = Math.floor(Math.random() * 10) + 1;
let tentativas = 0;

const inputPalpite = document.getElementById("inputPalpite");
const btnVerificar = document.getElementById("btnVerificar");
const elementoResultado = document.getElementById("resultado");

function verificarPalpite(){
    let palpite = Number(inputPalpite.value);
    tentativas++;

    if(palpite < 1 || palpite > 10 || isNaN(palpite)){
        elementoResultado.textContent = "Por favor digite um número válido!";
        elementoResultado.style.color = "orange";
        return;
    }
    if(palpite === numeroSecreto){
        elementoResultado.textContent = `Parabéns, você acertou!`;
        elementoResultado.style.color = "green";
        inputPalpite.disabled = true;
        btnVerificar.disabled = true;
    }else if(palpite < numeroSecreto){
        elementoResultado.textContent = "Tente um valor mais alto!";
        elementoResultado.style.color = "red";
    }else{
        elementoResultado.textContent = "Tente um valor mais baixo!";
        elementoResultado.style.color = "blue";
    }
    inputPalpite.value = "";
    inputPalpite.focus();
}

btnVerificar.addEventListener("click", verificarPalpite);

inputPalpite.addEventListener("keypress", function(event){
    if(event.key === "Enter"){
        verificarPalpite();
    }
});