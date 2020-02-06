<?php
session_start();
	
	require_once "includes/conexao.php";	?>
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
	function valida_nome() {
        var filter_nome = /^([a-zA-Zà-úÀ-Ú]|\s+)+$/;
		var filter_rm =/([0-9])/;
        if (!filter_nome.test(document.getElementById("nome").value)) {
            document.getElementById("nome").value = '';
            document.getElementById("nome").placeholder = "Nome inválido";
			alert("Nome inválido"); 
			return false;
        } else {
			
			if(!filter_rm.test(document.getElementById("rm").value)){
			 document.getElementById("rm").value = '';
            document.getElementById("rm").placeholder = "RM inválido";
			alert("RM Inválido");  
			
				  return false;
			}
		}
        return true;
    }
	</script>
								<div class="page-top-info">
		<div class="container">
			<h4>Cadastro</h4>
			<div class="site-pagination">
				<a href="index.php">Home</a>
			</div>
		</div>
	</div>
				<div class="cadast">
				<h5> Preencha todos os campos para se cadastrar </h5><br>
						<form class="cad-form" name="cad_usuario" method="post" action="novousu.php">
							<input placeholder="RM" maxlength=6 type="text" name="rm" id="rm"></input><br><br>

							<input placeholder="Nome" type="text" name="nome" id="nome"></input><br><br>

							<input placeholder="Sala" type="text" name="sala" id="sala"></input><br><br>

							<input placeholder="E-mail" type="text" name="email" id="email"></input><br><br>

							<input placeholder="Telefone" type="text" name="telefone" id="telefone"></input><br><br>

							<input  placeholder="Senha" type="password" name="senha" id="senha"></input><br><br>							

							<input type="submit" id="myBtn" onmouseover="valida_nome()" value="Cadastrar">			
					</form>
					
					</div>
					<?php
				require_once "includes/foot.php";
			?>
	</body>
</html>















