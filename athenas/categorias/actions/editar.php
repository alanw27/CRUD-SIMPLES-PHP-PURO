<?php
	require_once('../../core/index.php');

	$acao = sanitize('acao');

	if(isset($acao))
	{
		switch (strtoupper($acao)) 
		{
			case strtoupper('salvar'):
				editar_Categoria();
			break;
			default:
				
			break;
		}
	}

	function editar_Categoria()
	{
		$categoria = sanitize("categoria");
		
		if(empty($categoria))
		{
			echo "Categoria é obrigatória!";
			die();	
		}
		else
		{
            $token = sanitize("token");

			$sql = "UPDATE
				`tb_categorias`
				SET
					descricao = '$categoria'
				WHERE 
					token = '$token'";
					       
			$categorias = editar($sql);
			if($categorias)
			{
				echo "Categoria editada com sucesso!";
				die();
			}	
			else
			{
				echo "Ocorreu um erro ao tentar editar a Categoria, se o erro persistir, favor contatar o administrador do sistema.";
				die();
			}
		}
	}