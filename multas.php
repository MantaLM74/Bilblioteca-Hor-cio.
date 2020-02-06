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


?>
<head>
	<link type="text/css" href="css/style.css" rel="stylesheet"/>
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/flaticon.css"/>
	<link rel="stylesheet" href="css/slicknav.min.css"/>
	<link rel="stylesheet" href="css/jquery-ui.min.css"/>
	<link rel="stylesheet" href="css/owl.carousel.min.css"/>
	<link rel="stylesheet" href="css/animate.css"/>
	<link rel="stylesheet" href="css/styless.css"/>
<title> Athenas </title>
</head>
<body>
<?php if(isset ($_SESSION['admin']))
{
	require_once "includes/headmin.php";
}
else{
require_once  "includes/head.php"; 
}
	$sqllivros = mysqli_query($conn, "SELECT * FROM livros ORDER BY RAND()");
	$n = mysqli_num_rows($sqllivros);
	$x=1;
	?>
	
	<div class="page-top-info">
		<div class="container">
			<h4>Multas</h4>
		</div>
	</div>
	<section class="top-letest-product-section">
		<div class="container">
			<div class="section-title">
				<h2>Expira hoje</h2>
			</div>
			<div class="product-slider owl-carousel">					
<?php	
	$x=0;
	date_default_timezone_set('America/Sao_Paulo');
		$date= date('y-m-d');
	$sqlaluguel = mysqli_query($conn, "SELECT * FROM aluguel WHERE entregue = 0 AND dt_ent = CURRENT_DATE");
	while($x<=10){	
	$rsaluguel = mysqli_fetch_array($sqlaluguel);
		$idlivro = $rsaluguel['id_livro'];
		$idaluno = $rsaluguel['id_aluno'];
		$sqllivros = mysqli_query($conn, "SELECT * FROM livros WHERE id_livro='$idlivro'");
		$sqlaluno = mysqli_query($conn, "SELECT * FROM aluno WHERE id_aluno='$idaluno'");
		$txtsql=mysqli_fetch_array($sqllivros);
		$rsaluno=mysqli_fetch_array($sqlaluno);
	?><div class="product-item">	
	<div class="pi-pic">
	<img height="400px"src="img/<?php echo $txtsql['img_livro'];?>">
	<div class="pi-links">
	<a href="pagamulta.php?id_alug=<?php echo $rsaluguel['id_alug']?>" class="add-card"><i src="img/menu.png">+</i><span>Abrir Multa</span></a>
	<!--<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>-->
	</div>

	</div>
	<?php echo $rsaluno['sala']?>
		<div class="pi-text"><?php echo limitar($rsaluno['nm_aluno'],17	);?></div>
			

	</div>
<?php	$x++;
	}
	
?>
</div>
</div>
</section>
	
	
	<section class="top-letest-product-section">
		<div class="container">
			<div class="section-title">
				<h2>Entregas Proximas</h2>
			</div>
			<div class="product-slider owl-carousel">					
<?php	
	$x=0;
	$sqlaluguel = mysqli_query($conn, "SELECT * FROM aluguel WHERE entregue = 0 ORDER BY dt_ent ASC");
	while($x<=10){	
	$rsaluguel = mysqli_fetch_array($sqlaluguel);
		$idlivro = $rsaluguel['id_livro'];
		$idaluno = $rsaluguel['id_aluno'];
		$sqllivros = mysqli_query($conn, "SELECT * FROM livros WHERE id_livro='$idlivro'");
		$sqlaluno = mysqli_query($conn, "SELECT * FROM aluno WHERE id_aluno='$idaluno'");
		$txtsql=mysqli_fetch_array($sqllivros);
		$rsaluno=mysqli_fetch_array($sqlaluno);
	?><div class="product-item">	
	<div class="pi-pic">
	<img height="400px"src="img/<?php echo $txtsql['img_livro'];?>">
	<div class="pi-links">
	<a href="pagamulta.php?id_alug=<?php echo $rsaluguel['id_alug']?>" class="add-card"><i src="img/menu.png">+</i><span>Abrir Multa</span></a>
	<!--<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>-->
	</div>

	</div>
	<?php echo $rsaluno['sala']?>
		<div class="pi-text"><?php echo limitar($rsaluno['nm_aluno'],17	);?></div>
			

	</div>
<?php	$x++;
	}
?>
</div>
</div>
</section>
	<?php require_once"includes/foot.php"; ?>
	<?php require_once"includes/js.php"; ?>
</body>
</html>