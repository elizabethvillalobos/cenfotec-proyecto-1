<?php
	error_reporting(0);
	require_once('../includes/functions.php');

function getCarreras(){
	$query = 'SELECT * FROM tcarrera';
	$result = do_query($query);
	return $result;
}

function displayCarreras() {
	$carreras = getCarreras();
	
	while($row = mysqli_fetch_assoc($carreras)){
		$html .= '<div class="accordion-group">';	
		$html .= '<div class="accordion-heading">
					<a class="accordion-toggle collapsed" href="#collapseTwo_'.$row['id'].'" data-parent="#basic-accordion"
						data-toggle="collapse">'.utf8_encode($row['nombre']).'</a>
				  </div>';
		$html .= '<div id="collapseTwo_'.$row['id'].'" class="accordion-body collapse">
							<div class="accordion-inner">
								<form class="detalleCarrera" action="#" method="post">
									<div class="colorDetalleCarrera">
									<fieldset>
										<div class="form-row">
											<label for="text1">Código:</label>
											<input id="text1" type="text" placeholder="codigo de carrera" value="'.$row['id'].'" class="form-control1" 
												readonly="readonly"/>
										</div>
										<div class="form-row">
											<label for="text2">Director académico:</label>
											<input id="text2" type="text" value="'.$row['idDirector'].'" placeholder="María Eugenia Ucrós" 
												class="form-control1" readonly="readonly"/>
										</div>
										<div class="form-row">
											<a href="consultarCursosDesarrollo.html" class="flaticon-list40">Ver cursos</a>
										</div>
										<div class="form-row form-row-buttonAcciones" id="'.$row['id'].'">
											<input type="button" class="btn btn-secondaryAction" id="btn_enable" '.($row['activo'] == 1? 'disabled' : '').' 
												value="Habilitar">
											<input type="button" class="btn btn-secondaryAction" id="btn_disable" '.($row['activo'] == 1? '' : 'disabled').' 
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
	if(isset($_POST['pCodigo']) &&
		isset($_POST['pNombre']) && 
		isset($_POST['pDirector'])) {
	
		$codigo = $_POST['pCodigo'];
		$nombre = $_POST['pNombre'];
		$director = $_POST['pDirector'];

<<<<<<< HEAD
		$query = "INSERT INTO tcarrera VALUES" . "('$codigo', '$nombre', '$director',1)";
=======
		$query = "INSERT INTO tcarrera(id, nombre, idDirector, activo) VALUES ('$codigo', '$nombre', '$director', '1')";
>>>>>>> origin/master

		$result = do_query($query);
	}
}

<<<<<<< HEAD

if($_SERVER['REQUEST_METHOD']=="POST"){
	$funcion = $_POST['call'];
	

	if(function_exists('$funcion')) {        
	    call_user_func('$funcion');
	} else {
	    echo ' Function :'.$funcion.' No Existe!!';
=======
if($_SERVER['REQUEST_METHOD']=="POST") {
	$function = $_POST['call'];
	if(function_exists($function)) {        
	    call_user_func($function);
	} else {
	    echo 'Function Not Exists!!';
>>>>>>> origin/master
	}
}

/*INSERTAR CARRERA, JAVIER BARBOZA*/

?>