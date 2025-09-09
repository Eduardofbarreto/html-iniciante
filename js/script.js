function gerarFrase(){

    const nome = document.getElementById('nome').value;
    const sobrenome = document.getElementById('sobrenome').value;
    const idade = document.getElementById('idade').value;

    const frase = `Olá, ${nome} ${sobrenome} 😁! Você tem ${idade} anos.`;

    document.getElementById('resposta').textContent = frase;
}