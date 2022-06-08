<?php
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);

function abrirConexao() {
	return new PDO("mysql:dbname=corretora;host=localhost", "root", "");
}

function  fecharConexao() {
	mysql_close();
}

?>