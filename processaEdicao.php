<?php
function get_post_action($name)
{
    $params = func_get_args();

    foreach ($params as $name) {
        if (isset($_POST[$name])) {
            return $name;
        }
    }
}

include_once ("classeApartamento.php");
include ("conexao.php");

session_start();

switch (get_post_action('editAtributos', 'editImagem')) {
	
    case 'editAtributos':
		echo "atributos";
		$i = $_POST["id"];
		$r = $_POST["rua"];
		$b = $_POST["bairro"];
		$q = $_POST["quartos"];
		$s = $_POST["suite"];
		$va = $_POST["valor"];
		$ar = $_POST["area"];
		$v = $_POST["vagas"];
		$d = $_POST["descricao"];
		$c = $_POST["cidade"];
		
		$banco = mysqli_connect("localhost", "root", "", "corretora");
		if (!$banco) {
		  die("Nao consegui conversar com o banco de dados.");
		}
		$sql = "update apartamento set rua = '$r', bairro ='$b', quartos ='$q', suite ='$s', valor ='$va', 
		area ='$ar', vagas ='$v', descricao ='$d', cidade ='$c'
		where id = $i";
		
		mysqli_query($banco, $sql);

		mysqli_close($banco);
		
		header("Location: detalhes.php?id=$i");
        break;

    case 'editImagem':
	
	
		if($_FILES["imagem"]['name'] != ''){
			
			$i = $_POST["id"];
		
			$conexao = abrirConexao();
			$sql2 = "select * from apartamento where id = '$i' ";
			$result = $conexao->query($sql2);
			$linha = $result->fetch(PDO::FETCH_ASSOC);
			$total = $result->rowCount();
						
			$extensao = $linha["extensao"];
							  
			$imagem = $i.$extensao;

			$arquivo = "fotos/$imagem";
			if (!unlink($arquivo))
			{
			echo ("Erro ao deletar $arquivo");
			}
			else{
			}
			
			$ext = strtolower(substr($_FILES['imagem']['name'],-4)); 
			$new_name = $i . $ext; 
			$dir = 'fotos/';
			 
			move_uploaded_file($_FILES['imagem']['tmp_name'], $dir.$new_name); 
			
			$banco = mysqli_connect("localhost", "root", "", "corretora");
			if (!$banco) {
			  die("Nao consegui conversar com o banco de dados.");
			}

			$sql2 = "update apartamento set extensao = '$ext' where id = $i";
			mysqli_query($banco, $sql2);
				  
			mysqli_close($banco);

			header("Location: detalhes.php?id=$i");
			break;
			
		}
		else
		{
			$i = $_POST["id"];
			$a = "Selecione uma imagem";
			$_SESSION["sImagem"] = $a;
			header("Location: editarApartamento.php?id=$i");
			break;
		}
			

	
}





?>