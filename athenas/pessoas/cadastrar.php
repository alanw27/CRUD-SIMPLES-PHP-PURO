<?php
	require_once('../core/index.php');
?>
<!DOCTYPE html>
<html>
<?php require_once('../htmls/header.php'); ?>

    <body class="bootstrap-admin-with-small-navbar">	
		
		<?php require_once('../htmls/menu-superior-menor.php'); ?>
		<?php require_once('../htmls/menu-superior-maior.php'); ?>
		
        <div class="container">
            <div class="row"> 
	            <form id="form_cep_cadastrar" name="form_cep_cadastrar">
					<fieldset>
						<legend id="legend_dados_pessoais">Cadastro de Pessoas</legend>     		
			          	
		                <div class="row">   
		                	<div class="col-lg-12 form-group">
		                		<label for="nome">Nome:</label>
		                		<input id="nome" name="nome" type="text" class="form-control" maxlength="150"/>
		                	</div>
		                </div>

		                <div class="row">   
		                	<div class="col-lg-6 form-group">
		                		<label for="email">Email:</label>
		                		<input id="email" name="email" type="text" class="form-control" maxlength="50"/>
							</div>
							
		                	<div class="col-lg-6 form-group">
		                		<label for="categoria">Categoria:</label>
		                		<select id="categoria" name="categoria" class="form-control">
									<option>SELECIONE...</option>
									<?php
										$sql = "SELECT id, descricao FROM tb_categorias";;
										$result = retorna_consulta($sql);
										
										foreach($result as $categoria)
										{
									?>
											<option value="<?php echo $categoria['id'] ?>" ><?php echo $categoria['descricao']; ?></option>
									<?php
										}
									?>
								</select>
		                	</div>
		                </div>
		            	<br/>
		                
		                <div class="row">
		                	<div class="col-lg-12 form-group" style="margin-top:29px">
		                    	<button id="btn_salvar" name="btn_salvar" type="button" class="btn btn-primary"> Salvar <i class="glyphicon glyphicon-floppy-saved"></i></button>
		                    	<button id="btn_cancelar" name="btn_cancelar" type="button" class="btn btn-danger"> Cancelar <i class="glyphicon glyphicon-floppy-remove"></i></button>
		                    </div>
		                </div>

					</fieldset>
				</form>
			</div>
			<?php require_once("../modal/index.php") ?>
        </div>
		<script type="text/javascript" src="js/cadastrar.js" ></script>
    </body>	
</html>