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
	$id1 = $_GET['id_livro'];
	$id = $_SESSION['id'];
	$sqllivro = mysqli_query($conn, "SELECT * FROM livros WHERE id_livro = $id1");
	$sqlaluno = mysqli_query($conn, "SELECT * FROM aluno WHERE id_aluno = $id");
	$n = mysqli_affected_rows($conn);
		$rsaluno = mysqli_fetch_array($sqlaluno);
		$rslivro = mysqli_fetch_array($sqllivro);
		
		date_default_timezone_set('America/Sao_Paulo');
		$date= date('d/m/Y');
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
			<h4>Aluguel</h4>
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
						<form class="cad-form" name="alg_liv" method="post" action="novoreserva.php">
							<label for="cod">Codigo de barras </label>
							<input readonly="true" type="text" size="50" name="cod" id="cod"  value="<?php echo $rslivro['cod_livro']; ?>"></input><br/><br/>
							
						
							<label for="nome">Nome do livro </label>
							<input readonly="true" type="text" size="50" name="nome"  value="<?php echo $rslivro['nm_livro']; ?>"></input><br/><br/>

							<div class="livreserv">
							<img height="200px" width="150px" src="img/<?php echo $rslivro['img_livro'];?>">
							</div><br/><br/>
							
							<label for="nm_aluno">Nome do Aluno: </label>
							<input readonly="true" type="text" size="50" name="nm_aluno"  value="<?php echo $rsaluno['nm_aluno']; ?>"></input><br/><br/>
							
							<label for="rm">RM: </label>
							<input readonly="true" type="text" size="50" name="rm"  value="<?php echo $rsaluno['rm']; ?>"></input><br/><br/>
								
							<label for="sala">Sala do Aluno: </label>
							<input  readonly="true" type="text" size="50" name="sala"  value="<?php echo $rsaluno['sala']; ?>"></input><br/><br/>
							<br/>
							<label for="dt_alg">Data do aluguel: </label>
							<input readonly="true" type="text" size="50" name="dt_alg" value="<?php echo $date; ?>"></input><br/><br/>
							
							<label for="dt_ent">Data de Entrega: </label>
							<input  readonly="true" type="text" size="50" name="dt_ent"  value="<?php	echo date('d/m/Y', strtotime('+7 days'))?>"></input><br/><br/>
							<input type="submit" value="Alugar">
							
							<a href="javascript: history.go(-1);"> <input type="button" href="reserva.php" value="Não quero alugar esse livro"></a>
							
													
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















