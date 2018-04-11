<?php
	session_start();

?>


<form class="form-inline row" action="index.php?link=300" method="POST">		 	
		<div class="form-group" style="margin-left: 15px;">
			<input list="empresa" class="form-control" type="text" name="empresa" 
			 placeholder="Empresa Responsável" value="<?php if(isset($_POST['empresa'])) echo $_POST['empresa'];?>" required />
			 <datalist id="empresa">
<?php
			include("conecta.php");
			$consulta = mysqli_query($mysqli, "SELECT id, empresa FROM entregador");
			if($consulta){
				while($empresa = mysqli_fetch_array($consulta)){
?>
				<option value="<?php echo $empresa['empresa'];?>">	
<?php			}

			}
?>
			</datalist>
		</div>		

		<div class="form-group"> 
			<input class="form-control" type="number" min="1" name="qtdeProduto" 
			 placeholder="Quantidade" value="<?php if(isset($_POST['qtdeProduto'])) echo $_POST['qtdeProduto'];?>"required />
		</div>
				              
		<input type="hidden" name="action" value="gravar-entrega">		
        <input class="btn btn-dark" style="margin-left: 15px;" type="submit" name="cadastrar" value="CRIAR ENTREGA">
        
</form>
		<div class="container" style="margin-top: 15px;">
<?php
		if(isset($_POST['action'])){
				
			$chkEntregador = mysqli_query($mysqli, "SELECT id FROM entregador WHERE empresa = '".$_POST['empresa']."'") or die(mysqli_error($mysqli));
			$contador = mysqli_num_rows ($chkEntregador);
			
			if($contador <= 0){
				echo "<script> alert ('ENTREGADOR NÃO CADASTRADO'); </script>";
			}else{
				$entregador = mysqli_fetch_array($chkEntregador);

				$dia = DATE("d/m/Y");
?>	
					<form class="form-group" action="index.php?link=44" method="POST">
						<table class="table  table-striped table-bordered">
							<thead class="thead-dark">
								<th colspan="3"> Resp: Luciano 
									Data: <?php echo $dia;?> 
									Entrega: <?php echo $_POST['empresa']; ?>
									Qtde: <?php echo $_POST['qtdeProduto'];?>	
								</th>
							</thead>	
							<thead class="thead-dark">
								<th> Código do Produto </th>
								<th> Apartamento de Destino </th>
								<th> Referência do Produto </th>
							</thead>	 
<?php
						$total = $_POST['qtdeProduto'];
						$i = 1;
						while($i <= $total){
?>				
						<tr>
							<div class="form-group">
								<td><input class="form-control" type="text" name="codigoProduto[]" placeholder="Código" required ></td>
								<td><input class="form-control" type="text" name="moradorDestino[]" placeholder="Apartamento de Destino" required ></td>
								<td><input class="form-control" type="text" name="tipoProduto[]" placeholder="Referência do Produto"></td> 
							</div>
						</tr>	
<?php
						$i++;
						}	
?>			
						<tr><td colspan="3">
							<div class="form-group">
								<input type="hidden" name="action" value="gravar-entrega">
								<input type="hidden" name="idEntregador" value="<?php echo $entregador['id'];?>">
								<input type="checkbox" name="conferido" required> Conferido 
								<input type="submit" class="form-control btn btn-dark" name="confirmar" value="CONFIRMAR E ENVIAR" >
							</div>
						</td></tr>	
						</table>
					</form>
					
<?php
			}
		}	
?>	
		</div>