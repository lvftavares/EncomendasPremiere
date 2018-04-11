<?php

	if(isset($_POST['action'])){
		include("conecta.php");

		if($_POST['action'] == 'alterar-morador'){
			$id = $_POST['id'];
			$nome = $_POST['nome'];
			$nomeSocial = $_POST['nomeSocial'];
			$email1 = $_POST['email1'];
			$email2 = $_POST['email2'];
			$cel1 = $_POST['cel1'];
			$cel2 = $_POST['cel2'];
			$apto = $_POST['apto']."".$_POST['bloco'];
			$bloco = $_POST['bloco'];
			$tipoMorador = $_POST['tipoMorador'];
			$respCad = "492078";

			$sqlMorador = "UPDATE morador
			SET 
			nome = '$nome', 
			nome_social = '$nomeSocial', 
			email1 = '$email1', 
			email2 = '$email2', 
			cel1 = '$cel1', 
			cel2 = '$cel2', 
			apto = '$apto', 
			bloco = '$bloco', 
			tipo = '$tipoMorador',
			respCad = '$respCad'
			WHERE id = '$id'";
			
			$sqlRedundancia = "SELECT nome,nome_social, email1, email2, cel1, cel2,  apto, bloco, tipo  FROM morador 
			WHERE 
				nome='$nome' AND 
				email1 = '$email1' AND
				email2 = '$email2' AND
				cel1 = '$cel1' AND
				cel2 = '$cel2' AND
				apto='$apto' AND 
				bloco = '$bloco' AND
				tipo = '$tipoMorador'";

			$consultaRedundancia = mysqli_query($mysqli, $sqlRedundancia) or die(mysqli_error($mysqli));
			
			$sumRedundancia = mysqli_num_rows($consultaRedundancia);

			if($sumRedundancia >= 1){
?>	
				<div>
					Ops... Nenhuma alteração realizada...<br/>
					<a href="javascript: history.back();">VOLTAR</a>
				</div>	
<?php
			}else{
				
				$inserir = mysqli_query($mysqli, $sqlMorador) or die (mysqli_error($mysqli));
				echo "<script> alert ('ALTERAÇÃO REALIZADA COM SUCESSO'); </script>";
			}

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