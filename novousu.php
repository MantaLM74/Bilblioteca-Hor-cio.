<?php
		session_start();
	require_once "includes/conexao.php";
 					require_once "includes/head.php";

	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$senha = md5($_POST[('senha')]);
	$rm = $_POST['rm'];
	$sala = $_POST['sala'];
	$tel= $_POST['telefone'];
	$id_sessao= session_id();
	$sql = mysqli_query($conn, "INSERT INTO aluno (nm_aluno,email,senha,rm,sala,telefone) VALUES('$nome','$email','$senha','$rm','$sala','$tel') ");

	$n = mysqli_affected_rows($conn);
	
?>

<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<title>Titulo</title>
		<meta charset="UTF-8"/>
		<link rel="stylesheet" type="text/css" href="css/style.css" />
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
						<h1>Cadastro efetuado com sucesso</h1>
							<label for="nome">Nome: </label>
							<?php echo $nome; ?>

							<br><br>
							<label for="email">E-mail: </label>
							<?php echo $email; ?>
					<?php
						}
						else
						{
					?>
							<h1>Erro ao cadastrar novo usuário!</h1>
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















