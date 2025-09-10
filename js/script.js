function calcular() { 
    // Obtém a operação selecionada pelo usuário
    const op = document.getElementById('op').value; 

    const num1 = Number(document.getElementById('num1').value);
    const num2 = Number(document.getElementById('num2').value);

    const resultado = `O resultado é `;
    let calculo; 

    switch (op) {
        case '+':
            calculo = num1 + num2;
            break;
        case '-':
            calculo = num1 - num2;
            break;
        case '*':
            calculo = num1 * num2;
            break;
        case '/':
            if (num2 === 0) {
                document.getElementById('resultado').textContent = "Não é possível dividir por zero!";
                return;
            }
            calculo = num1 / num2;
            break;
        default:
            document.getElementById('resultado').textContent = "Operação inválida.";
            return;
    }

    document.getElementById('resultado').textContent = `${resultado}${calculo}`;
}