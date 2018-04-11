<form action="index.php?link=101" method="post">
		<div class="input-group"> 
			<input class="form-control" value="<?php if(isset($_POST['txtPesquisa'])) echo $_POST['txtPesquisa'];?>" type="search" name="txtPesquisa" id="pesquisa" placeholder="Digite o Nome ou a unidade"  required />
		
			<div class="input-group-btn">	
            <input class="btn btn-dark " type="submit" value="Pesquisar">
        	</div>
          </div>
    </form>


<?php
	if(isset($_POST['txtPesquisa'])){

		$morador = $_POST['txtPesquisa'];
		include("conecta.php");

		$sqlConsultaMorador = "SELECT * FROM morador WHERE nome LIKE '%$morador%' OR apto LIKE '%$morador%'";
		$consultaMorador = mysqli_query($mysqli, $sqlConsultaMorador) or die (mysqli_error($mysqli));
		$chkConsultaMorador = mysqli_num_rows($consultaMorador);

		if($chkConsultaMorador >= 1){
?>
	<div class="table-fluid">
		<table class="table table-hover">
			<th>Nome</th>
			<th>Nome Social</th>
			<th>Email</th>
			<th>Email-Alt</th>
			<th>Telefone</th>
			<th>Telefone-Alt</th>
			<th>Apto</th>
			<th>Bloco</th>
			<th>Tipo</th>
			<th> Alterar </th>
			<th> Excluir </th>
			<tbody>
<?php  
			while($vetorMorador = mysqli_fetch_array($consultaMorador))
			{
?>
			<tr> 
				<td><?php echo $vetorMorador['nome'];?></td>
				<td><?php echo $vetorMorador['nome_social'];?></td>
				<td><?php echo $vetorMorador['email1'];?></td>
				<td><?php echo $vetorMorador['email2'];?></td>
				<td><?php echo $vetorMorador['cel1'];?></td>
				<td><?php echo $vetorMorador['cel2'];?></td>
				<td><?php echo $vetorMorador['apto'];?></td>
				<td><?php echo $vetorMorador['bloco'];?></td>
				<td><?php echo $vetorMorador['tipo'];?></td>
				<td><a class="btn btn-default" href="index.php?link=1011
								&identifica=<?php echo $vetorMorador['id'];?>	
								&nome=<?php echo $vetorMorador['nome'];?>
								&nomeSocial=<?php echo $vetorMorador['nome_social'];?>
								&email_pri=<?php echo $vetorMorador['email1'];?>
								&email_sec=<?php echo $vetorMorador['email2'];?>
								&tel_pri=<?php echo $vetorMorador['cel1'];?>
								&tel_sec=<?php echo $vetorMorador['cel2'];?>
								&apartamento=<?php echo $vetorMorador['apto'];?>
								&torre=<?php echo $vetorMorador['bloco'];?>
								&tipoMorador=<?php echo $vetorMorador['tipo'];?>">Alterar</a></td>
				<td><a class="btn btn-danger" href="index.php?link=1012
								&identifica=<?php echo $vetorMorador['id'];?>	
								&nome=<?php echo $vetorMorador['nome'];?>
								&nomeSocial=<?php echo $vetorMorador['nome_social'];?>
								&email_pri=<?php echo $vetorMorador['email1'];?>
								&email_sec=<?php echo $vetorMorador['email2'];?>
								&tel_pri=<?php echo $vetorMorador['cel1'];?>
								&tel_sec=<?php echo $vetorMorador['cel2'];?>
								&apartamento=<?php echo $vetorMorador['apto'];?>
								&torre=<?php echo $vetorMorador['bloco'];?>
								&tipoMorador=<?php echo $vetorMorador['tipo'];?>"> Excluir </td>
			</tr>	
<?php
			}
?>	
			</tbody>	
		</table>

<?php 			}else{

			echo "Nenhum morador encontrado";

			}
		
	}

	include("desconecta.php");

?>
		</div>	
