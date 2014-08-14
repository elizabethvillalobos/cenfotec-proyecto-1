<?php

error_reporting(0);
require_once('../includes/functions.php');

function getCarrerasDirector(){
	$query = 'SELECT tcarrera.id as carreraId, tcarrera.nombre as carreraNombre, tcarrera.activo as carreraActiva, tusuarios.nombre as directorNombre, tusuarios.apellido1 as directorApellido1, tusuarios.apellido2 as directorApellido2 '.
			 'FROM tcarrera, tusuarios WHERE tcarrera.idDirector = tusuarios.id ORDER BY tcarrera.nombre';
	$result = do_query($query);
	return $result;
}

function displayCarreras() {
	$carreras = getCarrerasDirector();
	
	while($row = mysqli_fetch_assoc($carreras)){
		$html .= '<div class="accordion-group">';	
		$html .= '<div class="accordion-heading">
					<a class="accordion-toggle collapsed" href="#collapseTwo_'.utf8_encode($row['carreraId']).'" data-parent="#basic-accordion"
						data-toggle="collapse">'.utf8_encode($row['carreraNombre']).'</a>
				  </div>';
		$html .= '<div id="collapseTwo_'.$row['carreraId'].'" class="accordion-body collapse">
							<div class="accordion-inner">
								<form class="detalleCarrera" action="#" method="post">
									<div class="colorDetalleCarrera">
									<fieldset>
										<div class="form-row">
											<label for="text1">Código:</label>
											<input id="text1" type="text"  placeholder="'.utf8_encode($row['carreraId']).'"  class="form-control1" 
												readonly="readonly"/>
										</div>
										<div class="form-row">
											<label for="text2">Director académico:</label>
											<input id="text2" type="text" placeholder="'.utf8_encode($row['directorNombre']).' '.utf8_encode($row['directorApellido1']).' '.utf8_encode($row['directorApellido2']).'" 
												class="form-control1" readonly="readonly"/>
										</div>
										<div class="form-row">
											<a href="consultarCursos.php?idCarrera='.utf8_encode($row['carreraId']).'" class="flaticon-list40">Ver cursos</a>
										</div>
										<div class="form-row form-row-buttonAcciones" id="'.utf8_encode($row['carreraId']).'">
											<input type="button" class="btn btn-secondaryAction" id="btn_enable" '.($row['carreraActiva'] == 1? 'disabled' : '').' 
												value="Habilitar">
											<input type="button" class="btn btn-secondaryAction" id="btn_disable" '.($row['carreraActiva'] == 1? '' : 'disabled').' 
												value="Deshabilitar">
											<input type="button" class="btn btn-secondaryAction" id="btnModificar" 
												value="Modificar" >
										</div>
									</fieldset>
									</div>
								</form>
							</div>
						</div>
					</div>';		  
	}
	$html .= '</div>';
	return $html;
}

/*INSERTAR CARRERA, JAVIER BARBOZA*/

function crearCarrera(){
	if (isset($_POST['pCodigo']) &&
		isset($_POST['pNombre']) && 
		isset($_POST['pDirector'])) {
	
		$codigo = $_POST['pCodigo'];
		$nombre = $_POST['pNombre'];
		$director = $_POST['pDirector'];

		$query = "INSERT INTO tcarrera(id, nombre, idDirector, activo) VALUES ('$codigo', '$nombre', '$director', '1')";
		$result = do_query($query);          


	}
}



if($_SERVER['REQUEST_METHOD']=="POST") {
	$function = $_POST['call'];
	if(function_exists($function)) {        
	    call_user_func($function);
	} else {
	    echo 'Function Not Exists!!';

		$result = do_query($query);

		echo $result;
	}
}

// obtener directores academicos  
function obtenerDirectores(){
	$query = "SELECT * FROM tusuarios WHERE rol=3 AND activo=1";
	$result = do_query($query);

	return $result;
}


function mostrarDirectores() {
	$directores = obtenerDirectores();

	while($row = mysqli_fetch_assoc($directores)){
		echo '<option value='.$row['id'].' > '.utf8_encode($row['nombre']).' '.utf8_encode($row['apellido1']).'</option>';
	}

}

/*INSERTAR CARRERA, JAVIER BARBOZA*/

if($_SERVER['REQUEST_METHOD']=="POST") {
	$function = $_POST['call'];
	if(function_exists($function)) {        
	    call_user_func($function);
	} else {
	    echo 'Function Not Exists!!';
	}
}

?>