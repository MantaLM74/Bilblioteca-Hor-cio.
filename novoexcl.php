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

	$cod=$_POST['cod'];
	$sqlex=mysqli_query($conn,"SELECT*FROM livros WHERE cod_livro=$cod");
							$rsex=mysqli_fetch_array($sqlex);
							$id_livro=$rsex['id_livro'];
								$sqlex = mysqli_query($conn, "DELETE FROM exemplar  WHERE id_livro=$id_livro");
	$sqllivros= mysqli_query($conn,"DELETE FROM livros WHERE cod_livro = $cod");
	$n=mysqli_affected_rows($conn);
	
	?>
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
				<div class="davi">
					<?php
						if($n ==1)
						{
							
					?>
							<div class="container">
			<h4>Livro excluido com sucesso</h4>
			<div class="site-pagination">
				<a href="index.php">Home</a>
			</div>
		</div>
	</div>
				<div class="cadast">
				</div>
				<?php
						}
						else
						{
						echo $n;
					?>
											<div class="container">
			<h4>Erro ao excluir</h4>
			<div class="site-pagination">
			<a href="javascript: history.go(-3);">Tente novamente! </a>
			</div>
		</div>
	</div>
							
					<?php
						}
					?>
			</div>
			<?php	
				require_once "includes/foot.php";			
			?>
		</div>
	</body>
</html>