<?php 
$banco = mysqli_connect("localhost", "root", "", "corretora");
if (!$banco) {
  die("Nao consegui conversar com o banco de dados.");
}
$i = $_POST["id"];
$n = $_POST["nome"];
$em = $_POST["email"];
$s = $_POST["sexo"];

$sql = "update cliente set nome = '$n', email ='$em', sexo ='$s' where id = $i";

mysqli_query($banco, $sql);

mysqli_close($banco);
header("Location: editarCliente.php?id=$i");

?>