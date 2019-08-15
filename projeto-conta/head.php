<?php
include_once "Dao/ContaDao.php";
include_once "Lib/Functions.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Controle de Conta</title>
	<meta charset="UTF-8">
	<link rel="icon" href="imgs/ico_coins.ico">
	<link rel="stylesheet" type="text/css" href="css/geral.css">
	<link href="https://fonts.googleapis.com/css?family=Fira+Sans" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>
<body>
	<div class="menu">		
		<ul>
			<li>
				<a href="">Geral <img src="imgs/coins.png" class="coins-white"></a>
			</li>
			<li>
				<a href="">Controle</a>
			</li>
			<li>
				<a href="">Poupança <span class="poupanca">
					<?php
					// $fn = new Functions();
					// $idUsuario = $fn->get('u');

					// $objDao = new ContaDao();
					// $valorPoupanca = $objDao->listar($idUsuario);
					echo "R$ " . rand(100,1000) . ",00";
					?>
				</span></a>
			</li>
			<li>
				<a class="data-hoje" href="">Hoje <?php echo date('d/m/Y') ?></a>
			</li>
			<li>
				<form action="encerra-sessao.php">
					<a class="btn-logoff" href="encerra-sessao.php"><i class="fas fa-power-off"></i></a>
				</form>
			</li>
		</ul>
	</div>
</body>
</html>