<?php
		session_start();
	require_once "includes/conexao.php";
 			if(isset ($_SESSION['admin']))
{
	require_once "includes/headmin.php";
}
else{
require_once  "includes/head.php"; 
}
	$cod = $_POST['cod'];
	
	$sqllivro = mysqli_query($conn, "SELECT * FROM livros WHERE cod_livro = $cod");
	$n = mysqli_affected_rows($conn);
		$rslivro = mysqli_fetch_array($sqllivro);
		
?>

<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<title>Titulo</title>
		<meta charset="UTF-8"/>
	<link type="text/css" href="css/style.css" rel="stylesheet"/>
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/flaticon.css"/>
	<link rel="stylesheet" href="css/slicknav.min.css"/>
	<link rel="stylesheet" href="css/jquery-ui.min.css"/>
	<link rel="stylesheet" href="css/owl.carousel.min.css"/>
	<link rel="stylesheet" href="css/animate.css"/>
	<link rel="stylesheet" href="css/styless.css"/>
	</head>
	<body>
	<?php if(isset ($_SESSION['admin']))
{
	require_once "includes/headmin.php";
}
else{
require_once  "includes/head.php"; 
}
?><div class="container">
			<h4>Alterar/Excluir Livros</h4>
			<div class="site-pagination">
				<a href="index.php">Home</a>
			</div>
		</div>
	</div>
				<div class="cadast">
						<form name="alg_liv" method="post" action="confcod2.php">
							<label for="cod">Codigo de barras </label>
							<input type="text" size="50" name="cod" id="cod"  value="<?php echo $rslivro['cod_livro']; ?>"></input><br/><br/>
							
							<label for="nome">Nome do livro </label>
							<input type="text" size="50" name="nome"  value="<?php echo $rslivro['nm_livro']; ?>"></input><br/><br/>

							<div class="imglivro">
							<img height="200px" width="150px" src="img/<?php echo $rslivro['img_livro'];?>">
							</div><br/><br/>
						   <a href="confexcl.php"><input type="button" value="Excluir"></a>
							<input type="submit" value="Alterar">
													
					</form>
	</div>
	<?php
				require_once "includes/foot.php";
			?>
	</body>
</html>

