<div class="container pull-left">
    	<form action="index.php?link=22" method="POST">
		 	<div class="form-group"> 
				<label for="nome">Nome Completo</label>
				<input class="form-control" type="text" id="nome" 
				name="nome" value="<?php echo $_GET['nome'];?>" placeholder="Nome" required />
			</div>				 	
			<div class="form-group"> 
				<label for="nome">Nome Social</label>
				<input class="form-control" type="text" name="nomeSocial" 
				 value="<?php echo $_GET['nomeSocial'];?>"placeholder="Nome Social" required />
			</div>
			<div class="form-group">
				<label for="email1">Email</label>
				<input class="form-control" type="text" name="email1" placeholder="Email" value="<?php echo $_GET['email_pri'];?>" />
			</div>						
			<div class="form-group">
				<label for="email2">Email - Alternativo</label>
				<input class="form-control" type="text" name="email2" placeholder="Email - Alternativo" value="<?php echo $_GET['email_sec'];?>"/>
			</div>	
			<div class="form-group">
				<label for="cel1">Celular</label>
				<input class="form-control" type="tel" name="cel1" placeholder="Celular" value="<?php echo $_GET['tel_pri'];?>"/>  
            </div>					
            <div class="form-group">
				<label for="cel2">Celular - Alternativo</label>
				<input class="form-control" type="tel" name="cel2" placeholder="Celular - Alternativo" value="<?php echo $_GET['tel_sec'];?>"/>  
            </div>	                
            <div class="form-group">
				<label for="apto">Apartamento</label>
				<input class="form-control" type="number" name="apto" placeholder="Número do Apartamento" required value="<?php echo $_GET['apartamento'];?>"/>  
            </div>
            	
            <div class="form-group">
				<label for="selecao">BLOCO</label>
				<select class="form-control" id="selecao" name="bloco" style=" height:40px;" required ">
					<option value="">ESCOLHA A TORRE </option>
					<option value="A" <?php if($_GET['torre'] == 'A') echo "selected";?> >A</option>
					<option value="B" <?php if($_GET['torre'] == 'B') echo "selected";?> >B</option>
					<option value="C" <?php if($_GET['torre'] == 'C') echo "selected";?> >C</option>
					<option value="D" <?php if($_GET['torre'] == 'D') echo "selected";?> >D</option>
				</select>
			</div>
			<div class="form-group radio">
				<label> 
					<input type="radio" name="tipoMorador" value="Proprietário" required <?php if($_GET['tipoMorador'] == 'Proprietário')echo "checked";?>> Proprietário
				</label>							
				<label>  
					<input type="radio" name="tipoMorador" value="Inquilino" required <?php if($_GET['tipoMorador'] == 'Inquilino')echo "checked";?>> Inquilino
				</label>		
			</div>
			<input type="hidden" name="action" value="alterar-morador">
			<input type="hidden" name="id" value="<?php echo $_GET['identifica'];?>">
            <input class="btn btn-dark btn-block pull-right" type="submit" name="cadastrar" value="ALTERAR">
            
    	</form>
</div>	
