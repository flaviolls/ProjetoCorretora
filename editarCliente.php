<?php

include_once ("classeApartamento.php");
include ("conexao.php");

session_start();

if (!isset($_SESSION["login"])) {
  header("Location: index.php");
  die();
}

$i = $_GET["id"];
$banco = mysqli_connect("localhost", "root", "", "corretora");
if (!$banco) {
  die("Nao consegui conversar com o banco de dados.");
}

$sql = "select nome, email, sexo from cliente where id = $i";
$consulta = mysqli_query($banco, $sql);
$linha = mysqli_fetch_array($consulta);
if (!$linha) {
  header("Location: index.php");
  die();
}
$n = $linha["nome"];
$em = $linha["email"];
$s = $linha["sexo"];

if($s == "Masculino") {
	$opcao1 = "Masculino";
	$opcao2 = "Feminino";
}else {
	$opcao1 = "Feminino";
	$opcao2 = "Masculino";
}
mysqli_close($banco);


 ?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="css/estilo.css">
        <link href="//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDZgbyNtmd1S4Q50wmfaWnHSDuHGCAYPiQ&signed_in=true&callback=initMap"
        async defer></script>
        <title>Painel Usuario</title>
    </head>
    <body>
        <div id="atras">
            <header>
                <img src="img/logo.png"/> 
                <nav id="menu2">
					<a class="link" href=cliente.php>Voltar</a></td>
                </nav>
            </header>
        </div>
		<div id="atras8">	
            <div id="cursos3">	
			
			<form  id="form" action="processaEdicaocliente.php" method="post">        
				<table class="clienteE" border=1>
					<tr>
						<th class="clienteT">Nome</th>
						<th class="clienteD"><input class="inputLogin2 type="text" value="<?php echo $n; ?>" name="nome" required="true"/></th>
						<td class='clienteT'>Email</td>
						   <td colspan="4" class='clienteD'> <input class="inputLogin2 type="text" value="<?php echo $em; ?>" name="email"  required="true"/></td>
					</tr>
					<tr>
						<td class='clienteT'>Sexo</td>
						<td colspan="3" class='clienteD'>
							<select required="true" class="inputFiltrar2" name="sexo">
								<option><?php echo $opcao1; ?></option>
								<option><?php echo $opcao2; ?></option>
							</select>
							<input type="hidden" value="<?php echo $i; ?>" name="id">
						</td>
						<td class='clienteD'><input class="botao4" type="submit" value="Editar"></td>
					</tr>
			</form>
					
				</table>
            </div>			
        </div>
    </body>
</html>