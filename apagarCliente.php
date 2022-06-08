<?php

$banco = mysqli_connect("localhost", "root", "", "corretora");
if (!$banco) {
  die("Nao consegui conversar com o banco de dados.");
}

$i = $_GET["id"];
echo $i;

$sql = "delete from cliente where id = $i";
mysqli_query($banco, $sql);

mysqli_close($banco);
header("Location: cliente.php");

?>