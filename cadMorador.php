<form action="index.php?link=11" method="POST">
	 	<div class="form-group"> 
			<input class="form-control" type="text" id="nome" 
			name="nome" placeholder="Nome" required />
		</div>				 	
		<div class="form-group"> 
			<input class="form-control" type="text" name="nomeSocial" 
			 placeholder="Nome Social" required />
		</div>
		<div class="form-group">
			<input class="form-control" type="text" name="email1" placeholder="Email" required/>
		</div>						
		<div class="form-group">
			<input class="form-control" type="text" name="email2" placeholder="Email - Alternativo"/>
		</div>	
		<div class="form-group">
			<input class="form-control" type="tel" name="cel1" placeholder="Celular" />  
        </div>					
        <div class="form-group">
			<input class="form-control" type="tel" name="cel2" placeholder="Celular - Alternativo"/>  
        </div>	                
        <div class="form-group">
			<input class="form-control" type="number" name="apto" placeholder="Número do Apartamento" required/>  
        </div>
        	
        <div class="form-group">
			<select class="form-control" id="selecao" name="bloco" style=" height:40px;" required>
				<option value="">ESCOLHA A TORRE </option>
				<option value="A">A</option>
				<option value="B">B</option>
				<option value="C">C</option>
				<option value="D">D</option>
			</select>
		</div>

		<div class="form-group radio">
			<label> 
				<input type="radio" name="tipoMorador" value="Proprietário" required> Proprietário
			</label>							
			<label>  
				<input type="radio" name="tipoMorador" value="Inquilino" required > Inquilino
			</label>	
			
		</div>
			
        <input class="btn btn-dark btn-block pull-right" type="submit" name="cadastrar" value="CADASTRAR">
        <input type="hidden" name="action" value="gravar-morador">
</form>
