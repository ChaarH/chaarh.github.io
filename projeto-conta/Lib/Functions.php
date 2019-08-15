<?php

class Functions {

	public function post($post) {
		if(isset($_POST[$post]) ? $post = $_POST[$post] : "");
        return $post;
	}

	public function get($get) {
		if(isset($_GET[$get]) ? $get = $_GET[$get] : "");
        return $get;
	}

	public function session($session, $valor) {
		$sessao = $_SESSION[$session] = $valor;
		return $sessao;
	}

	public function destroySessao($session) {
		session_destroy($_SESSION[$session]);

		header("Location: index.php");
	}

	public function fData2HTML($data) {
		$novaData = substr($data, 0, 10);

		$dia = substr($novaData, 8, 2);
		$mes = substr($novaData, 5, 2);
		$ano = substr($novaData, 0, 4);

		return $dia . "/" . $mes . "/" . $ano;
	}

	public function vMes($valor) {
		$mesAtual = "";

		switch ($valor) {
			case '01':
				$mesAtual = "Janeiro";
				break;
			case '02':
				$mesAtual = "Fevereiro";
				break;
			case '03':
				$mesAtual = "Março";
				break;
			case '04':
				$mesAtual = "Abril";
				break;
			case '05':
				$mesAtual = "Maio";
				break;
			case '06':
				$mesAtual = "Junho";
				break;
			case '07':
				$mesAtual = "Julho";
				break;
			case '08':
				$mesAtual = "Agosto";
				break;
			case '09':
				$mesAtual = "Setembro";
				break;
			case '10':
				$mesAtual = "Outubro";
				break;
			case '11':
				$mesAtual = "Novembro";
				break;
			case '12':
				$mesAtual = "Dezembro";
				break;
		}
		return $mesAtual;
	}

	public function criptoSenha($senha) {
		$novaSenha = strtoupper(md5($senha . $senha));
		return $novaSenha;
	}
}