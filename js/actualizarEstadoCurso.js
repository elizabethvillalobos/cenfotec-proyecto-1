

proyecto = {};
	$(function(){

		proyecto.buttonLogic = function(){
			$('.form-row-buttonAcciones2profes > input#btnDeshabilitarCurso').on('click', function(){
				var elem_container = $(this).parent();
				console.debug(elem_container[0].tagName);
				elem_container.find('#btnHabilitarCurso').removeAttr('disabled'); //quita el atributo disable al boton habilitar					
				$(this).attr('disabled','disabled');	
				proyecto.updateStatus(elem_container.attr('id'),0);
			});

			$('.form-row-buttonAcciones2profes > input#btnHabilitarCurso').on('click', function(){
				var elem_container = $(this).parent();
				console.debug(elem_container[0].tagName);
				elem_container.find('#btnDeshabilitarCurso').removeAttr('disabled');
				$(this).attr('disabled','disabled');
				proyecto.updateStatus(elem_container.attr('id'),1);
			});

		};

		proyecto.updateStatus = function(idcurso,estado) {
			var request = $.ajax({
				url: "/cenfotec-proyecto-1/includes/service-cursos.php",
				type: "get",
				data: { 
						'query': 'actualizarEstadoCurso',
						'pId_curso': idcurso, 
						'pEstado': estado 
					},				
			});
		};

		proyecto.buttonLogic();
	})