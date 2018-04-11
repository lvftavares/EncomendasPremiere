<?php
session_start();

		if($_POST['action'] == "gravar-entrega"){

			include("conecta.php");

			$idEntregador = $_POST['idEntregador'];
			$apto[] = $_POST['moradorDestino'];
			$tipoProduto[] = $_POST['tipoProduto'];
			$codigoProduto[] = $_POST['codigoProduto'];

			$qtde_array = sizeof($codigoProduto[0]);
			echo "QUANTIDADE PRODUTOS ".$qtde_array;

			$j = 0;	

			var_dump($apto);
			var_dump($codigoProduto);
			var_dump($tipoProduto);

			$apto[0] = array_map('strtoupper', $apto[0]);

			$teste = array_unique($apto[0]);

			print_r($teste);

			echo "TAMANHO :".sizeof($teste);

/*
			while($j < $qtde_array ) {
				
				$apartamento = strtoupper($apto[0][$j]);
				$codProduto = $codigoProduto[0][$j];
				$Referencia = $tipoProduto[0][$j];

				$consultaMorador = mysqli_query($mysqli, "SELECT id FROM morador WHERE apto = '$apartamento'");
				

				$chkMorador = mysqli_num_rows($consultaMorador);


				if($chkMorador > 0){

						$sqlEntrega = "INSERT INTO entregas (codProduto, unMorador, idEntregador, Referencia, cadResp)
									VALUES(
										'$codProduto',
										'$apartamento',
										'$idEntregador',
										'$Referencia',
										'11'
										)";
					
					
					$inserirBD = mysqli_query($mysqli, $sqlEntrega) or die (mysqli_error($mysqli));

					if($inserirBD){
					 	$parametrobd = "success";	
						$_SESSION['inserido'] = "S";
					}else{
						$parametrbd = "danger";
						$_SESSION['inserido'] = "N";

					}	
				


					$pegaEmail = mysqli_query($mysqli, "SELECT apto, email1, email2 FROM morador
					WHERE apto = '$apartamento'");

					$chkpegaEmail = mysqli_num_rows ($pegaEmail);
					
					echo "<br> ENCOMENDA - ".$codigoProduto[0][$j]."  Parâmetro BD - ".$parametrobd."<br>" ;

					if($chkpegaEmail >= 1){

					$subject  = 'ENCOMENDA RECEBIDA';
					$message  = 'OLÁ ! INFORMAMOS QUE VOCÊ RECEBEU UMA ENCOMENDA. ';
					$headers  = 'From: lvftavares@gmail.com' . "\r\n" .
					            'Reply-To: lvftavares@gmail.com' . "\r\n" .
					            'MIME-Version: 1.0' . "\r\n" .
					            'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
					            'X-Mailer: PHP/' . phpversion();

							
						while($vetorEmail = mysqli_fetch_array($pegaEmail))
						{          
							$to = $vetorEmail['email1'].",".$vetorEmail['email2'];

							if(mail($to, $subject, $message, $headers))
						    	$parametro = "EMAIL ENVIADO COM SUCESSO";
							else
						    echo $parametro = "ERRO NO ENVIO DO EMAIL";
/*
							$to2 = $vetorEmail['email2'];

							if(mail($to2, $subject, $message, $headers))
						    	$parametro = "SUCESSO";
							else
						    echo $parametro = "ERRO";*/
/*
								echo "<br> 
										APTO: ".$vetorEmail['apto']."<br>"
											   .$vetorEmail['email1']." $parametro <br> "
											   .$vetorEmail['email2']." $parametro <br>";
						}

					}else{ 
							echo "<br>MORADOR NÃO POSSUI EMAIL CADASTRADO!";
						 }

				}else{ 
						echo "<br> NÃO HÁ NENHUM CADASTRO DA UNIDADE ".$apartamento."
								<a href='javascript:history.back()'> Verificar </a><br><br>";
					 }

				$j++;	
			}*/

		}



?>