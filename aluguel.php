<?php
session_start();
	
	require_once "includes/conexao.php";	?>
<html lang="pt-br">
	<head>
		<title>Aluguel de Livros</title>
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
				<script>
</script>
<div class="container">
			<h4>Aluguel</h4>
			<div class="site-pagination">
				<a href="index.php">Home</a>
			</div>
		</div>
	</div>
				<div class="cadast">
					<h5>Preencha para alugar livros</h5><br>
						<form class="cad-form" name="alg_liv" method="post" action="confalg.php">
						
						<input placeholder="Código de Barras" type="text" name="cod" id="cod"></input><br><br>
						<input placeholder="RM do Aluno" type="text" name="rm" id="rm"></input><br><br>
													
							<input  type="submit"  value="Verificar Aluguel">			
					</form>
					</div>
				
					<footer>
					<?php
				require_once "includes/foot.php";
			?>
			</footer>
		</div>
	</body>
</html>















