from flask import Flask, render_template, request, redirect, session

app = Flask(__name__)
app.secret_key = 'uma_chave_secreta'  # Importante para usar sessões (substitua por algo mais seguro)

USUARIOS_VALIDOS = {
    'usuario1': 'senha123',
    'teste': 'abc456',
    'admin': 'securepass',
    'seu_novo_usuario': 'sua_nova_senha'  # Adicione seus usuários aqui
}

@app.route('/login', methods=['GET', 'POST'])
def login():
    erro = None
    if request.method == 'POST':
        usuario = request.form['usuario']
        senha = request.form['senha']
        if usuario in USUARIOS_VALIDOS and USUARIOS_VALIDOS[usuario] == senha:
            session['usuario_logado'] = True
            session['nome_usuario'] = usuario  # Opcional
            return redirect('/protegido')
        else:
            erro = 'Usuário ou senha incorretos.'
    return render_template('login.html', erro=erro)

@app.route('/protegido')
def protegido():
    if 'usuario_logado' in session and session['usuario_logado']:
        nome_usuario = session.get('nome_usuario', 'Usuário')
        return render_template('pagina_protegida.html', nome_usuario=nome_usuario)
    return redirect('/login')

@app.route('/logout')
def logout():
    session.pop('usuario_logado', None)
    session.pop('nome_usuario', None)
    return redirect('/login')

if __name__ == '__main__':
    app.run(debug=True)