<?php

include_once ("classeApartamento.php");
include ("conexao.php");

session_start();

if (!isset($_SESSION["login"])) {
  header("Location: index.php");
  die();
}

$ex = null;

if (isset($_SESSION["exclusao"])) 
{
	$ex = $_SESSION["exclusao"];
	unset ($_SESSION["exclusao"]);
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
					<a  class="linkPainel2" href=cliente.php>Cliente</a>
					<a  class="linkPainel" href=painelusuario.php>Apartamento</a>
				</div>
                <nav id="menu2">
                    <a class="link" href=cadastroApartamento.php>Cadastrar Novo</a></td>
					<a class="link" href=sair.php>Sair</a></td>
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
				<p><?php echo $ex; ?></p>
				
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
							<td><a class='link3' href=detalhes.php?id=$id>Detalhes</a></td>
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
						$sql2 = "select * from apartamento";	
						unset($_POST['filtro']);
					} 
					else {
						$sql2 = "select * from apartamento where cidade='$cid' ";
						unset($_POST['filtro']);
					}	
				} 
				else {
					$sql2 = "select * from apartamento";
				}
				
				$result = $conexao->query($sql2);
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
				  echo "Nenhum Apartamento cadastrado.";
				}
			?>
            </div>			
        </div>
		
		<div id="atrasmapa">
			<div id="mapa">
				<div id="map">	</div>
					<script>

					  function showStuff(id) {

					  if(document.getElementById(id).style.display == 'block'){
						document.getElementById(id).style.display = 'none';
					  }else{
						document.getElementById(id).style.display = 'block';
					  }

					}

					var geocoder = new google.maps.Geocoder();


					function initMap() {
					  var map = new google.maps.Map(document.getElementById('map'), {
						zoom: 10,
						center: {lat: -8.0548373, lng: -34.8971576}
					  });


					for (var i = 0; i < end.length; i++) {
					  geocodeAddress(geocoder, map, end[i]);
					}

					}
					
					

					function geocodeAddress(geocoder, resultsMap, address) {

					  var geocoder = new google.maps.Geocoder();
					  geocoder.geocode({'address': address}, function(results, status) {
						if (status === google.maps.GeocoderStatus.OK) {
						  var marker = new google.maps.Marker({
							map: resultsMap,
							position: results[0].geometry.location,
							title: address
						  });
						} else {
						  alert('Geocode was not successful for the following reason: ' + status);
						}
					  });

					}

					</script>
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