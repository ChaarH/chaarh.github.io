<?php
include_once "Controller/UsuarioController.php";
include_once "Lib/Functions.php";
include_once "cfg/dbConfig.php";
include_once "Lib/constantes.php";

?>
<head>
	<title>Cadastre-se</title>
	<link rel="stylesheet" type="text/css" href="css/cadastro.css">
	<link rel="icon" href="imgs/ico_coins.ico">
	<link href="https://fonts.googleapis.com/css?family=Fira+Sans" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>
<body>
	
	<div class="cola-com-nois">
		<h1>Opa! Cola com nóis! :D</h1>
	</div>

	<div class="bloco-cadastro">
		<form method="POST" action="">
			Nome<br>
			<input type="text" name="txtNome" autofocus=""><br><br>

			E-mail<br>
			<input type="text" name="txtEmail"><br><br>

			Senha<br>
			<input type="password" name="txtSenha"><br><br>

			Repetir Senha<br>
			<input type="password" name="txtRepetirSenha"><br><br>

			Gênero<br>
			<select name="txtSexo">
				<option>--Selecione--</option>
				<option value="M">Masculino</option>
				<option value="F">Feminino</option>
				<option value="O">Outro</option>
			</select><br><br>
			<label>
				<a href="index.php">&#8592; Voltar</a><br>
			</label>

			<input class="btn-submit" type="submit" value="Cadastrar :)">
		</form>
	</div>
	<img class="img-rodape" src="imgs/plant.png">
</body>
</html>
<?php

$obj = new UsuarioController();
$fn  = new Functions();

$nome  		  = $fn->post("txtNome");
$email 		  = $fn->post("txtEmail");
$senha 		  = $fn->post("txtSenha");
$repetirSenha = $fn->post("txtRepetirSenha");
$sexo         = $fn->post("txtSexo");

$vNovoUsuario = $obj->vUsuarioForm($nome, $email, $senha, $repetirSenha, $sexo);

?>