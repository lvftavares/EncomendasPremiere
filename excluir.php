<?php

	if(isset($_POST['action'])){
		include("conecta.php");

		if($_POST['action'] == 'excluir-morador'){
			$id = $_POST['id'];

				$sqlExcluirMorador = "DELETE FROM morador WHERE id = '$id'";	


				$excluir = mysqli_query($mysqli, $sqlExcluirMorador) or die (mysqli_error($mysqli));

				if($excluir)
					echo "<script> alert ('EXCLUSÃO REALIZADA COM SUCESSO'); </script>";
			}elseif($_POST['action'] == "gravar-entregador"){

			$entregador = $_POST['entregador'];
			$empresa = $_POST['empresa'];
			$tel1 = $_POST['tel1'];
			$tel2 = $_POST['tel2'];
			$respCad = "492078";

			$sqlEntregador = "INSERT INTO entregador (entregador, empresa, tel1, tel2, respCad)
							VALUES('$entregador','$empresa','$tel1','tel2','$respCad')";


			mysqli_query($mysqli, $sqlEntregador) or die (mysqli_error($mysqli));	
			echo "<script> alert ('CADASTRO REALIZADO COM SUCESSO'); </script>";			
		}
	}	




?>