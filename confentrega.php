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
	$rm = $_POST['rm'];
	
	$sqllivro = mysqli_query($conn, "SELECT * FROM livros WHERE cod_livro = $cod AND disp_livro = 0");
	
	$rslivro = mysqli_fetch_array($sqllivro);
	
	$sqlaluno = mysqli_query($conn, "SELECT * FROM aluno WHERE rm = $rm");
	
	$rsaluno = mysqli_fetch_array($sqlaluno);
	
	$idaluno=$rsaluno['id_aluno'];
	$id_livro=$rslivro['id_livro'];
	
	$sqlaluguel = mysqli_query($conn,"SELECT * FROM aluguel WHERE id_aluno = $idaluno AND id_livro = $id_livro AND entregue = 0");
	
	$rsaluguel = mysqli_fetch_array($sqlaluguel);
	$n = mysqli_affected_rows($conn);
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
	<?phpif(isset ($_SESSION['admin']))
{
	require_once "includes/headmin.php";
}
else{
require_once  "includes/head.php"; 
}
?><div class="container">
			<h4>Devolução</h4>
			<div class="site-pagination">
				<a href="index.php">Home</a>
			</div>
		</div>
	</div>
				<div class="cadast">
					<?php
						if($n==1)
						{							
					?>
						<form name="alg_liv" method="post" action="novoentrega.php">
							<label for="cod">Codigo de barras </label>
							<input type="text" size="50" name="cod" id="cod"  value="<?php echo $rslivro['cod_livro']; ?>"></input><br/><br/>
							
							<label for="nome">Nome do livro </label>
							<input type="text" size="50" name="nome"  value="<?php echo $rslivro['nm_livro']; ?>"></input><br/><br/>

							<label for="autor">Autor: </label>
							<?php echo $rslivro['autor']; ?><br/><br/>
							<div class="imglivro">
							<img height="200px" width="150px" src="img/<?php echo $rslivro['img_livro'];?>">
							</div><br/><br/>
							
							<label for="nm_aluno">Nome do Aluno: </label>
							<input type="text" size="50" name="nm_aluno"  value="<?php echo $rsaluno['nm_aluno']; ?>"></input><br/><br/>
							
							<label for="rm">RM: </label>
							<input type="text" size="50" name="rm"  value="<?php echo $rsaluno['rm']; ?>"></input><br/><br/>
								
							<label for="sala">Sala do Aluno: </label>
							<input type="text" size="50" name="sala"  value="<?php echo $rsaluno['sala']; ?>"></input><br/><br/>
							<br/>
							<label for="dt_alg">Data do aluguel: </label>
							<input type="text" size="50" name="dt_alg" value="<?php echo $rsaluguel['dt_alu']; ?>"></input><br/><br/>
							
							<label for="dt_ent">Data de Entrega: </label>
							<input type="text" size="50" name="dt_ent"  value="<?php	echo $rsaluguel['dt_ent']?>"></input><br/><br/>
							
						    <input type="button" href="novoadia.php" value="Quero adiar minha entrega">
							<input type="submit" value="Devolver">
													
					</form>

					<?php
					}
						else
						{
						
					?>
							<h2>Informações incorretas</h2>
							<a href="javascript: history.go(-1);">Tente novamente! </a>
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















