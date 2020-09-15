<?php
	require_once('../../core/index.php');

	$acao = sanitize('acao');

	if(isset($acao))
	{
		switch (strtoupper($acao)) 
		{
			case strtoupper('salvar'):
				cadastra_Pessoa();
			break;
			default:
				
			break;
		}
	}

	function cadastra_Pessoa()
	{
		$categoria = sanitize("categoria");
		$nome = sanitize("nome");
		$email = sanitize("email");
		
		if(empty($categoria) || empty($nome) || empty($email))
		{
			echo "Categoria é obrigatória!";
			die();	
		}
		else
		{
			$token = generateRandomString(256);
			$sql = "INSERT INTO 
				`tb_pessoas`
			(
				`nome`,
				`email`,
				`fk_categoria`,
				`token`
			) 
			VALUES 
			(
				'$nome',
				'$email',
				'$categoria',
				'$token'
			);";
		
			$pessoa = salvar($sql);
			if($pessoa)
			{
				echo "Pessoa cadastrada com sucesso!";
				die();
			}	
			else
			{
				echo "Ocorreu um erro ao tentar cadastrar a pessoa, se o erro persistir, favor contatar o administrador do sistema.";
				die();
			}
		}
	}