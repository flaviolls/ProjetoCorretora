<?php
$banco = mysqli_connect("localhost", "root", "", "corretora");
if (!$banco) {
  die("Nao consegui conversar com o banco de dados.");
}

$n = $_POST["nome"];
$e = $_POST["email"];
$s = $_POST["sexo"];

$sql = "insert into cliente(nome, email, sexo) values ('$n', '$e', '$s')";

mysqli_query($banco, $sql);
mysqli_close($banco);

$msg = "Cadastrado com sucesso!";
$_SESSION["cadastro"] = $msg;


header("Location: cadastroCliente.php");


?>