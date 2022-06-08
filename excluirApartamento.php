<?php
if (!isset($_GET["id"])) {
	  header("Location: index.php");
	  die();
	}
	
	include_once ("classeApartamento.php");
	include ("conexao.php");

	session_start();
	$id = $_GET['id'];
	
	$conexao = abrirConexao();
	$sql2 = "select * from apartamento where id = '$id' ";
	$result = $conexao->query($sql2);
	$linha = $result->fetch(PDO::FETCH_ASSOC);
	$total = $result->rowCount();
				
	$extensao = $linha["extensao"];
					  
	$imagem = $id.$extensao;

	$arquivo = "fotos/$imagem";
	if (!unlink($arquivo))
	{
	echo ("Erro ao deletar $arquivo");
	}
	else{
	}
	
	$banco = mysqli_connect("localhost", "root", "", "corretora");
	if (!$banco) {
		die("Nao consegui conversar com o banco de dados.");
	}
	$sql2 = "delete from apartamento where id = '$id'";
	mysqli_query($banco, $sql2);
	
	mysqli_close($banco);
	
	$msg = "Excluido com sucesso!";
	$_SESSION["exclusao"] = $msg;
	header("Location: painelUsuario.php");
	


?>