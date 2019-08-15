<!DOCTYPE html>
<html>
<?php
include_once "Controller/UsuarioController.php";
include_once "Lib/Functions.php";
?>
<head>
	<title>E-conimizaê</title>
	<link rel="stylesheet" type="text/css" href="css/geral.css">
	<link rel="icon" href="imgs/ico_coins.ico">
	<link href="https://fonts.googleapis.com/css?family=Fira+Sans" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>
<body>
	<div class="bora-polpar">
		<h1>Bora guardar um dinheirim? ;)</h1>
	</div>
	<div class="bloco-login">

		<form method="POST" action="">
			Usuário<br>
			<input type="text" name="txtLogin" autofocus=""><br>

			Senha<br>
			<input type="password" name="txtSenha">
			<label>
				<a href="recovery-password.php">Qual minha senha mesmo?</a><br>
				<a href="areaCadastro.php">Cadastraê!</a><br>
			</label>

			<input class="btn-submit-login" type="submit" value="Acessar">
		</form>
	</div>

	<img class="img-rodape" src="imgs/piggy-bank.png">
	<div class="made-by">
		Desenvolvido por <a href="https://alladinos.000webhostapp.com/portfolio" target="_blank"><strong>Carlos Aires</strong></a>
	</div>
</body>
</html>

<?php
$fn = new Functions();

$txtLogin = $fn->post('txtLogin');
$txtSenha = $fn->post('txtSenha');

$ctrl = new UsuarioController();
$ctrl->vLogin($txtLogin, $txtSenha);