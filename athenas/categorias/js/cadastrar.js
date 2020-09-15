$('document').ready(function()
{
	$("#btn_salvar").click(function(){
		btn_salvar("salvar");
	});

	$("#btn_cancelar").click(function(){
		location.href = "../index.php";
	});
});
function btn_salvar(acao)
{
	if(validaCampo("categoria"))
	{
		enviarForm(acao);
	}	
	else
	{
		modalMessage("ATENÇÃO", "Campo Obrigatório!");
	}
}
function enviarForm(acao)
{
	var url = "./actions/cadastrar.php";
	var data = 
	{
		acao: acao,
		categoria: $("#categoria").val()
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
			modalMessage('AVISO', data);
			limparCampos();
		},
		error:function()
		{
			modalMessage('ERRO','Ocorreu um erro ao tentar cadastrar o CEP, se o erro persistir, favor contatar o administrador do sistema!');
		}
	});	
}
function limparCampos()
{	
	$("#categoria").val("");
}