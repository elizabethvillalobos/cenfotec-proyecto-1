
<?php
require_once('../includes/functions.php');

// Usuarios
function getUsuarios() {
	$query = "SELECT `tusuarios`.`nombre`, `tusuarios`.`apellido1`, `tusuarios`.`apellido2`, `tusuarios`.`id`, `trol`.`nombre` AS 'Rol' FROM tusuarios, trol WHERE `tusuarios`.`rol`=`trol`.`id`";

	return do_query($query);
}

/*
function insertarUsuario() {
	$query = "INSERT INTO gic_usuarios(email, nombre, apellido1, apellido2) VALUES ('evillalobos@ucenfotec.ac.cr', 'Elizabeth', 'Villalobos', 'Molina'), ('jbarboza@ucenfotec.ac.cr', 'Javier', 'Barboza', 'Solís'), ('dbarillas@ucenfotec.ac.cr', 'Diego', 'Barillas', 'Valverde'), ('jcerdas@ucenfotec.ac.cr', 'Jose', 'Cerdas', 'González'), ('mcoto@ucenfotect.ac.cr', 'Miguel', 'Coto', 'García'), ('osantamaria@ucenfotec.ac.cr', 'Oscar', 'Santamaría', 'Venegas')";

	return do_query($query);
}
*/

function mostrarUsuarios() {
	$usuarios = getUsuarios();

	while ($row = mysqli_fetch_assoc($usuarios)) {
		echo '<tr>';
        echo '<td>';
        echo '<a href="#">' . utf8_encode($row['nombre']).' '.utf8_encode($row['apellido1']).' '.utf8_encode($row['apellido2']);
        echo '</a>';
        echo '<span class="usuarios-email">'.utf8_encode($row['id']);
        echo '</span>';
        echo '</td>';
        echo '<td class="usuarios-rol">'.utf8_encode($row['Rol']);
        echo '</td>';
        echo '<td>';
        echo '<div class="usuarios-acciones">';
        echo '<a class="usuarios-deshabilitar" href="#">'."Deshabilitar";
        echo '</a>';
        echo '<a class="usuarios-modificar" href="/cenfotec-proyecto-1/configuracion/usuarioModificar.php">'."Modificar";
        echo '</a>';
        echo '<span class="flaticon-machine2">';
        echo '</span>';
        echo '</div>';
        echo '</td>';
        echo '</tr>';
	}
}

// Función que consulta las los profesores
	function getProfesores() {
		$query = "SELECT id FROM trol WHERE nombre = 'Profesor';";

		$queryResults = do_query($query);
		$jsonArray = [];
		$index = 0;
		$idProfesores=0;
		
		if (mysqli_num_rows($queryResults) > 0) {
			while ($row = mysqli_fetch_assoc($queryResults)) {
				$idProfesores = $row['id'];
			}			
		}
		if($idProfesores != 0){
			$query = "SELECT * FROM tusuarios WHERE rol='".$idProfesores."';";
			$queryResults = do_query($query);
		}
		
		while ($row = mysqli_fetch_assoc($queryResults)) {
			$results['activo'] = $row['activo'];
			$results['nombre'] = $row['nombre'].' '.$row['apellido1'].' '.$row['apellido2'];
			$results['carrera'] = $row['carrera'] == NULL ? '-' : $row['carrera'];
			$results['ranking'] = $row['ranking'];
			$results['id'] = $row['id'];
			$results['skypeid'] = $row['skypeid'];
			$results['telefono'] = $row['telefono'];
			$jsonArray['profesores'][$index] = $results;
			$index++;
		}

		mysqli_free_result($queryResults);

		return $jsonArray;
	}

function insertarUsuario(){
	if(isset($_POST['pnombre']) &&
		isset($_POST['papellido1']) && 
		isset($_POST['papellido2'])  && 
        isset($_POST['pavatar'])  &&
		isset($_POST['pidUsr'])&& 
        isset($_POST['pcontrasena'])&& 
		isset($_POST['ptelefono']) && 
		isset($_POST['pskype']) && 
		isset($_POST['prol']) && 
		isset($_POST['pcarrera']) && 
		isset($_POST['pcurso'])){
	
		$id = $_POST['pidUsr'];
		$contrasena = $_POST['pcontrasena'];
		$activo = '1';
        $nombre = utf8_decode($_POST['pnombre']);
        $apellido1 = utf8_decode($_POST['papellido1']);
        $apellido2 = utf8_decode($_POST['papellido2']);
        $avatar = $_POST['pavatar'];
        $skype = $_POST['pskype'];
        $rol = $_POST['prol'];
        $telefono = $_POST['ptelefono'];
        $carrera = $_POST['pcarrera'];
        $curso = $_POST['pcurso'];

		$query = "INSERT INTO tusuarios (id, contrasena, ranking, activo, nombre, apellido1, apellido2, imagen, skypeid, rol, telefono, carrera) VALUES ('$id', '$contrasena', null, '$activo', '$nombre', '$apellido1', '$apellido2', '$avatar', '$skype', '$rol', '$telefono', '$carrera')";

		$result = do_query($query);
	}

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