<?php

	if(isset($_POST['action'])){
		include("conecta.php");

		if($_POST['action'] == 'gravar-morador'){
			$nome = $_POST['nome'];
			$nomeSocial = $_POST['nomeSocial'];
			$email1 = strtolower($_POST['email1']);
			$email2 = strtolower($_POST['email2']);
			$cel1 = $_POST['cel1'];
			$cel2 = $_POST['cel2'];
			$apto = $_POST['apto']."".$_POST['bloco'];
			$bloco = $_POST['bloco'];
			$tipoMorador = $_POST['tipoMorador'];
			$respCad = "492078";

			$sqlMorador = "INSERT INTO 
			morador (nome, nome_social, email1, email2, cel1, cel2, apto, bloco, tipo ,respCad)
			VALUES('$nome', '$nomeSocial','$email1','$email2', '$cel1', '$cel2', '$apto', '$bloco','$tipoMorador', '$respCad')";
			
			$sqlRedundancia = "SELECT nome, apto, bloco FROM morador 
			WHERE nome='$nome' AND apto='$apto' AND bloco = '$bloco'";

			$consultaRedundancia = mysqli_query($mysqli, $sqlRedundancia) or die(mysqli_error($mysqli));
			
			$sumRedundancia = mysqli_num_rows($consultaRedundancia);

			if($sumRedundancia >= 1){
				echo "CADASTRO EXISTENTE";
			}else{
				
				$inserir = mysqli_query($mysqli, $sqlMorador) or die (mysqli_error($mysqli));
				echo "<script> alert ('CADASTRO REALIZADO COM SUCESSO'); </script>";
			}

		}elseif($_POST['action'] == "gravar-entregador"){

			//$entregador = $_POST['entregador'];
			$empresa = $_POST['empresa'];
			$tel1 = $_POST['tel1'];
			$tel2 = $_POST['tel2'];
			$respCad = "492078";

			$sqlEntregador = "INSERT INTO entregador (empresa, tel1, tel2, respCad)
							VALUES('$empresa','$tel1','tel2','$respCad')";


			mysqli_query($mysqli, $sqlEntregador) or die (mysqli_error($mysqli));	
			echo "<script> alert ('CADASTRO REALIZADO COM SUCESSO'); </script>";			
		
		}elseif($_POST['action'] == "gravar-saida"){

			session_start();

			$idEntrega[] = $_POST['selEntrega'];
			$retiradopor = $_POST['retiradopor'];
			$caminhoFoto = $_SESSION['caminhoArquivo'];
			$respEntrega = '3';


			$contador = sizeof($idEntrega[0]);
			$i=0;


			While($i<$contador){

			$sqlSaida = "UPDATE entregas SET 
							retirado_por = '$retiradopor',
							respEntrega = '$respEntrega',
							caminhoFoto = '$caminhoFoto'
							WHERE idEntrega = '".$idEntrega[0][$i]."'";

				mysqli_query($mysqli, $sqlSaida) or die (mysqli_error($mysqli));
			
			$i++;	
			}

			echo "<script> alert ('ENTREGA FINALIZADA COM SUCESSO'); </script>";
		}
		session_unset($_SESSION['caminhoArquivo']);
	}	




?>