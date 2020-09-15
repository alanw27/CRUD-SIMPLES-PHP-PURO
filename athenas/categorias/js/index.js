function excluir(token)
{
	var url = "./actions/index.php";
	var data = 
	{
		acao: "excluir",
		token: token
	};
	
	$.ajax
	({
		cache: false,
		type: "post",
		dataType: "text",
		data: data,
		url: url,
		beforeSend: function()
		{
		},
		success: function(data)
		{
            if(data == 0)
            {
                alert('Ocorreu um erro ao tentar excluir a categoria, se o erro persistir, favor contatar o administrador do sistema!');
            }
            else if(data == 1)
            {
                alert('Categoria excluída com sucesso');
                location.reload();
            }
            else if(data == 2)
            {
                alert('Não foi possível exclui esta categoria porque ela está relacionada com uma ou mais pessoas!');
            }
		},
		error:function()
		{
			modalMessage('ERRO','Ocorreu um erro ao tentar excluir a categoria, se o erro persistir, favor contatar o administrador do sistema!');
		}
	});	
}