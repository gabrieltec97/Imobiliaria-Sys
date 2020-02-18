<h1>Contato via site</h1>

<h3>Olá, recebemos um contato de um possível cliente interessado em um imóvel. Segue abaixo os dados do mesmo:</h3>

<b>Nome :</b> {{ $dados['nome'] }} <br><br>
<b>Email :</b> {{ $dados['email'] }} <br><br>
<b>Telefone :</b> {{ $dados['telefone'] }} <br><br>
<b>Imóvel :</b> {{ $dados['imovel'] }} <br><br>

@if($dados['aceito'] == 'positivo')
    <h4 style="color: red">Este cliente aceita ser respondido via WhatsApp</h4>
@endif



