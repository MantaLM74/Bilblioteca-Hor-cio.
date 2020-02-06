<?php

	session_start();
	
	require_once "includes/conexao.php";		
?>
<html>
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
</head>
<title> Multa</title>
</head>
<body>

<?php if(isset ($_SESSION['admin']))
{
	require_once "includes/headmin.php";
}
else{
require_once  "includes/head.php"; 
}?>
<?php
	$idaluguel= $_GET['id_alug'];
	$sqlalug = mysqli_query($conn,"SELECT * FROM aluguel WHERE id_alug = $idaluguel");
	$rsalug= mysqli_fetch_array($sqlalug);	
	$idaluno=$rsalug['id_aluno'];
	$idlivro=$rsalug['id_livro'];
	$sqlaluno= mysqli_query($conn,"SELECT * FROM aluno WHERE id_aluno = $idaluno");
		$rsaluno = mysqli_fetch_array($sqlaluno);
	$sqllivro= mysqli_query($conn,"SELECT * FROM livros WHERE id_livro = $idlivro");

	$rslivro = mysqli_fetch_array($sqllivro);
 ?>
<div class="page-top-info">
		<div class="container">
			<h4><?php echo $rslivro['nm_livro']?></h4>
			</div>
			</div>
	
	<section class="product-section">
		<div class="container">
			<div class="back-link">
				<a href=""> &lt;&lt; Voltar para o menu</a>
			</div>
			<div class="row">
				<div class="col-lg-6">
						<img class="product-big-img" src="img/<?php echo $rslivro['img_livro']?>" alt="">
				</div>
				<div class="col-lg-6 product-details">
					<h2 class="p-title"><?php echo $rslivro['nm_livro']?></h2>
					<div id="accordion" class="accordion-area">
						<div class="panel">
							<div class="panel-header" id="headingOne">
								<button class="panel-link active" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">Informações</button>
							</div>
							<div id="collapse1" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
								<div class="panel-body">
								<p class="p-price">Aluno:<?php echo $rsaluno['nm_aluno']?></p>
								<p class="p-price">Sala:<?php echo $rsaluno['sala']?></p>
								<p class="p-price">Data de retirada:<?php echo $rsalug['dt_alu']?></p>				
								<p class="p-price">Data de entrega:<?php echo $rsalug['dt_ent']?></p>	
								<?php date_default_timezone_set('America/Sao_Paulo');
								$dia= date('d');
								$mes= date('m');
								$sqldia=mysqli_query($conn,"SELECT Day(dt_ent) FROM `aluguel` WHERE id_alug=$idaluguel");
								$sqlmes=mysqli_query($conn,"SELECT Month(dt_ent) FROM `aluguel` WHERE id_alug=$idaluguel");
								$diaent=mysqli_fetch_array($sqldia);
								$mesent=mysqli_fetch_array($sqlmes);
								
								$mesmulta=$mes-$mesent['Month(dt_ent)'];
								$mesmulta=$mesmulta*20;
								$multa=$dia-$diaent['Day(dt_ent)'];
								
								$multa=$mesmulta+$multa;
								if($multa>0 && $rsalug['reserv_alu']==0 ){
								
								?>
								<p class="p-price">Multa de:R$<?php 
								echo $multa;
							
								?>,00</p><?php } ?>									
								</div>
								<?php 
								if($rsalug['reserv_alu']==1){?>
								<div class="panel-body">
								<p class="p-price"><a>Aceitar</a> <a> Recusar</a></p>
								
								<?php } ?>
							</div>
							</div>
						</div>
						</div>
					
				</div>
			</div>
		</div>
	</section>
	

	<?php 
require_once "includes/foot.php";
?>

	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.slicknav.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.nicescroll.min.js"></script>
	<script src="js/jquery.zoom.min.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<script src="js/main.js"></script>
</body>
</html>
