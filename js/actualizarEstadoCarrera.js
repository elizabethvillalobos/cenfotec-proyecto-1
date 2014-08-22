proy = {};

	$(function(){
		proy.buttonLogic = function(){
			$('.form-row-buttonAcciones > input#btn_disable').on('click', function(){
				var elem_container = $(this).parent();
				console.debug(elem_container[0].tagName);
				elem_container.find('#btn_enable').removeAttr('disabled'); //quita el atributo disable al boton habilitar					
				$(this).attr('disabled','disabled');	
				proy.updateStatus(elem_container.attr('id'),0);
			});

			$('.form-row-buttonAcciones > input#btn_enable').on('click', function(){
				var elem_container = $(this).parent();
				console.debug(elem_container[0].tagName);
				elem_container.find('#btn_disable').removeAttr('disabled');
				$(this).attr('disabled','disabled');
				proy.updateStatus(elem_container.attr('id'),1);
			});

		};

		proy.updateStatus = function(id, estado) {
			var request = $.ajax({
				url: "/cenfotec-proyecto-1/includes/functions-carreras.php",
				type: "post",
				data: { 
						'call': 'actualizarEstado',
						'pId_carrera': id, 
						'pEstado': estado 
					},				
			});
		};

		proy.buttonLogic();
	})