<h1>Olá, {{$user->name}}. Tudo bem?</h1>

<h3>Obrigado por sua inscrição!</h3>

<p>
    Faça bom proveito bla bla bla <br>
    Seu email de cadastro é : <strong>{{$user->email}}</strong><br>
    Sua senha é: <strong>Não enviamos senha!</strong>
</p>
<hr>
Email enviado em {{date('d/m/Y')}}.
