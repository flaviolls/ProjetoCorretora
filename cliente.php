<?php

include_once ("classeApartamento.php");
include ("conexao.php");

session_start();

if (!isset($_SESSION["login"])) {
  header("Location: index.php");
  die();
}


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
				<div id="menuPainel">
					<a  class="linkPainel21" href=cliente.php>Cliente</a>
					<a  class="linkPainel1" href=painelusuario.php>Apartamento</a>
				</div>
                <nav id="menu2">
                    <a class="link" href=cadastroCliente.php>Cadastrar Novo</a></td>
					<a class="link" href=sair.php>Sair</a></td>
                </nav>
            </header>
        </div>
		<div id="atras8">	
            <div id="cursos3">
			
				<table class="clienteE" border=1>
					
						<tr>
							<th class="clienteT" >Nome</th>
							<th class="clienteT">Email</th>
							<th class="clienteT" >Sexo</th>
							<th class="clienteT"></th>
							<th class="clienteT"></th>
						</tr>
					
					
					<?php
					$banco = mysqli_connect("localhost", "root", "", "corretora");
					if (!$banco) {
					  die("Nao consegui conversar com o banco de dados.");
					}

					$sql = "select id, nome, email, sexo from cliente order by nome";
					$consulta = mysqli_query($banco, $sql);

					$linhaslidas = 0;

					while ($linha = mysqli_fetch_array($consulta)) {
					  $linhaslidas++;
					  
					  $i = $linha["id"];
					  $nome = $linha["nome"];
					  $email = $linha["email"];
					  $sexo = $linha["sexo"];
					  echo "
					  <tr>
						<td class='clienteD'>$nome</td>
						<td class='clienteD'>$email</td>
						<td class='clienteD'>$sexo</td>
						<td class='clienteD'><a class='link' href=apagarCliente.php?id=$i>Apagar</a></td>
						<td class='clienteD'><a class='link' href=editarCliente.php?id=$i>Editar</a></td>
					  </tr>";
					}
					mysqli_close($banco);
					if ($linhaslidas == 0) {
					  echo "<tr><td>Tabela vazia</td></tr>\n";
					}
					?>
					
				</table>
            </div>			
        </div>
    </body>
</html>