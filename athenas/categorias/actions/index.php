<?php
	require_once('../../core/index.php');

	$acao = sanitize('acao');

	if(isset($acao))
	{
		switch (strtoupper($acao)) 
		{
			case strtoupper('excluir'):
				excluir_Categoria();
			break;
			default:
				
			break;
		}
	}

	function excluir_Categoria()
	{
		$token = sanitize("token");
		
		if(empty($token))
		{
			echo "Houve um erro ao tentar excluir a categoria!";
			die();	
		}
		else
		{
            verificaRelacionamento($token);

			$sql = "DELETE FROM `tb_categorias` WHERE token = '$token'";
					       
			$categorias = deletar($sql);
			if($categorias)
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
    function verificaRelacionamento($token)
    {
        $sql = "SELECT id FROM tb_categorias WHERE token = '$token'";
        $result = retorna_consulta($sql);
        $id = $result[0]["id"];

        $sql = "SELECT id FROM tb_pessoas WHERE fk_categoria = $id";
        $result = retorna_consulta($sql);
        
        if(count($result) > 0)
        {
            echo "2";
            die;
        }
    }