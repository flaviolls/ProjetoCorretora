<?php

if (!isset($_POST["usuario"])|| !isset($_POST["senha"])) {
  header("Location: home.php");
  die();
}

include_once ("conexao.php");
include_once ("classeUsuario.php");
session_start();



$conexao = abrirConexao();


$u = $_POST["usuario"];
$s = $_POST["senha"];

$user = new Usuario();
$user->setUsuario($u);
$user->setSenha($s);

$sql = "SELECT * FROM usuario WHERE usuario = '$u' and senha = '$s'";
$result = $conexao->query($sql);
$num = $result->rowCount();


if ($num ==0){
	$msg = "Usuário ou senha inválidos!";
	$_SESSION["erro"] = $msg;
	header("Location: index.php");
}
else{
	$_SESSION["login"] = $user;
	header("Location: painelUsuario.php");
}

?>
