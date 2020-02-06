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

	$sqllivro = mysqli_query($conn, "SELECT * FROM  livros WHERE cod_livro= $cod");
		$rslivro = mysqli_fetch_array($sqllivro);

	
	$idlivro=$rslivro['id_livro'];
	
	$sqlex = mysqli_query($conn, "UPDATE exemplar SET qnt_exemplar = qnt_exemplar+1 WHERE id_livro = $idlivro  ");
	
	
	$n = mysqli_affected_rows($conn);
?>

<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<title>Titulo</title>
		<meta charset="UTF-8"/>
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
	<?phpif(isset ($_SESSION['admin']))
{
	require_once "includes/headmin.php";
}
else{
require_once  "includes/head.php"; 
}
?>
				<div class="cadast">
					<?php
						if($n ==1)
						{
					?>
							<div class="container">
			<h4>Cadastro efetuado com sucesso</h4>
			<div class="site-pagination">
				<a href="index.php">Home</a>
			</div>
		</div>

					<?php
						}
						else
						{
					?>
											<div class="container">
			<h4>Erro ao efetuar cadastro</h4>
			<div class="site-pagination">
			<a href="javascript: history.go(-2);">Tente novamente! </a>
			</div>
		</div>

							
					<?php
						}
					?>
			</div>
			<?php	
				require_once "includes/foot.php";			
			?>
	</body>
</html>















