<?php

include_once ("classeApartamento.php");
include ("conexao.php");

session_start();





 ?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="css/estilo.css">
        <link href="//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDZgbyNtmd1S4Q50wmfaWnHSDuHGCAYPiQ&signed_in=true&callback=initMap"
        async defer></script>
        <title>Detalhes</title>
    </head>
    <body>
        <div id="atras">
            <header>
                <img src="img/logo.png"/> 
                <nav id="menu2">
                    <a class="link" href=painelUsuario.php>Voltar</a></td>				
                </nav>
            </header>
        </div>
			
		<div id="atrasDetalhes2">	
		
            <div id="detalhes">
				<?php
				$id = $_GET['id'];
				
				$conexao = abrirConexao();
				$sql2 = "select * from apartamento where id = '$id' ";
				$result = $conexao->query($sql2);
				$linha = $result->fetch(PDO::FETCH_ASSOC);
				$total = $result->rowCount();
				
				$extensao = $linha["extensao"];
				$id = $linha["id"];
					  
				$imagem = $id.$extensao;
			?>
				<table>
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
							<td><?php echo $linha['rua']; ?></td>
							<td><?php echo $linha['bairro']; ?></td>
							<td><?php echo $linha['cidade']; ?></td>
							<td><?php echo $linha['quartos']; ?></td>
							<td><?php echo $linha['suite']; ?></td>
						</tr>

					  <thead>
						<tr>
							<th nowrap="true">Descrição</th>
							<th>Vagas na Garagem</th>
							<th>Área(m²)</th>
							<th>Valor</th>
							<th class="excluir" >
							<form method="post" action="excluirApartamento.php?id=<?php echo $linha['id']; ?>">
								<input   type="hidden" name="id" value="<?php echo $linha['id']; ?>"><br>
							<input class="botao2" type="submit" value="Excluir">
							</th>
						</tr>
					</thead>
						<tr>
							<td><div class="scroll"><?php echo $linha['descricao']; ?></div></td>
							<td><?php echo $linha['vagas']; ?></td>
							<td><?php echo $linha['area']; ?></td>
							<td>R$ <?php echo $linha['valor']; ?></td>
							<td><a class="link2" href=editarApartamento.php?id=<?php echo $linha['id']; ?>>Editar</a></td>
						</tr>
					</tbody>
					<img id="imgDetalhes" width='370px' height='290px' src='fotos/<?php echo $imagem ?>'>
					
				</table>

            </div>			
        </div>
		
		<div id="atrasmapa">
			<div id="mapa">
				<div id="map">	</div>
				
			
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
				  echo "Nenhum aartamento cadastrado.";
				}
			?>
				
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
						  alert('Endereço invalido: ' + status);
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








