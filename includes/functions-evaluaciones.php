<?php
error_reporting(0);
require_once('../includes/functions.php');

function obtenerEvaluacionesRealizadas($puser){
	
	$query = "SELECT * FROM tevaluaciones,tcitas WHERE tevaluaciones.realizada = 1 AND tcitas.idSolicitado  = '$puser'";
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



function mostrarEvaluacionesRealizadas($puser) {
	$evaluacionesRealizadas = obtenerEvaluacionesRealizadas($puser);	

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


function obtenerEvaluacionesPendientes($puser){
	
	$query = "SELECT * FROM tcitas  WHERE idSolicitado = '$puser'";
	$result = do_query($query);
	return $result;
}

function mostrarEvaluacionesPendientes($puser) {
	$evaluacionesPendientes = obtenerEvaluacionesPendientes($puser);	

	while($row = mysqli_fetch_assoc($evaluacionesPendientes)){
		$html .='<ul class="accordion">';
        $html .=     '<li class="accordion-item ">
                        <a href="#">
                        	<p class="titulo2">
                        		<span class="stit2">Usuario a evaluar: <span>Juan Carlos Brenes Álvarez</span></span><span>Fecha: <span>23/07/14 Hora: 7:00pm</span></span>
                        	</p>
                        </a>

                        <div class="accordion-detail">
                            <form id="frm" class="form-evaluacion" action="/cenfotec-proyecto-1/evaluacion/evaluarCitaConfirm.php" method="post">
								<fieldset>
								<div class="msj-ev">
									<h2 >Formulario de evaluación de cita</h2>
									<div class="form-row-ev">
										<div id="pregunta1">
											<label class="">1)¿El estudiante se presentó a la cita?</label>
										</div>

										<div class="opcs">
											<label class="radio">												
				                                <input type="radio" name="group1" value="si" data-toggle="radio">SI
				                            </label>
				                        </div>

			                            <div class="opcs">
			                            	<label class="radio">			                            		
			                            		<input type="radio" name="group1" value="no" data-toggle="radio" >NO
			                                </label>
									    </div>
								    </div> 

								</div>
								
                                <div class="wrapperItems"> 
                                	<p>A continuación para cada pregunta los indicadores: 5 = plenamente satisfactorio, 4 = muy satisfactorio, 3 = satisfactorio , 2 = no satisfatorio, 1 = totalmente insatisfactorio.</p>

                                	<div class="form-row-ev"> 
                                		<div class="preguntas">
                                			<label class="">2)¿En qué grado el estudiante cumplió con puntualidad a la cita?</label>
								        </div>

								        <div class="opcs">	
								        	<input class="nbr"type="number" name="puntaje" min="1" max="5" value="3">
									    </div>
								    </div>
                                
									<div class="form-row-ev">

										<div class="preguntas">
											<label class="" >3)¿En qué grado el estudiante logró mantener un ambiente cordial y de respeto?</label>
										</div>

										<div class="opcs">
										    <input class="nbr" type="number" name="puntaje" min="1" max="5" value="3">
										</div>

									</div>

									<div class="form-row-ev">	

										<div class="preguntas">
											<label class="" >4)¿En qué grado la cita logró aclarar las dudas o temas a repasar?</label>  
										</div>

										<div class="opcs">
										    <input class="nbr" type="number" name="puntaje" min="1" max="5" value="3">
										</div>

									</div>

									<div class="form-row-ev">	
										<div class="preguntas">
											<label class="">5)A nivel general, ¿cómo calificaría su satisfacción con la cita?</label>
										</div>

										<div class="opcs">
										    <input class="nbr" type="number" name="puntaje" min="1" max="5" value="3">
										</div>

									</div>										

									<div class="form-row-ev">

										<div class="preguntas">
											<label class="" >Promedio obtenido en esta cita : </label>
										</div>

										<div class="opcs">
										    <label id="promedio">3</label>
										</div>

									</div>	

								</div>

								<div class="form-row form-row-button">
									<button class="btn btn-primary" id="">Enviar</button>							        
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
