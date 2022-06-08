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
                <nav id="menu2">
					<a class="link" href=cliente.php>Voltar</a></td>
                </nav>
            </header>
        </div>
		<div id="atras8">	
            <div id="cursos3">	
			
			<form  id="form" action="processaCadastrocliente.php" method="post">        
				<table class="clienteE" border=1>
					<tr>
						<th class="clienteT">Nome</th>
						<th class="clienteD"><input class="inputLogin2 type="text"  name="nome" required="true"/></th>
						<td class='clienteT'>Email</td>
						   <td colspan="4" class='clienteD'> <input class="inputLogin2 type="text" name="email"  required="true"/></td>
					</tr>
					<tr>
						<td class='clienteT'>Sexo</td>
						<td colspan="3" class='clienteD'>
							<select required="true" class="inputFiltrar2" name="sexo">
							    <option></option>
								<option>Masculino</option>
								<option>Feminino</option>
							</select>
						</td>
						<td class='clienteD'><input class="botao4" type="submit" value="Cadastrar"></td>
					</tr>
			</form>
					
				</table>
            </div>			
        </div>
    </body>
</html>