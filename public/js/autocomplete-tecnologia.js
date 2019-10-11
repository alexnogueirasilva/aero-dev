var item = null;

var app = {	
	num_maximo_tecnologias: 3,
	arrayTecnologias: [],	

	adicionaTecnologia: function(tecnologia)
	{
		if($('tr').length > 3)
		{
			app.exibeMensagem('O número máximo <b>('+ app.num_maximo_tecnologias +')</b> de tecnologias foi atingido.');
			$("#autocomplete-tecnologia").val('');			
		}else{
			if($('td:contains('+ tecnologia.tecnologia +')').length > 0){
				this.exibeMensagem('A tecnologia <b>'+ tecnologia.tecnologia +'</b> já foi selecionada.');
			}else{
				$('#editar-tabela-tecnologias').append('<tr>'+
					'<td>'+tecnologia.tecnologia+'<input type="hidden" value="'+tecnologia.idtecnologia+'" name="tecnologias[]"></td>'+
					'<td><a class="btn btn-danger btn-sm" onClick="app.removeTecnologia(this,'+ tecnologia.idtecnologia +')">remover</td>'+
					'</tr>');			
				$("#autocomplete-tecnologia").val('');		
				app.arrayTecnologias.push(tecnologia.idtecnologia);
			}
		}		
	},

	removeTecnologia: function(tr,tecnologia)
	{
		var tr = $(tr).closest('tr');	
		tr.remove();  	

		var index = app.arrayTecnologias.indexOf(String(tecnologia));	
		app.arrayTecnologias.splice(index,1);
	},

	exibeMensagem: function(mensagem)
	{
		$('#div-modal').html('');
		$('#div-modal').append(mensagem);
		$('#modal-tecnologias').modal();
	}
}



var optionsTecnologias = {

	url: function(tecnologia) {
		return "http://localhost/mvc-mestre-detalhe/tecnologia/autoComplete/" + tecnologia;
	},

	getValue: function(element) {
		return element.tecnologia;
	},

	list: {
		onChooseEvent: function() {		
			item = $("#autocomplete-tecnologia").getSelectedItemData();		

			if(app.arrayTecnologias.length < app.num_maximo_tecnologias){				
				if(app.arrayTecnologias.indexOf(item.idtecnologia) < 0){	
					app.adicionaTecnologia(item);
				}else{					
					app.exibeMensagem('A tecnologia <b>'+ item.tecnologia +'</b> já foi selecionada.');
					$("#autocomplete-tecnologia").val('');
				}
			}else{
				app.exibeMensagem('O número máximo <b>('+ app.num_maximo_tecnologias +')</b> de tecnologias foi atingido.');
				$("#autocomplete-tecnologia").val('');			
			}
		},

		onHideListEvent: function(){			
			$("#autocomplete-tecnologia").val('');	
			item = null;
		}
	}
};

$("#autocomplete-tecnologia").easyAutocomplete(optionsTecnologias);
