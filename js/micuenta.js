(function($) {
	var usuarioActivo = $('#usuario-activo').val();

	// Consultar a la base de datos para obtener el password del 
	// usuario actual.
	// Llamar con ajax a functions-micuenta y pasarle como paramentro el id del usuario activo. 
	// En el success del ajax se guarda la contrasena en una variable:
	// var usuarioActivoPwd = ;

	// Validacion
	// Listener al boton de guardar.
	// 1. contrasena actual == usuarioActivoPwd
	// 2. contrasena-nueva tenga mayuscula y numeros
	// 3. contrasena-nueva == contrasena-confirmar

	// Guardar nueva contrasena en la BD
	// UPDATE SQL.....

	// Mostrar mensaje de confirmacion
	// "La contrasena se cambio correctamente."
})(jQuery);