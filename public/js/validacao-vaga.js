$().ready(function() {
	$('#form_cadastro_vaga').validate({
		rules: {
			titulo: {
				required: true
			},
			autocompleteEmpresa: {
				required: true
			},
			descricao: {
				required: true
			}
		},messages: {
			titulo: {
				required: "Este campo não pode ser vazio"
			},
			autocompleteEmpresa: {
				required: "Este campo não pode ser vazio",
			},
			descricao: {
				required: "Este campo não pode ser vazio",
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
		}		
	});    
});