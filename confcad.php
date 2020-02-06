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
			<h4>Alterar livros</h4>
			<div class="site-pagination">
				<a href="index.php">Home</a>
			</div>
		</div>
	</div>
				<div class="cadast">
						<form name="cad_liv" method="post" action="novoliv.php" enctype="multipart/form-data">
							<label for="nome"> Nome do livro: </label>
							<input type="text" name="nome" id="nome"></input><br><br>

							<label for="cod">Código de barras:</label>
							<input type="text" name="cod" id="cod"></input><br><br>
							
							<label for="autor">Autor do livro: </label>
							<input type="text" name="autor" id="autor"></input><br><br>
							
							<label for="editora">Editora do livro: </label>
							<input type="text" name="editora" id="editora"></input><br><br>
							
							<label for="tema">Tema: </label>
						<select name="tema">
							<option > Selecione </option>
							<?php 
							
			$sqltemas = mysqli_query($conn,"SELECT * FROM temas");
			while($rstemas = mysqli_fetch_array($sqltemas)){
				?>
			
				<option value="<?php echo $rstemas['id_temas']?>" > <?php echo $rstemas['nm_temas']; ?></option>
			<?php } ?>
							
								</select>
							<br/>
							<br/>
							<label for="sinopse">Sinopse:</label>
							<input type="text" name="sinopse" id="sinopse"></input><br><br>	
						<label for="capa">Capa: </label>
						<input type="file" name="capa" id="capa" /><br/>						
							<input type="submit" value="Cadastrar">			
					</form>
					</div>
				
					<?php
				require_once "includes/foot.php";
			?>
		</div>
	</body>
</html>















