<?php

class ContaModel {

	private $vlrSalario;
	private $vlrGasto;
	private $txtDescricao;
	private $flgStatus;

	public function setVlrSalario($vlrSalario) {
		$this->vlrSalario = $vlrSalario;
	}

	public function getVlrSalario() {
		return $this->vlrSalario;
	}

	public function setVlrGasto($vlrGasto) {
		$this->vlrGasto = $vlrGasto;
	}

	public function getVlrGasto() {
		return $this->vlrGasto;
	}

	public function setTxtDescricao($txtDescricao) {
		$this->txtDescricao = $txtDescricao;
	}

	public function getTxtDescricao() {
		return $this->txtDescricao;
	}

	public function setFlgStatus($flgStatus) {
		$this->flgStatus = $flgStatus;
	}

	public function getFlgStatus() {
		return $this->flgStatus;
	}
}