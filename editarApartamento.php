<?php
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
$id = $linha["id"];
							  
$imagem = $id.$extensao;


$imsg = null;

if (isset($_SESSION["sImagem"])) 
{
	$imsg = $_SESSION["sImagem"];
	unset ($_SESSION["sImagem"]);
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
					<a class="link" href=detalhes.php?id=<?php echo $linha['id']; ?>>Voltar</a></td>
                </nav>
            </header>
        </div>

				<div id="atrasDetalhes">	
					<div id="detalhes">
						<form method="post" action="processaEdicao.php" enctype="multipart/form-data">
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
										<td><input class="caixa" type="text"  name="rua" value="<?php echo $linha['rua']; ?>" required="true"/></td>
										<td><input class="caixa" type="text"  name="bairro" value="<?php echo $linha['bairro']; ?>" required="true"/></td>
										<td><input class="caixa" type="text"  name="cidade" value="<?php echo $linha['cidade']; ?>" required="true"/></td>
										<td><input class="caixa" type="text"  name="quartos" value="<?php echo $linha['quartos']; ?>" required="true"/></td>
										<td><input class="caixa" type="text"  name="suite" value="<?php echo $linha['suite']; ?>" required="true"/></td>
										
									</tr>

								  <thead>
									<tr>
										<th>Descrição</th>
										<th>Vagas na Garagem</th>
										<th>Área(m²)</th>
										<th>Valor</th>
										<td><input class="caixa" type="hidden"  name="id" value="<?php echo $linha['id']; ?>" required="true"/></td>
									</tr>
								</thead>
									<tr>
										<td><input class="inputdescricao" type="text" name="descricao" value="<?php echo $linha['descricao']; ?>" required="true"/></td>
										<td><input class="caixa" type="text"  name="vagas" value="<?php echo $linha['vagas']; ?>" required="true"/></td>
										<td><input class="caixa" type="text"  name="area" value="<?php echo $linha['area']; ?>" required="true"/></td>
										<td><input class="caixa" type="text"  name="valor" value="<?php echo $linha['valor']; ?>" required="true"/></td>
										
										<td><input class="botao" type="submit" name="editAtributos" value="Editar"></td>
									</tr>
								</tbody>
								<img id="imgDetalhes" width='297px' height='280px' src='fotos/<?php echo $imagem ?>'>
							</table>
							<div class="caixaImagem">
								<input class="file1" type="file" name="imagem" <br>
								<input class="botao3"type="submit" name="editImagem" value="Alterar Imagem"><div class="msg2"><p><?php echo $imsg; ?><p/></div>
							</div>

					</form>
            </div>			
        </div>
		
        <div id="icones">
            <div class="novidades tudo">
                <h1 class="caracter"><i class="icon-fixed-width icon-money"></i></h1><br>
                <h1 class="serviço">Financiamento</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
            <div class="novidades tudo">
                <h1 class="caracter"><i class="icon-fixed-width icon-user"></i></h1><br>
                <h1 class="serviço">Consórcio</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
            <div class="novidades tudo">
                <h1 class="caracter"><i class="icon-fixed-width icon-calendar"></i></h1><br>
                <h1 class="serviço">Apartamento na Planta</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
            <div class="novidades tudo">
                <h1 class="caracter"><i class="icon-fixed-width icon-home"></i></h1><br>
                <h1 class="serviço">Lançamentos</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
        </div>

        <footer>
            <div id="atras2">
                <div class="paragrafo">
                    <p>
                        <Strong>Duvidas</Strong><br><br>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat soluta repudiandae provident labore
                    </p><br>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat soluta repudiandae provident labore.</p><br>
                    <p>Repellendus veniam asperiores, dolorum eius ad est obcaecati, voluptas velit ea cupiditate maxime hic aliquam vero?</p><br>
                </div>
                <div class="paragrafo">
                    <p>
                        <Strong>Unidade</Strong><br><br>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat soluta repudiandae provident labore
                    </p><br>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat soluta repudiandae provident labore</p><br>
                    <p>Repellendus veniam asperiores, dolorum eius ad est obcaecati, voluptas velit ea cupiditate maxime hic aliquam vero?</p><br>
                </div>
                <div class="paragrafo">
                    <p>
                        <Strong>Duvidas</Strong><br><br>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat soluta repudiandae provident labore
                    </p><br>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat soluta repudiandae provident labore</p><br>
                    <p>Repellendus veniam asperiores, dolorum eius ad est obcaecati, voluptas velit ea cupiditate maxime hic aliquam vero?</p><br>
                </div>
                <div id="social">
                    <ul>
                        <li id="facebook"><a href="#"><i class="icon-fixed-width icon-facebook"></i></a></li>
                        <li id="twitter"><a href="#"><i class="icon-fixed-width icon-twitter"></i></a></li>  
                        <li id="linkedin"><a href="#"><i class="icon-fixed-width icon-linkedin"></i></a></li>
                        <li id="pinterest"><a href="#"><i class="icon-fixed-width icon-pinterest"></i></a></li>
                    </ul>
                </div>
            </div>
        </footer>
		
    </body>
</html>