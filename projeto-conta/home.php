<?php
include_once "head.php"; 
include_once "Lib/Functions.php";
include_once "Dao/ContaDao.php";
include_once "Model/ContaModel.php";

$fn = new Functions();
?>

<div class="bloco-principal-index">
	<div class="mes-atual">
		<h1><i class="fas fa-chevron-left"></i> <?php echo $fn->vMes(date('m'))." ".date('Y') ?> <i class="fas fa-chevron-right"></i></h1>
	</div>

	<div class="bloco-controle">
		<div class="tabela-controle">
			<table>
				<thead>
					<th colspan="4"><img src="imgs/coins-white.png"> R$ <?php echo rand(1000,1500).",00" ?></th>
				</thead>
				<?php 
				session_start();
				$idUsuario = $_SESSION['ID_USUARIO'];

				$objDao = new ContaDao();
				$listar = $objDao->listar($idUsuario);
				unset($objDao);

				$html = "";
				$i = 1;
				$valorTotal = 0;

				foreach ($listar as $value) {
					$html  .= "<td>" . $i . "</td>"
						  ."<td>" . $value['TXT_DESCRICAO'] . "</td>"
						  .		"<td>". $fn->fData2HTML($value['DAT_DATA_GASTO']) ."</td>"
						  .		"<td>R$ " . $value['VLR_GASTO']
						  . "</tr>";
				    $valorTotal += $value['VLR_GASTO'];
				    $i++;
				}
				$html .= "<td colspan='3'><strong>Total</strong></td>"
				  .	 "<td>R$ ". $valorTotal ."</td>";	
				
				echo $html;
				?>
			</table>
		</div>

		<div class="acoes-controle">
			<h2>Adicionar</h2><br>
			<form action="" method="POST">
				Valor <input type="text" name="txtValor" autofocus="">
				Descrição <input type="text" name="txtDescricao"><br>
				Tipo 
				<select name="slcTipo">
					<option value="Retirada">Retirada</option>
					<option value="Acréscimo">Acréscimo</option>
				</select>	
				
				Fonte
				<select name="slcFonte">
					<option value="Salário">Salário</option>
					<option value="Poupança">Poupança</option>
				</select>

				<input class="btn-submit" type="submit" value="Salvar">
			</form>

			<div class="saldo-disponivel">
				<h2>Saldo disponível</h2>
				<div class="valor-saldo-disponivel">
					<span><img src="imgs/piggy-bank.png">R$ 2.400,00</span>
				</div>
			</div>
		</div>
	</div>
</div>
<?php

$valor     = $fn->post('txtValor');
$descricao = $fn->post('txtDescricao');

$objDao   = new ContaDao();
$objModel = new ContaModel();

$objModel->setVlrGasto($valor);
$objModel->setTxtDescricao($descricao);

$objDao->inserir($objModel);
