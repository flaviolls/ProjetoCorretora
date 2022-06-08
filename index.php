<?php
include_once ("classeApartamento.php");
include ("conexao.php");

session_start();

$er = null;

if (isset($_SESSION["erro"])) 
{
	$er = $_SESSION["erro"];
	unset ($_SESSION["erro"]);
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
                <nav id="menu">
                    <form  id="form" action="processaLogin.php" method="post">
						<input class="inputLogin" type="text"  name="usuario" placeholder="Usuario" required="true"/>
                        <input class="inputLogin" type="password" name="senha" placeholder="Senha" required="true"/>
                        <input class="botao" type="submit" value="Entrar">
                    </form>
					<div class="msg"><?php echo $er; ?></div>
					
                </nav>
            </header>
        </div>
       
	   <div id="atras3">	
            <div id="cursos">
			
				<form name="formfiltro" method="POST" action="">
					<select class="inputFiltrar" name="filtro" >
						<option>Todos</option>
						<?php
							$banco = mysqli_connect("localhost", "root", "", "corretora");
							if (!$banco)
								die("Erro ao acessar o BD!");
							
							$filtro = "SELECT DISTINCT cidade FROM Apartamento";
							$seleciona = mysqli_query($banco, $filtro);
							if (!$seleciona)
							  die("Erro ao fazer consulta!");
							while ($linha = mysqli_fetch_array($seleciona)) {
							  $cidade = $linha["cidade"];
							  echo "<option>$cidade</option>";
							}
						?>
					</select>
					<input class="botao" type="submit"  value="Filtrar">
				</form>
				
				<?php
					$banco = mysqli_connect("localhost", "root", "", "corretora");
					if (!$banco)
					  die("Erro ao acessar o BD!");
				  
					if(isset($_POST['filtro'])) {
						$cid = $_POST['filtro'];
						if ($cid == "Todos") {
							$sql = "select * from apartamento";
						} else {
							$sql = "select * from apartamento where cidade='$cid' ";
						}
						
					} else {
						 $sql = "select * from apartamento";
					}
					
					$consulta = mysqli_query($banco, $sql);
					if (!$consulta)
					  die("Erro ao fazer consulta!");
					while ($linha = mysqli_fetch_array($consulta)) {
					  $id = $linha["id"];
					  $rua = $linha["rua"];
					  $bairro = $linha["bairro"];
					  $valor = $linha["valor"];
					  $descricao = $linha["descricao"];
					  $extensao = $linha["extensao"];
					  $cidade = $linha["cidade"];
					  
					  $imagem = $id.$extensao;
					  
					  echo "<section class='curso margem sombra'> 
							<img width='370px' height='260px' src='fotos/$imagem'>
							<p>
								$rua, $bairro, $cidade						
							</p>
							<div class='valor'>R$ $valor</div>
							<td><a class='link3' href=detalhesCliente.php?id=$id>Detalhes</a></td>
							</section>
					       ";
					}
					mysqli_close($banco);
				?>   

			<?php
				$conexao = abrirConexao();
				
				if(isset($_POST['filtro'])) {
					$cid = $_POST['filtro'];
					if ($cid == "Todos") {
						$sql = "select * from apartamento";	
					} 
					else {
						$sql = "select * from apartamento where cidade='$cid' ";
					}	
				} 
				else {
					$sql = "select * from apartamento";
				}
				
				$result = $conexao->query($sql);
				$linha = $result->fetch(PDO::FETCH_ASSOC);
				$total = $result->rowCount();
			?>
			<script>
			var end = [];
			</script>
			<?php
			if($total > 0) {
				do {
					$rua = $linha['rua'];
				    $bairro = $linha['bairro'];
				    $endereco2 = $linha['rua'].', '.$linha['bairro'];
			?>
				  <script>
				  end.push('<?=$endereco2?>');
				  </script>
			<?php

				  }while($linha = $result->fetch(PDO::FETCH_ASSOC));
				}else{
				  echo "Nenhum apartamento cadastrado.";
				}
			?>
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
