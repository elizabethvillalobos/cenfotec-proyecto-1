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

function comprobarCorreo(){
   
    if(!empty($_GET['pid'])){
    
        $correo = $_GET['pid'];
        $id = "ola ke ase";
        $usuarios = obtenerInfoSesion();
        
        while ($row = mysqli_fetch_assoc($usuarios)){
            if($row['id']==$correo){
                $id = $row['id'];
            }
        }
        
    
    
    } 
    
    $result['id'] = "ola ke ase";    
    deliver_response(200, 'OK', json_encode($result));
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


// Esta función retorna la respuesta que se enviará
	// a la solicitud de ajax.
	// Parámetros:
	//   $status: código del estado (referencia: https://dev.twitter.com/docs/error-codes-responses)
	// 		200: OK
	// 		400: Bad Request
	//   $statusMessage: mensaje a mostrar para el valor de $status
	//   $data: el objeto a retornar.
	// Ejemplo:
	// deliver_response(200, 'OK', json_encode($ARRAY_CON_DATOS));
function deliver_response($status, $statusMessage, $data) {
    header("HTTP/1.1 $status $statusMessage");
    $response['status'] = $status;
    $response['status-message'] = $statusMessage;
    $response['data'] = $data;

    echo json_encode($response);
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