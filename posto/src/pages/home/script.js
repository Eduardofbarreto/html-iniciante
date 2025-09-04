const precos = {
    'gasolina': 5.69,
    'gasolina_adt': 5.85,
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

const formulario = document.getElementById('calculadoraCombustivel');
const resultadoDiv = document.getElementById('resultado');

formulario.addEventListener('submit', function(evento) {
    evento.preventDefault();

    const combustivel = document.getElementById('combustivel').value;
    const litro = parseFloat(document.getElementById('litro').value);

    if (precos.hasOwnProperty(combustivel) && cash_back.hasOwnProperty(combustivel)) {
        const precoPorLitro = precos[combustivel];
        const percentualCashback = cash_back[combustivel];

        const valorTotal = litro * precoPorLitro;
        const valorCashback = valorTotal * percentualCashback;
        const valorAPagarComCashback = valorTotal - valorCashback;

        const formatter = new Intl.NumberFormat('pt-BR', {
            style: 'currency',
            currency: 'BRL'
        });

        const valorTotalFormatado = formatter.format(valorTotal);
        const valorCashbackFormatado = formatter.format(valorCashback);
        const valorAPagarFormatado = formatter.format(valorAPagarComCashback);

        const mensagem = `
            <p>⛽️ Foi abastecido ${litro} litros de ${combustivel}.</p>
            <p>💰 Valor total: ${valorTotalFormatado}</p>
            <p>💸 Cashback a receber: ${valorCashbackFormatado}</p>
            <p>💳 **Valor final a pagar:** ${valorAPagarFormatado}</p>
        `;

        resultadoDiv.innerHTML = mensagem;
    } else {
        resultadoDiv.textContent = "Combustível selecionado não encontrado.";
    }
});