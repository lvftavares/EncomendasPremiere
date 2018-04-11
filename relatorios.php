<?php 
session_start();
?>	

<style>	

.table img {
width: 50px;
height: 50px;
}

.table-hover img:hover{
-moz-transform: scale(4.0);
-webkit-transform: scale(4.0);
-o-transform: scale(4.0);
}

</style>


<form action="index.php?link=500" method="POST">
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

		$sqlConsultaMorador = "SELECT * FROM entregas WHERE unMorador = '$unMorador' AND dataEntrega IS NOT NULL" ;
		$consultaMorador = mysqli_query($mysqli, $sqlConsultaMorador) or die (mysqli_error($mysqli));
		$chkConsultaMorador = mysqli_num_rows($consultaMorador);
	

	if($chkConsultaMorador >= 1){

	

	$_SESSION['unMorador'] = $unMorador;

?>
	<form action="index.php?link=11" method="post">
	 	<div class="table" style="margin-top: 10px;">
			<table class="table table-hover">
				<thead class="thead-dark">
				<th>Código Produto</th>
				<th>Unidade </th>
				<th>Referência</th>
				<th>Entrada</th>
				<th>Resp  </th>
				<th> Saída </th>
				<th> Retirado por </th>
				<th> Foto </th>
				<th> Resp</th>
				</thead>	
				<tbody>
	<?php  
					while($vetorMorador = mysqli_fetch_array($consultaMorador))
					{
	?>
					<tr> 
						<td><?php echo $vetorMorador['codProduto'];?></td>
						<td><?php echo $vetorMorador['unMorador'];?></td>
						<td><?php echo $vetorMorador['Referencia'];?></td>
						<td><?php echo date("d/m/y H:i",strtotime($vetorMorador['dataCad']));?></td>
						<td><?php echo $vetorMorador['cadResp'];?></td>
						<td><?php echo date("d/m/y H:i", strtotime($vetorMorador['dataEntrega']));?></td>
						<td><?php echo $vetorMorador['retirado_por'];?></td>
						<td><img src="fotos/<?php echo $vetorMorador['caminhoFoto'];?>"></td>
						<td><?php echo $vetorMorador['respEntrega'];?> </td>
					</tr>	
	<?php
				   }
	?>			
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
