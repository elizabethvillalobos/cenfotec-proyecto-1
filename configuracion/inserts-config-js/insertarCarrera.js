/*AJAX PARA INSERTAR CARRERA, JAVIER BARBOZA*/

function registrarCarrera() {
  var codigo = $('#codigo-carrera').val(),
      nombre = $('#nombre-carrera').val(),
      director = $('#director-academico').val(); 

  var request = $.ajax({
    url: "/cenfotec-proyecto-1/includes/functions-carreras.php",
    type: "post",
    data: {
      'call': 'crearCarrera',
      'pCodigo' : codigo,
      'pNombre': nombre,
      'pDirector' : director
    },
    //dataType: 'json',
    success: function(response) { 
      window.location = "/cenfotec-proyecto-1/configuracion/carrerasCrear-confirmar.php";
    }
    
  });
};

/*AJAX PARA INSERTAR CARRERA, JAVIER BARBOZA*/


