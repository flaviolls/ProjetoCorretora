<?php

include_once ("classeApartamento.php");
include ("conexao.php");

session_start();

if (!isset($_SESSION["login"])) {
  header("Location: index.php");
  die();
}

$msg = null;

if (isset($_SESSION["cadastro"])) 
{
	$msg = $_SESSION["cadastro"];
	unset ($_SESSION["cadastro"]);
}


 ?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="css/estilo.css">
        <link href="//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDZgbyNtmd1S4Q50wmfaWnHSDuHGCAYPiQ&signed_in=true&callback=initMap"
        async defer></script>
        <title>Home</title>
    </head>
    <body>
        <div id="atras">
            <header>
                <img src="img/logo.png"/> 
                <nav id="menu2">
                    <a class="link" href=painelUsuario.php>Voltar</a></td>
					<div class="msg"><?php echo $msg; ?></div>
                </nav>
            </header>
        </div>
		
		<div id="atrasDetalhes23">	
					<div id="detalhes23">
						<form method="post" action="processaCadastro.php" enctype="multipart/form-data">
							<table class="edicao" >
								<thead>
									<tr>
										<th>Rua</th>
										<th>Bairro</th>
										<th>Cidade</th>
										<th>Quartos</th>
										<th>Suites</th>
									</tr>
								</thead>
								
								<tbody>
									<tr>
										<td><input class="caixa" type="text" name="rua"  required="true"/></td>
										<td><input class="caixa" type="text" name="bairro"  required="true"/></td>
										<td><input class="caixa" type="text" name="cidade"  required="true"/></td>
										<td><input class="caixa" type="text" name="quartos"  required="true"/></td>
										<td><input class="caixa" type="text" name="suite" required="true"/></td>
									</tr>

								  <thead>
									<tr>
										<th>Descrição</th>
										<th>Vagas na Garagem</th>
										<th>Área(m²)</th>
										<th>Valor</th>
									</tr>
								</thead>
									<tr>
										<td><input class="inputdescricao" type="text" name="descricao" required="true"/></td>
										<td><input class="caixa" type="text" name="vagas"  required="true"/></td>
										<td><input class="caixa" type="text" name="area"  required="true"/></td>
										<td><input class="caixa" type="text" name="valor"  required="true"/></td>
										<td><input class="botao4" type="submit" value="Cadastrar"></td>
									</tr>
								</tbody>
								<img id="imgDetalhes" width='297px' height='280px' src='img/curso.png'>
							</table>
							<div class="caixaImagem">
								<input class="file1" type="file" name="imagem" required="true"> <br>
							</div>
							
					</form>
					
    </body>
</html>