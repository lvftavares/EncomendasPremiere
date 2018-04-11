<!doctype html>
<html lang="pt-BR">

<head>
	<title> ENCOMENDA@PREMIERE </title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  	<style>
  		div.container{
  			margin-left: 5px;
			margin-top: 20px;
			padding: 10px 10px; 
  		}
  		input.num_bloco{
  			width: 30px;

  		}

  	</style>
</head>

<body>
	<header>
		<nav class="navbar navbar-expand-sm  bg-dark navbar-dark ">
			<ul class="navbar-nav">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">MORADOR</a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="index.php?link=100">CADASTRAR</a>
						<a class="dropdown-item" href="index.php?link=101">EDITAR</a>
				</li>				
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">ENTREGADOR</a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="index.php?link=200">CADASTRAR</a>
						<a class="dropdown-item" href="index.php?link=100">EDITAR</a>
				</li>
				
				<li class="nav-item"><a class="nav-link" href="index.php?link=300"> ENTRADA </a></li>
				<li class="nav-item"><a class="nav-link" href="index.php?link=400"> SAÍDA </a></li>
				<li class="nav-item"><a class="nav-link" href="index.php?link=500"> RELATÓRIO </a></li>
			</ul>
		</nav>
	</header>
	<div class="container">
<?php
		
			if(isset($_GET['link'])){
				$link = $_GET['link'];
				$pag[100] = "cadMorador.php";
 				$pag[101] = "editMorador.php";
 				$pag[1011] = "alterMorador.php";
 				$pag[1012] = "excluirMorador.php";
 				$pag[200] = "cadEntregador.php";
 				$pag[300] = "cadEntrada.php";
 				$pag[400] = "cadSaida.php";
 				$pag[500] = "relatorios.php";
				$pag[11] = "gravar.php";
				$pag[22] = "alterar.php";
				$pag[33] = "excluir.php";
				$pag[44] = "gravarecomunicar02.php";
			
				if(file_exists($pag[$link])){
					include ("$pag[$link]");

				}else{
					 include("index.php");
				}
				
			}
?>
	</div>




</body>




</html>
