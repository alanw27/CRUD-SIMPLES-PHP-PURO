<?php
	require_once('../../core/index.php');

	$acao = sanitize('acao');

	if(isset($acao))
	{
		switch (strtoupper($acao)) 
		{
			case strtoupper('excluir'):
				excluir_Pessoa();
			break;
			default:
				
			break;
		}
	}

	function excluir_Pessoa()
	{
		$token = sanitize("token");
		
		if(empty($token))
		{
			echo "Houve um erro ao tentar excluir a categoria!";
			die();	
		}
		else
		{
			$sql = "DELETE FROM `tb_pessoas` WHERE token = '$token'";
					       
			$pessoa = deletar($sql);
			if($pessoa)
			{
				echo "1";
				die();
			}	
			else
			{
				echo "0";
				die();
			}
        }
    }