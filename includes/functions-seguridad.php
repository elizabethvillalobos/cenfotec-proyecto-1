<?php
	require_once('../includes/functions.php');


function obtenerInfoSesion(){
    $query = "SELECT `tusuarios`.`id`, `tusuarios`.`contrasena`, `tusuarios`.`activo`, `tusuarios`.`rol`, `trol`.`nombre` AS 'Rol' FROM tusuarios, trol WHERE `tusuarios`.`rol`=`trol`.`id` AND `tusuarios`.`activo`= 1 ";
    
    return do_query($query);
}


function comprobarCorreo($correo) {
    $usuarios = obtenerInfoSesion();
    $id = '';
        
    while ($row = mysqli_fetch_assoc($usuarios)){
        if($row['id']==$correo){
            $id = $row['id'];
        }
    }
    return $id;
}                    

function comprobarContrasena($correo, $contrasena) {
    $usuarios = obtenerInfoSesion();
    $rol = '';
        
    while ($row = mysqli_fetch_assoc($usuarios)){
        if($row['id']==$correo){
            if($row['contrasena']==$contrasena){
                $rol = $row['rol'];
            }
        }
    }
    return $rol;
}     


if($_SERVER['REQUEST_METHOD']=="POST") {
	$function = $_POST['call'];
	if(function_exists($function)) {        
	    call_user_func($function);
	} else {
	    echo 'Function Not Exists!!';
	}
}
                     
?>