<?php

include_once "Dao/ContaDao.php";
include_once "Model/ContaModel.php";

class Controller {

	public function vContaForm($vlrGasto, $txtDescricao) {

		$objModel = new ContaModel();
		$countOk = 0;

		if($vlrGasto && $vlrGasto != "txtValor") {
			$objModel->setVlrGasto($vlrGasto);
			$countOk++;
		} else {
			echo "<script>alert('Favor inserir o Valor!')</script>";
		}

		if($txtDescricao && $txtDescricao != "txtDescricao") {
			$objModel->setTxtDescricao($txtDescricao);
			$countOk++;
		} else {
			echo "<script>alert('Favor inserir a Descrição!')</script>";
		}

		if($countOk == 2) {
			$objDao = ContaDao();
			$objDao->inserir($objModel);
		}

		header("Location: home.php");
	}
}