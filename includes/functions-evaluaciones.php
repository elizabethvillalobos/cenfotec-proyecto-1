<?php

error_reporting(0);
require_once('../includes/functions.php');

function obtenerEvaluacionesRealizadas(){
	
	$query = "SELECT * FROM tevaluaciones WHERE realizada =1";
	$result = do_query($query);
	return $result;
}

function obtenerUsuarioEvaluado($pidCita){

	$query = "SELECT nombre,apellido1 FROM tusuarios,tcitas WHERE tusuarios.id = tcitas.idSolicitado and tcitas.id = '$pidCita'";
	$result = do_query($query);
	$user= mysqli_fetch_assoc($result);
    $nombreApellido = $user['nombre'].' '.$user['apellido1'];

	return utf8_encode($nombreApellido);	
}

function obtenerFechayHoraCita($pidCita){

	$query = "SELECT fechaFin FROM tcitas WHERE id = '$pidCita'";
	$result = do_query($query);
	$horaFinal= mysqli_fetch_assoc($result);
	return utf8_encode($horaFinal['fechaFin']);	
}

function obtenerPromedioCita($pidCita){

	$query = "SELECT nota2,nota3,nota4,nota5 FROM tevaluaciones WHERE idCita = '$pidCita'";
	$result = do_query($query);
	$notas= mysqli_fetch_assoc($result);
	$sumatoria=0;
	$promedio=0;
	$cont=0;

	foreach ($notas as $nota ) {

		$sumatoria = $sumatoria + $nota;
		$cont++;
	}
	$promedio = $sumatoria/$cont;
	return $promedio;		
}



function mostrarEvaluacionesRealizadas() {
	$evaluacionesRealizadas = obtenerEvaluacionesRealizadas();	

	while($row = mysqli_fetch_assoc($evaluacionesRealizadas)){
		$html .='<ul class="accordion">';
		$html .= '<li class="accordion-item ">
                    <a href="#">
                        	<p class="titulo2">
                        		<span class="stit2">Usuario evaluado : '.obtenerUsuarioEvaluado($row['idCita']).'</span> <span>Fecha y hora finalización :'.obtenerFechayHoraCita($row['idCita']).' </span>
                        	</p>
                        </a>
                    <div class="accordion-detail">
                            <form id="frm" action="#" method="post">
								<fieldset>
									<h2 >Cita evaluada</h2>

									<div class="form-row-ev">
										<div id="pregunta1A">
											<label class="">Preguntas y puntaje obtenido por pregunta.</label>
										</div>

										<div class="opcs">
										    <label id="promedio">Puntos</label>
										</div>
	
								    </div>

								<!-- Javier: hay que agregarle la clase wrapperItems a todos los 
								divs que tienen los campos cuando se responde que si -->
                                <div class="wrapperItems.visible"> 

                                	<div class="form-row-ev"> 
                                		<div class="preguntas">
                                			<label class="">2)¿En qué grado el estudiante cumplió con puntualidad a la cita?</label>
								        </div>

								        <div class="opcs">
										    <label id="promedio">'.utf8_encode($row['nota2']).'</label>
										</div>
								    </div>
                                
									<div class="form-row-ev">

										<div class="preguntas">
											<label class="" >3)¿En qué grado el estudiante logró mantener un ambiente cordial y de respeto?</label>
										</div>

										<div class="opcs">
										    <label id="promedio">'.utf8_encode($row['nota3']).'</label>
										</div>

									</div>

									<div class="form-row-ev">	

										<div class="preguntas">
											<label class="" >4)¿En qué grado la cita logró aclarar las dudas o temas a repasar?</label>  
										</div>

										<div class="opcs">
										    <label id="promedio">'.utf8_encode($row['nota4']).'</label>
										</div>

									</div>

									<div class="form-row-ev">	
										<div class="preguntas">
											<label class="">5)A nivel general, ¿cómo calificaría su satisfacción con la cita?</label>
										</div>

										<div class="opcs">
										    <label id="promedio">'.utf8_encode($row['nota5']).'</label>
										</div>

									</div>										

									<div class="form-row-ev">

										<div class="preguntas">
											<label class="" >Promedio de la cita:</label>
										</div>

										<div class="opcs">
										    <label id="promedio">'.obtenerPromedioCita($row['idCita']).'</label>
										</div>

									</div>	

								</div>								

							</fieldset>
				        </form>
                    </div>
                </li>';                
        }
    $html .=  '</ul>';  


	return $html;
}

?>
