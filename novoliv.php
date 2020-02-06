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
	//$capa = $_POST['capa'];
	$sin = $_POST['sinopse'];
	$cod = $_POST['cod'];
	$editora=$_POST['editora'];
	
	$nome_temporario=$_FILES["capa"]["tmp_name"];
	$nome_real=$_FILES["capa"]["name"];
	$extensao_real = pathinfo($nome_real);
	$extensao_real = $extensao_real['extension'];
	$nome_final = $nomeimg . "." . $extensao_real;
	copy($nome_temporario,"img/$nome_final");

	$sqlautor = mysqli_query($conn,"SELECT * FROM autor WHERE  nm_autor = '$autor'");
	$a=mysqli_affected_rows($conn);
	
	if($a==0){
	$sqlautor = mysqli_query($conn,"INSERT INTO autor (nm_autor) VALUES ('$autor')");
	}
		$sqlautor = mysqli_query($conn,"SELECT * FROM autor WHERE  nm_autor = '$autor'");
		$rsautor=mysqli_fetch_array($sqlautor);
		$idautor = $rsautor['id_autor'];
	
	$sqllivros = mysqli_query($conn, "INSERT INTO livros (nm_livro,cod_livro,id_temas,id_autor,img_livro,sin_livro,disp_livro,edit_livro) VALUES('$nome',$cod,$nmtema,$idautor,'$nome_final','$sin',1,'$editora') ");
	$sqllivro = mysqli_query($conn, "SELECT id_livro FROM  livros WHERE cod_livro=$cod");
	$rslivro=mysqli_fetch_array($sqllivro);
	$id_livro=$rslivro['id_livro'];
	$sqlex = mysqli_query($conn, "INSERT INTO exemplar(id_livro,qnt_exemplar) VALUES($id_livro, 1) ");

	
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
				<div class="davi">
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
	</div>
							<label for="nome">Nome: </label>
							<?php echo $nome; ?>

							<br><br>
							<label for="email">Autor: </label>
							<?php echo $autor; ?>
					<?php
						}
						else
						{

					?>
											<div class="cadast>
			<h4>Erro ao efetuar cadastro</h4>
			<div class="site-pagination">
			<h2>  Erro ao efetuar cadastro</h2>
			<a href="javascript: history.go(-2);">Tente novamente! </a>
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















