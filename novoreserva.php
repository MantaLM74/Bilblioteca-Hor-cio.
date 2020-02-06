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

	$nome = $_POST['nome'];
	$aluno = $_POST['nm_aluno'];
	$rm = $_POST['rm'];
	$cod = $_POST['cod'];
	$sala = $_POST['sala'];
	$dt_alu= date ('Y-m-d');
	$dt_ent=date('Y/m/d', strtotime('+7 days'));
	
		$sqlaluno = mysqli_query($conn, "SELECT * FROM aluno WHERE rm = '$rm'");
		$sqllivro = mysqli_query($conn, "SELECT * FROM livros WHERE cod_livro = '$cod'");
		
		$n = mysqli_affected_rows($conn);	
	
		$rsaluno = mysqli_fetch_array($sqlaluno);
		$rslivro = mysqli_fetch_array($sqllivro);
		$id_livro=$rslivro['id_livro'];
		$id_aluno=$rsaluno['id_aluno'];
		
	$sqlalug = mysqli_query($conn,"INSERT INTO aluguel (id_livro,id_aluno,id_admin,dt_alu,dt_ent, entregue,reserv_alu) VALUES ('$id_livro', '$id_aluno',1, '$dt_alu', '$dt_ent', 0,1)");
	
	
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
						if($n==1)
						{
					?>
						<h2>Aluguel efetuado com sucesso</h2>
					<?php
						}
						else
						{
					?>
							<h4>Erro ao fazer o aluguel!</h4>
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















