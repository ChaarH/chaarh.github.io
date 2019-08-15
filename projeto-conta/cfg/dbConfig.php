<?php

include_once("Lib/constantes.php");

class Banco {

	public function abreConexao() {

		$pdo = NULL;

		try {
			$pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME."",DB_USER,DB_PASS);
		} catch (PDOException $e) {
			echo "Erro ao conectar: " . $e->getMessage();
		}

		return $pdo;
	}
}