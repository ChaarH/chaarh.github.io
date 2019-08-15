<?php

include_once "Model/UsuarioModel.php";
include_once "Dao/UsuarioDao.php";
include_once "Lib/Functions.php";


class UsuarioController {

	public function vUsuarioForm($nome, $email, $senha, $repetirSenha, $sexo) {

		$objModel = new UsuarioModel();

		$countOk = 0;

		if($nome && $nome != "txtNome") {
			$objModel->setTxtNome($nome);
			$countOk++;
		} else {
			echo "<script>alert('Favor inserir o nome!')</script>";
		}

		if($email) {
			$objModel->setTxtEmail($email);
			$countOk++;
		} else {
			echo "<script>alert('Favor inserir o E-mail!')</script>";
		}

		if($senha) {
			$fn = new Functions();

			$criptoSenha = $fn->criptoSenha($senha);
			$objModel->setTxtSenha($criptoSenha);
			$countOk++;
		} else {
			echo "<script>alert('Favor inserir o Senha!')</script>";
		}

		if($repetirSenha && $repetirSenha != "txtRepetirSenha") {
			if($repetirSenha != $senha) {
				echo "<script>alert('As senhas NÃO coincidem!')</script>";			
			}
			$countOk++;
		} else {
			echo "<script>alert('Favor repetir a Senha!')</script>";
		}

		if($sexo && $sexo != "--Selecione--") {
			$objModel->setTxtSexo($sexo);
			$countOk++;
		} else {
			echo "<script>alert('Favor inserir o Gênero!')</script>";
		}

		if($countOk == 5) {
			$objDao    = new UsuarioDao();	
			$idUsuario = $objDao->inserir($objModel);

			header("Location: home.php");
		}
	}

	public function vLogin($email, $senha) {
		$objModel = new UsuarioModel();
		$countOk = 0;

		if($email && $email != "txtLogin") {
			$objModel->setTxtEmail($email);
			$countOk++;
		} else {
			echo "<script>alert('Favor inserir o Login!')</script>";
		}

		if($senha && $senha != "txtSenha") {

			$fn = new Functions();
			$criptoSenha = $fn->criptoSenha($senha);

			$objModel->setTxtSenha($criptoSenha);
			$countOk++;
		} else {
			echo "<script>alert('Favor inserir a Senha')</script>";
		}

		if($countOk == 2) {
			$objDao = new UsuarioDao();
			$vLogin = $objDao->vLogin($objModel);

			if($vLogin) {
				header("Location: home.php");
			} else {
				echo "<script>alert('USUÁRIO E SENHA INCORRETOS!')</script>";
			}
		}


	}
}