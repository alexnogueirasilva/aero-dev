$().ready(function() {
	$('#form_cadastro_empresa').validate({
		rules: { 
			razaoSocial : {
				required: true
			},          
			nomeFantasia: {
				required: true
			},
			CNPJ: {
				required: true
			}
		},
		highlight: function(element) {
			$(element).closest('.form-group').addClass('has-error');
		},
		unhighlight: function(element) {
			$(element).closest('.form-group').removeClass('has-error');
		},
		errorElement: 'span',
		errorClass: 'help-block',
		errorPlacement: function(error, element) {
			if (element.parent('.input-group').length) {
				error.insertAfter(element.parent());
			} else {
				error.insertAfter(element);
			}
		},
		messages: {
			razaoSocial : {
				required: "Este campo não pode ser vazio",
			},
			nomeFantasia: {
				required: "Este campo não pode ser vazio",
			},
			CNPJ: {
				required: "Este campo não pode ser vazio",
			}
		}
	});
	
	$('#CNPJ').mask("99.999.999-9999/99");
});