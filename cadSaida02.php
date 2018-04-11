<script type="text/javascript" src="webcam.js"></script>
        <script type="text/javascript">
            //Configurando o arquivo que vai receber a imagem
            webcam.set_api_url('upload.php');

            //Setando a qualidade da imagem (1 - 100)
            webcam.set_quality(90);

            //Habilitando o som de click
            webcam.set_shutter_sound(true);

            //Definindo a função que será chamada após o termino do processo
            webcam.set_hook('onComplete', 'my_completion_handler');

            //Função para tirar snapshot
            function take_snapshot() {
            //    document.getElementById('upload_results').innerHTML = '<h1>Uploading...</h1>';
                webcam.snap();
            }


            //Função callback que será chamada após o final do processo
            function my_completion_handler(msg) {
                if (msg.match(/(http\:\/\/\S+)/)) {
                    var htmlResult = '';
                    htmlResult += '<img src="'+msg+'" />';
                    document.getElementById('upload_results').innerHTML = htmlResult;
                    webcam.reset();
                }
                else {
                    alert("PHP Erro: " + msg);
                }
            }
        </script>




<form action="index.php?link=400" method="POST">
  <div class="input-group">	
    <input type="text" class="form-control" name="aptoTorre" placeholder="Digite o Apartamento e o Bloco (Ex: 73d ou 73D)">
    <div class="input-group-btn">
      <input  class="btn btn-dark" type="submit" value="Verificar">
      </input>
    </div>
  </div>
</form>


<?php
	if(isset($_POST['aptoTorre'])){

		$unMorador = $_POST['aptoTorre'];
		include("conecta.php");

		$sqlConsultaMorador = "SELECT * FROM entregas WHERE unMorador = '$unMorador' AND dataEntrega IS NULL" ;
		$consultaMorador = mysqli_query($mysqli, $sqlConsultaMorador) or die (mysqli_error($mysqli));
		$chkConsultaMorador = mysqli_num_rows($consultaMorador);
	

	if($chkConsultaMorador >= 1){
?>
	<form action="#" method="post">
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
					<td><input type="checkbox" name="selEntrega" value="<?php echo $vetorMorador['idEntrega'];?>" checked></td>
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
					<td colspan="5"><input type="text" class="form-control" name="retiradopor" placeholder="Retirado por..."> </td>
				</tr>
				<tr>
					<td colspan="4">
							<script type="text/javascript">
	            //Instanciando a webcam. O tamanho pode ser alterado
	          				document.write(webcam.get_html(320, 240));
	        			</script>
	        			<input type="button" class="btn btn-dark" value="Tirar Foto" onClick="take_snapshot()">
	        			<input type="button" class="btn btn-dark" value="Reset" onClick="webcam.reset()">
        			</td>
        			<td>
        				<div id="upload_results"></div>
        			</td> 
				</tr>	

				<tr>	
						<td colspan="6">
							<button type="submit" class="form-control btn btn-dark" value="Entregar"> FINALIZAR ENTREGA </button> 
						</td>
				</tr>	
				</tbody>	
			</table>
		</div>
	</form>		

<?php 
	}else{
			echo "Nenhum morador encontrado";
			}
		
	}

	include("desconecta.php");

?>
		</div>	
