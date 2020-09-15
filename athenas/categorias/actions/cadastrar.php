<?php
	require_once('../../core/index.php');

	$acao = sanitize('acao');

	if(isset($acao))
	{
		switch (strtoupper($acao)) 
		{
			case strtoupper('salvar'):
				cadastra_Categoria();
			break;
			default:
				
			break;
		}
	}

	function cadastra_Categoria()
	{
		$categoria = sanitize("categoria");
		
		if(empty($categoria))
		{
			echo "Categoria é obrigatória!";
			die();	
		}
		else
		{
			$token = generateRandomString(256);
			$sql = "INSERT INTO 
				`tb_categorias`
				(
					descricao,
					token
				) 
				VALUES 
				(
					'$categoria',
					'$token'
				);";
		
			$categorias = salvarSpecial($sql);
			if($categorias)
			{
				echo "Categoria cadastrada com sucesso!";
				die();
			}	
			else
			{
				echo "Ocorreu um erro ao tentar cadastrar o Categoria, se o erro persistir, favor contatar o administrador do sistema.";
				die();
			}
		}
	}