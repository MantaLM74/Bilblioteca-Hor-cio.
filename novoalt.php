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
	$tamanho = mt_rand(5,61);
	$all_str = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
	$nomeimg = "";
	
	for($i=0;$i<=$tamanho;$i++){
		$nomeimg .= $all_str[mt_rand(0,61)];
	}
	
	$nome = $_POST['nome'];
	$nmtema =$_POST['tema'];
	$autor = $_POST['autor'];
	$sin = $_POST['sinopse'];
	$cod = $_POST['cod'];
	$editora=$_POST['editora'];
	$exemplares=$_POST['exemplares'];
	
	$sqllivro = mysqli_query($conn,"UPDATE livros SET nm_livro = '$nome',id_temas = '$nmtema',sin_livro = '$sin', edit_livro = '$editora' WHERE cod_livro= $cod");
		$n1 = mysqli_affected_rows($conn);
		

	$sqllivros = mysqli_query($conn, "SELECT * FROM  livros WHERE cod_livro=$cod ");
	$rslivro= mysqli_fetch_array($sqllivros);
	$id_autor=$rslivro['id_autor'];
	$id_livro=$rslivro['id_livro'];
		$n2 = mysqli_affected_rows($conn);
	$sqllivro = mysqli_query($conn,"UPDATE autor SET nm_autor = '$autor' WHERE id_autor= $id_autor");
		$n3 = mysqli_affected_rows($conn);
	$sqlex = mysqli_query($conn, "UPDATE exemplar SET qnt_exemplar = $exemplares WHERE id_livro=$id_livro");
	$n = mysqli_affected_rows($conn);
	

	
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
						if( $n==2 || $n1==1 || $n2==1 || $n3==1)
						{
								
					?>
							<div class="container">
			<h4>Alteração efetuada com sucesso</h4>
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
							echo $n1;
							echo $n2;
							echo $n3;
					?>
					<div class="cadast">
										
			<h4>Erro ao efetuar alteração</h4>
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