<?php

class Functions {

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
}