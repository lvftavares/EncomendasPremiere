<?php 
session_start();
?>	


	<!-- First, include the Webcam.js JavaScript Library -->
	<script type="text/javascript" src="webcam.min.js"></script>
	
	<!-- Configure a few settings and attach camera -->
	<script language="JavaScript">
		Webcam.set({
			width: 320,
			height: 240,
			image_format: 'jpeg',
			jpeg_quality: 80
		});	
	</script>

	<script language="JavaScript">

		function preview_snapshot() {
			// freeze camera so user can preview pic
			Webcam.freeze();
			
			// swap button sets
			document.getElementById('botao1').style.display = 'none';
			document.getElementById('botoes2e3').style.display = '';
		}
		
		function cancel_preview() {
			// cancel preview freeze and return to live camera feed
			Webcam.unfreeze();
			
			// swap buttons back
			document.getElementById('botao1').style.display = '';
			document.getElementById('botoes2e3').style.display = 'none';
		}
		
		function save_photo() {
			// actually snap photo (from preview freeze) and display it
			Webcam.snap( function(data_uri) {
				// display results in page
				document.getElementById('upload_results').innerHTML = 
					'<img id=imageprev src="'+data_uri+'"/>';
				// swap buttons back
				document.getElementById('botao1').style.display = '';
				document.getElementById('botoes2e3').style.display = 'none';
				} );
					 // Get base64 value from <img id='imageprev'> source
 				var base64image = document.getElementById("imageprev").src;

 				var url = 'upFotos.php';

 				Webcam.upload( base64image, url, function(code, text) {	
 				});


		}
	</script>




<form action="index.php?link=400" method="POST">
  <div class="input-group">	
    <input type="text" id="unMorador" class="form-control" value="<?php if(isset($_POST['aptoTorre'])) echo $_POST['aptoTorre'];?>" name="aptoTorre" placeholder="Digite o Apartamento e o Bloco (Ex: 73d ou 73D)">
    <div class="input-group-btn">
      <input  class="btn btn-dark" type="submit" value="Verificar">
      </input>
    </div>
  </div>
</form>


<?php
	if(isset($_POST['aptoTorre'])){

		$unMorador = strtoupper($_POST['aptoTorre']);
		include("conecta.php");

		$sqlConsultaMorador = "SELECT * FROM entregas WHERE unMorador = '$unMorador' AND dataEntrega IS NULL" ;
		$consultaMorador = mysqli_query($mysqli, $sqlConsultaMorador) or die (mysqli_error($mysqli));
		$chkConsultaMorador = mysqli_num_rows($consultaMorador);
	

	if($chkConsultaMorador >= 1){

	

	$_SESSION['unMorador'] = $unMorador;

?>
	<form action="index.php?link=11" method="post">
	 	<div class="table-responsive" style="margin-top: 10px;">
			<table class="table table-hover">
				<thead class="thead-dark">
				<th>idEntrega</th>
				<th>Código Produto</th>
				<th>Unidade </th>
				<th>Referência</th>
				<th>Data de Entrada</th>
				<th>Responsável</th>
				</thead>	
				<tbody>
	<?php  
					while($vetorMorador = mysqli_fetch_array($consultaMorador))
					{
	?>
					<tr> 
						<td><input type="checkbox" name="selEntrega[]" value="<?php echo $vetorMorador['idEntrega'];?>" checked></td>
						<td><?php echo $vetorMorador['codProduto'];?></td>
						<td><?php echo $vetorMorador['unMorador'];?></td>
						<td><?php echo $vetorMorador['Referencia'];?></td>
						<td><?php echo $vetorMorador['dataCad'];?></td>
						<td><?php echo $vetorMorador['cadResp'];?></td>
						
					</tr>	
	<?php
				   }
	?>			
					<tr>
						<td colspan="6"><input type="text" class="form-control" name="retiradopor" placeholder="Retirado por..." required> </td>
					</tr>
					<tr>
						<td colspan="3">
							<div id="my_camera"><script>Webcam.attach('#my_camera');</script></div>

							<div id="botao1">
		        				<input type="button" class="btn btn-light" value="Tirar Foto" onClick="preview_snapshot()">
		        			</div>
		        			<div id="botoes2e3" style="display: none;">
		        				<input type="button" class="btn btn-light" value="Tirar Outra" onClick="cancel_preview()">
		        				<input type="button" class="btn btn-dark" value="Salvar" onClick="save_photo()">
	        				</div>
	        			</td>
	        			<td colspan="3">
	        				<div id="upload_results"></div>
	        			</td> 
					</tr>	

					<tr>	
						<td>
							<input type="checkbox" name="checado" value="check" required> Conferido 	
						</td>	
						<td colspan="6">

							<button type="submit" name="action" class="form-control btn btn-dark" value="gravar-saida"> FINALIZAR ENTREGA </button> 
						</td>
					</tr>	
				</tbody>	
			</table>
		</div>
	</form>		

<?php 
	}else{
			echo "OPS... NÃO HÁ NENHUMA ENCOMENDA CADASTRADA PARA ESSA UNIDADE... ";
			}
		
	}

	include("desconecta.php");

?>
		</div>	
