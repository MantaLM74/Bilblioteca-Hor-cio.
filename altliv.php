<?php
session_start();
	
	require_once "includes/conexao.php";	?>
<html lang="pt-br">
	<head>
		<title>Cadastro de Livros</title>
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
		<header>
			<?php
if(isset ($_SESSION['admin']))
{
	require_once "includes/headmin.php";
}
else{
require_once  "includes/head.php"; 
}
				?>
				</header>
												<div class="page-top-info">
		<div class="container">
			<h4>Alterar/Excluir livros</h4>
			<div class="site-pagination">
				<a href="index.php">Home</a>
			</div>
		</div>
	</div>
	
				<div class="cadast">
						<form class="cad-form"  name="cad_liv" method="post" action="confalt.php" enctype="multipart/form-data">

							<h5>Código de barras:</h5><br>
							<input type="text" name="cod" id="cod"></input><br><br>
							<input type="submit"onclick="cadastrar()"  value="Confirmar código de barras"/>
				</div>
					<?php
				require_once "includes/foot.php";
			?>
		</div>
	</body>
</html>















