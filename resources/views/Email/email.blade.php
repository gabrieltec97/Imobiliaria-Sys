<h1>Contato via site</h1>

@if(empty($dados['mensagem']))
    <h3>Olá, recebemos um contato de um possível cliente interessado em um imóvel. Segue abaixo os dados do mesmo:</h3>
@else
    <h3>Olá, recebemos o contato de um possível cliente via site. Segue abaixo os dados do mesmo:</h3>
@endif

<b>Nome :</b> {{ $dados['nome'] }} <br><br>
<b>Email :</b> {{ $dados['email'] }} <br><br>
<b>Telefone :</b> {{ $dados['telefone'] }} <br><br>
@if(!empty($dados['imovel']))
    <b>Imóvel :</b> {{ $dados['imovel'] }} <br><br>
@endif

@if(!empty($dados['mensagem']))
    <b>Mensagem :</b> {{ $dados['mensagem'] }} <br><br>
@endif

@if(!empty($dados['aceito']))
    @if($dados['aceito'] == 'positivo')
        <h4 style="color: red">Este cliente aceita ser respondido via WhatsApp</h4>
    @endif
@endif



