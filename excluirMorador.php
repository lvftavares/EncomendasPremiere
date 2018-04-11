<form class="form" action="index.php?link=33" method="POST">
	 	<div class="form-group"> 
			<label for="nome">Nome Completo</label>
			<input class="form-control" type="text" id="nome" 
			name="nome" value="<?php echo $_GET['nome'];?>" disabled />
		</div>				 	
		<div class="form-group"> 
			<label for="nome">Nome Social</label>
			<input class="form-control" type="text" name="nomeSocial" 
			 value="<?php echo $_GET['nomeSocial'];?>" disabled/>
		</div>        
        <div class="form-group">
			<label for="apto">Apartamento</label>
			<input class="form-control" type="number" value="<?php echo $_GET['apartamento'];?>" disabled/>  
        </div>
        <div class="form-group">
			<label for="apto">Torre</label>
			<input class="form-control" type="text" name="torre"   value="<?php echo $_GET['torre'];?>"" disabled/>  
        </div>
        	 	                
        <div class="form-group">
			<label for="apto">Tipo</label>
			<input class="form-control" type="text" name="tipo" value="<?php echo $_GET['tipoMorador'];?>" disabled/>  
        </div>
        	 
		 <input type="hidden" name="action" value="excluir-morador">
        <input type="hidden" name="id" value="<?php echo $_GET['identifica'];?>">
        <input class="btn btn-dark btn-block" type="submit" name="cadastrar" value="CONFIRMAR EXCLUSÃO">
</form>
