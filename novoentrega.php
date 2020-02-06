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
	
	$id_livro=$rslivro['id_livro'];
	
	$sqlaluno = mysqli_query($conn, "SELECT * FROM aluno WHERE rm = $rm");
	
	$rsaluno = mysqli_fetch_array($sqlaluno);
	
	$idaluno=$rsaluno['id_aluno'];
	

	$sqlaluguel = mysqli_query($conn,"SELECT * FROM aluguel WHERE id_aluno = $idaluno AND id_livro = $id_livro AND entregue = 0");
	$n=mysqli_affected_rows($conn);
	$rsaluguel=mysqli_fetch_array($sqlaluguel);
	$idaluguel = $rsaluguel['id_alug'];
	
	$sqlaluguel=mysqli_query($conn,"UPDATE aluguel SET entregue = 1 WHERE id_alug = $idaluguel");
	$sqllivrodisp=mysqli_query($conn,"UPDATE livros SET disp_livro = 1 WHERE id_livro = $cod");
	
	
	echo $n;
	
	
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
?>
				<div class="davi">
					<?php
						if($n>0){
		
						
					?>
						<h2>Devolução efetuado com sucesso</h2>
					<?php
						}
						else
						{
					?>
							<h4>Erro ao fazer a devolução!</h4>
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















