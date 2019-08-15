<?php

include_once "Model/UsuarioModel.php";
include_once "Dao/ContaDao.php";
include_once "Lib/Functions.php";

class UsuarioDao {

	public function vLogin($obj) {

		$bd  = new Banco();
		$pdo = $bd->abreConexao();

		$email = $obj->getTxtEmail();
		$senha = $obj->getTxtSenha();

		$sql = $pdo->prepare("SELECT ID_USUARIO FROM TB_USUARIOS WHERE TXT_LOGIN = :txtEmail AND TXT_SENHA = :txtSenha");
		$sql->bindValue(":txtEmail", $email);
		$sql->bindValue(":txtSenha", $senha);

		if($sql->rowCount() > 0) {
			foreach ($sql as $date) {
				$fn = new Functions();
				$idUsuario = $date['ID_USUARIO'];

				session_start();
				$fn->session('ID_USUARIO', $idUsuario);
			}	
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function listar() {

		$bd  = new Banco();
		$pdo = $bd->abreConexao();

		$query = "SELECT * FROM TB_USUARIOS";

		$sql = $pdo->prepare($query);
	}

	public function inserir($obj) {

		$bd  = new Banco();
		$pdo = $bd->abreConexao();

		$nome  = $obj->getTxtNome();
		$nome .= " #" . rand(0, 10000);

		$email = $obj->getTxtEmail();
		$senha = $obj->getTxtSenha();
		$sexo  = $obj->getTxtSexo();

		$sql = $pdo->prepare("INSERT INTO TB_USUARIOS (TXT_NOME, TXT_LOGIN, TXT_SENHA, TXT_SEXO) VALUES (:txtNome, :txtEmail, :txtSenha, :txtSexo)");
		$sql->bindValue(":txtNome", $nome);
		$sql->bindValue(":txtEmail", $email);
		$sql->bindValue(":txtSenha", $senha);
		$sql->bindValue(":txtSexo", $sexo);

		$sql->execute();

		// BUSCA ID USUARIO RECEM CRIADO
		$obj = new UsuarioDao();
		$returnIdUsuario = $obj->retornaId($email, $senha);

		// ENVIA P/ CRIAR TABELA COM NOME DA ID DO USUARIO
		$objDao = new ContaDao();
		$objDao->criarTabela($returnIdUsuario);

		return $returnIdUsuario;
	}

	public function deletar($idUsuario) {

		$bd  = new Banco();
		$pdo = $bd->abreConexao();

		$sql = $pdo->prepare("UPDATE TB_USUARIOS SET FLG_STATUS = 'D' WHERE ID_USUARIO = :idUsuario");
		$sql->bindValue(":idUsuario", $idUsuario);

		$sql->execute();
	}

	public function atualizar() {}

	public function retornaId($email, $senha) {

		$bd  = new Banco();
		$pdo = $bd->abreConexao();

		$sql = $pdo->prepare("SELECT ID_USUARIO FROM TB_USUARIOS WHERE TXT_LOGIN = :txtEmail AND TXT_SENHA = :txtSenha");
		$sql->bindValue(":txtEmail", $email);
		$sql->bindValue(":txtSenha", $senha);

		$sql->execute();

		$idUsuario = NULL;

		foreach ($sql as $date) {
			$idUsuario = $date["ID_USUARIO"];

			$objModel = new UsuarioModel();
			$objModel->setIdUsuario($idUsuario);
		}

		return $idUsuario;
	}
}