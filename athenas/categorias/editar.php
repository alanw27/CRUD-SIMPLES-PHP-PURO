<?php
	require_once('../core/index.php');

	$token = sanitize("id");
	$sql = "SELECT * FROM tb_categorias WHERE token = '$token'";
	$result = retorna_consulta($sql);
?>
<!DOCTYPE html>
<html>
<?php require_once('../htmls/header.php'); ?>

    <body class="bootstrap-admin-with-small-navbar">	
		
		<?php require_once('../htmls/menu-superior-menor.php'); ?>
		<?php require_once('../htmls/menu-superior-maior.php'); ?>
		
        <div class="container">
            <div class="row"> 
	            <form id="form_categoria" name="form_categoria">
					<fieldset>
						<legend id="legend_dados_pessoais">Edição de Categoria</legend>     		
			          	
		                <div class="row">   
		                	<div class="col-lg-12 form-group">
		                		<label for="categoria">Categoria:</label>
		                		<input id="categoria" name="categoria" type="text" value="<?php echo $result[0]['descricao'] ?>" class="form-control" maxlength="50"/>
		                	</div>
		                </div>

		            	<br/>
		                
		                <div class="row">
							<div class="col-lg-12 form-group" style="margin-top:29px">
								<input id="token" name="token" type="hidden" value="<?php echo $token ?>" />
		                    	<button id="btn_salvar" name="btn_salvar" type="button" class="btn btn-primary"> Salvar <i class="glyphicon glyphicon-floppy-saved"></i></button>
		                    	<button id="btn_cancelar" name="btn_cancelar" type="button" class="btn btn-danger"> Cancelar <i class="glyphicon glyphicon-floppy-remove"></i></button>
		                    </div>
		                </div>

					</fieldset>
				</form>
			</div>
			<?php require_once("../modal/index.php") ?>
        </div>
		<script type="text/javascript" src="js/editar.js" ></script>
    </body>	
</html>