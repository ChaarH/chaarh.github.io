<?php

include_once "cfg/dbConfig.php";
include_once "Model/ContaModel.php";
include_once "Model/UsuarioModel.php";

class ContaDao {

	public function criarTabela($idUsuario) {

		$bd  = new Banco();
		$pdo = $bd->abreConexao();

		$sql = $pdo->prepare(
				"CREATE TABLE TB_CONTA_USUARIO_ID_" . $idUsuario . " (
				`INT_SALARIO` INT(255) NOT NULL,
				`VLR_GASTO` INT(255) NOT NULL,
				`TXT_DESCRICAO` VARCHAR(255) NOT NULL,
				`DAT_DATA_GASTO` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
				`FLG_STATUS` CHAR(1) NULL DEFAULT 'A'
			)"
		);

		$sql->bindValue(":idUsuario", $idUsuario);
		$sql->execute();
	}

	public function listar($idUsuario) {
		$bd  = new Banco();
		$pdo = $bd->abreConexao();

		$sql = $pdo->prepare("SELECT * FROM TB_CONTA_USUARIO_ID_" .$idUsuario);
		$sql->execute();

		return $sql;
	}

	public function inserir($obj) {

		$bd  = new Banco();
		$pdo = $bd->abreConexao();

		$idUsuario    = $_SESSION["ID_USUARIO"];
		$valorGasto   = $obj->getVlrGasto();
		$txtDescricao = $obj->getTxtDescricao();

		$sql = $pdo->prepare("INSERT INTO TB_CONTA_USUARIO_ID_".$idUsuario." (INT_SALARIO,VLR_GASTO,TXT_DESCRICAO) VALUES (:vlrSalario,:vlrGasto,:txtDescricao)");
		$sql->bindValue(":vlrSalario", 1000);
		$sql->bindValue(":txtDescricao", $txtDescricao);
		$sql->bindValue(":vlrGasto", $valorGasto);

		$sql->execute();
	}

	public function deletar($idUsuario) {

		$bd  = new Banco();
		$pdo = $pdo->abreConexao();

		$sql = $pdo->prepare("UPDATE TB_CONTA_USUARIO_ID_".$idUsuario." SET FLG_STATUS WHERE ID_USUARIO = :idUsuario");
		$sql->bindValue(":idUsuario", $idUsuario);

		$sql->execute();
	}

	public function atualizar() {}

	// O SEGREDO DO SUCESSO É A CONSTÂNCIA DO PROPÓSITO

}