<form action="index.php?link=11" method="POST">		 	
		<div class="form-group col-6"> 
			<input class="form-control" type="text" name="empresa" 
			 placeholder="Empresa responsável pelas Entregas" disabled/>
		</div>		
		<div class="form-group col-6"> 
			<input class="form-control" type="text" name="empresa" 
			 placeholder="Empresa responsável pelas Entregas" required />
		</div>

		<div class="form-group">
			<div class="col-3">
				<input class="form-control" type="text" name="tel1" id="telefone" placeholder="Telefone" />
			</div>	  
        </div>					
        <div class="form-group">
        	<div class="col-3 ">
				<input class="form-control" type="text" name="tel2" id="telefone" placeholder="Telefone Alternativo"/> 
			</div>	 
        </div>	                
			
        <input class="btn btn-dark col-3" style="margin-left: 15px;" type="submit" name="cadastrar" value="CADASTRAR">
        <input type="hidden" name="action" value="gravar-entregador">
</form>


