const precos = {
    'gasolina': 5.69,
    'gasolina_ad': 5.85,
    'etanol': 4.35,
    'diesel': 5.59,
    'diesels10': 5.79,
    'gas': 4.20
};

const cash_back = {
    'gasolina': 0.04,
    'gasolina_adt': 0.09,
    'etanol': 0.09,
    'diesel': 0.08,
    'diesels10': 0.10,
    'gas' : 0.05
};

const formulario =
document.getElementById('calculadoraCombustivel');
const resultadoDiv = document.getElementById('resultado');

formulario.addEventListener('submit', function(evento)){
    evento.preventDefault();

    const combustivel = 
    document.getElementById('combustivel').ariaValueMax;
    const litro = 
    parseFloat(document.getElementById('litro').value);

    if(precos.hasOwnProperty(combustivel)
    && cash_back.hasOwnProperty(combustivel)){
        const precoPorLitro = precos[combustivel];
        const percentualCashback = cash_back[combustivel];

        const valorFinal = litro * precoPorLitro;
        const valorCashback = valorFinal * percentualCashback;
        const valorAPagarComCashback = valorFinal - valorCashback;

        const formatter = new Intl.NumberFormat('pt-BR', {
            style: 'currency',
            currency: 'BRL'
        });

        const valorFinalFormatado = formatter.format(valorFinal);
        const valorCashbackFormatado = 
        formatter.format(valorCashback);
        const valorAPagarFormatado = 
        formatter.format(valorAPagarComCashback);

        const mensagem = `
        <p>Foi abastecido ${litro} litros de ${combustivel}.</p>
        <p>Num valor de ${valorFinalFormatado}.</p>
        <p>O seu cashback de hoje é de ${valorAPagarFormatado}.</p>
        <p>Você pagará: ${valorAPagarFormatado}.</p>
        `;

        resultadoDiv.innerHTML = mensagem;
    }else{
        resultadoDiv.textContent = "Combustível selecionado 
        não encontrado.";
    }
}