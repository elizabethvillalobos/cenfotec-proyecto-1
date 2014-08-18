<?php
	require_once('../includes/functions.php');

function obtenerInfoSesion(){
    $query = "SELECT `tusuarios`.`id`, `tusuarios`.`contrasena`, `tusuarios`.`activo`, `tusuarios`.`rol`, `trol`.`nombre` AS 'Rol' FROM tusuarios, trol WHERE `tusuarios`.`rol`=`trol`.`id` AND `tusuarios`.`activo`= 1 ";
    
    return do_query($query);
}

function getUsuarioPorId($usuarioId) {
    $query = 'SELECT tusuarios.id, tusuarios.contrasena, tusuarios.activo, tusuarios.rol '.
             'FROM tusuarios '.
             'WHERE tusuarios.id = "'.$usuarioId.'"';

    $queryResults = do_query($query);
    $jsonArray = [];
    $index = 0;

    while ($row = mysqli_fetch_assoc($queryResults)) {
        $results['nombreCompleto'] = utf8_encode($row['nombre']).' '.utf8_encode($row['apellido1']).' '.utf8_encode($row['apellido2']);
        $jsonArray[$index] = $results;
        $index++;
    }
    mysqli_free_result($queryResults);

    return $jsonArray;
}

function comprobarCorreo() {   
    $correo = $_GET['pid'];
    $usuarios = obtenerInfoSesion();
    $id = '';
        
    while ($row = mysqli_fetch_assoc($usuarios)){
        if($row['id']==$correo){
            $id = $row['id'];
        }
    }
    return $id;
}                    

/*function getPWUsuarios(){
    $contrasenas = getUsuarios();
    $i=0;
    
    while ($row = mysqli_fetch_assoc($contrasenas)) {
		$arreglo[$i]= $row['contrasena'];
        $i++;
	}
    
    return $arreglo;
}*/


if($_SERVER['REQUEST_METHOD']=="POST") {
	$function = $_POST['call'];
	if(function_exists($function)) {        
	    call_user_func($function);
	} else {
	    echo 'Function Not Exists!!';
	}
}
                     
?>