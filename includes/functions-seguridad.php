<?php
	require_once('../includes/functions.php');


function obtenerInfoSesion(){
    // Miguel, este query no me estaba permitiendo hacer el inicio de sesion.
    // Yo no tengo datos en la tabla codigoactivacion y eso hace que la consulta no devuelva ningun resultado.
    // - Eli.
    // $query = "SELECT `tusuarios`.`id`, `tusuarios`.`contrasena`, `tusuarios`.`activo`, `tusuarios`.`rol`, `trol`.`nombre` AS 'Rol', `codigoactivacion`.`codigoActivacion` AS 'Codigo' FROM tusuarios, trol, codigoactivacion WHERE `tusuarios`.`rol`=`trol`.`id` AND `tusuarios`.`activo`= 1 AND `tusuarios`.`id` = `codigoactivacion`.`idUsuario`";

    $query = "SELECT `tusuarios`.`id`, `tusuarios`.`contrasena`, `tusuarios`.`activo`, `tusuarios`.`rol`, `trol`.`nombre` AS 'Rol' ".
             "FROM tusuarios, trol WHERE `tusuarios`.`rol`=`trol`.`id` AND `tusuarios`.`activo`= 1 ";
    
    return do_query($query);
}

function obtenerUsrPendientes(){
    $query = "SELECT `tusuarios`.`id`, `tusuarios`.`contrasena`, `tusuarios`.`activo`, `tusuarios`.`rol`, `trol`.`nombre` AS 'Rol', `codigoactivacion`.`codigoActivacion` AS 'Codigo' FROM tusuarios, trol, codigoactivacion WHERE `tusuarios`.`rol`=`trol`.`id` AND `tusuarios`.`id` = `codigoactivacion`.`idUsuario`";
    
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

function recuperarContrasena($correo) {
    $usuarios = obtenerInfoSesion();
    $contrasena = '';
        
    while ($row = mysqli_fetch_assoc($usuarios)){
        if($row['id']==$correo){
            $contrasena = $row['contrasena'];
        }
    }
    return $contrasena;
}   

function comprobarCodigo($correo, $codigo) {
    $usuarios = obtenerUsrPendientes();
    $activado = '';
        
    while ($row = mysqli_fetch_assoc($usuarios)){
        if($row['id']==$correo){
            if($row['Codigo']==$codigo){
                $activado = $row['Codigo'];
            }
        }
    }
    return $activado;
}  

function activarUsuario(){
    if(isset($_POST['pidUsr'])){
        $id = $_POST['pidUsr'];
        $query = "UPDATE tusuarios SET activo = '1' WHERE id='$id'";
        
        do_query($query);
    }
    
}    


/*if($_SERVER['REQUEST_METHOD']=="POST") {
	$function = $_POST['call'];
	if(function_exists($function)) {        
	    call_user_func($function);
	} else {
	    //echo 'Function Not Exists!!';
	}
}*/
                     
?>