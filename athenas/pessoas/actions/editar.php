<?php
	require_once('../../core/index.php');

	$acao = sanitize('acao');

	if(isset($acao))
	{
		switch (strtoupper($acao)) 
		{
			case strtoupper('salvar'):
				editar_Pessoa();
			break;
			default:
				
			break;
		}
	}

	function editar_Pessoa()
	{
		$categoria = sanitize("categoria");
		$nome = sanitize("nome");
		$email = sanitize("email");
		$token = sanitize("token");

		if(empty($categoria) || empty($nome) || empty($email) || empty($token))
		{
			echo "Existem campos obrigatórios que estão vazios!";
			die();	
		}
		else
		{
			$sql = "UPDATE 
				`tb_pessoas`
				SET
				`nome` = '$nome',
				`email` = '$email',
				`fk_categoria` = '$categoria'
				WHERE 
				`token` = '$token'";
			
			$pessoa = editar($sql);
			if($pessoa)
			{
				echo "Pessoa atualizada com sucesso!";
				die();
			}	
			else
			{
				echo "Ocorreu um erro ao tentar atualizar a pessoa, se o erro persistir, favor contatar o administrador do sistema.";
				die();
			}
		}
	}