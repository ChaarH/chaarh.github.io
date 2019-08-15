<?php

class UsuarioModel {

	private $idUsuario;
	private $txtNome;
	private $txtEmail;
	private $txtSenha;
	private $txtSexo;

	private $dataCadastro;
	private $flgStatus;

	public function setIdUsuario($idUsuario) {
		$this->idUsuario = $idUsuario;
	}

	public function getIdUsuario() {
		return $this->idUsuario;
	}

	public function setTxtNome($txtNome) {
		$this->txtNome = $txtNome;
	}

	public function getTxtNome() {
		return $this->txtNome;
	}

	public function setTxtEmail($txtEmail) {
		$this->txtEmail = $txtEmail;
	}

	public function getTxtEmail() {
		return $this->txtEmail;
	}

	public function setTxtSenha($txtSenha) {
		$this->txtSenha = $txtSenha;
	}

	public function getTxtSenha() {
		return $this->txtSenha;
	}

	public function setTxtSexo($txtSexo) {
		$this->txtSexo = $txtSexo;
	}

	public function getTxtSexo() {
		return $this->txtSexo;
	}

	public function setDataCadastro($dataCadastro) {
		$this->dataCadastro = $dataCadastro;
	}

	public function getDataCadastro() {
		return $this->dataCadastro;
	}

	public function setFlgStatus($flgStatus) {
		$this->flgStatus = $flgStatus;
	}

	public function getFlgStatus() {
		return $this->flgStatus;
	}
}