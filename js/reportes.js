function getNombreUsuario(){
	var request = $.ajax({
      
    url: "../includes/service-reportes.php",
    type: "get",
    data: {
      	   'query': '',
    },
    dataType: 'json',
    success: function(response) { 
      
    },
    error: function(response){
				
			
  		});
    }
}