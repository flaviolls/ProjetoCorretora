<?php
	if (!isset($_POST["rua"])|| !isset($_POST["bairro"]) || !isset($_POST["quartos"]) || !isset($_POST["cidade"]) || !isset($_POST["suite"]) || !isset($_POST["area"]) 
		|| !isset($_POST["vagas"]) || !isset($_POST["descricao"]) || !isset($_POST["valor"])) {
	  header("Location: index.php");
	  die();
	}

	include_once ("conexao.php");
	include_once ("classeApartamento.php");
	session_start();

	$a = new Apartamento();
	$r = $_POST["rua"];
	$b = $_POST["bairro"];
	$q = $_POST["quartos"];
	$s = $_POST["suite"];
	$ar = $_POST["area"];
	$v = $_POST["vagas"];
	$d = $_POST["descricao"];
	$va = $_POST["valor"];
	$c = $_POST["cidade"];


	$banco = mysqli_connect("localhost", "root", "", "corretora");
	if (!$banco) {
	  die("Nao consegui conversar com o banco de dados.");
	}

	$sql = "insert into apartamento(rua, bairro, quartos, suite, area, vagas, descricao, valor, cidade) 
	values ('$r', '$b', '$q', '$s', '$ar', '$v', '$d', '$va', '$c')";
	mysqli_query($banco, $sql);
	$id = mysqli_insert_id($banco);

	$ext = strtolower(substr($_FILES['imagem']['name'],-4)); 
	$new_name = $id . $ext; 
	$dir = 'fotos/';
	 
	move_uploaded_file($_FILES['imagem']['tmp_name'], $dir.$new_name); 

	$sql2 = "update apartamento set extensao = '$ext' where id = $id";
	mysqli_query($banco, $sql2);
		  
	mysqli_close($banco);

	$msg = "Cadastrado com sucesso!";
	$_SESSION["cadastro"] = $msg;
	header("Location: cadastroApartamento.php");

?>
