<?php
error_reporting(0);
require_once('../includes/functions.php');

function mostrarEvaluacionRealizadaXRol($puser,$prol){
	switch ($prol) {
		case 4:
			mostrarEvaluacionesRealizadasProf($puser);
			break;
		case 5:
			mostrarEvaluacionesRealizadasEst($puser);
			break;
		default:
			echo 'SU ROL NO APLICA A LAS EVALUACIONES';
			break;
	}

}


function obtenerEvaluacionesRealizadas($puser){
	
	$query = "SELECT * FROM tevaluaciones,tcitas WHERE tcitas.id=tevaluaciones.idCita AND tcitas.idSolicitante = '$puser' AND tevaluaciones.realizada = 1";
	$result = do_query($query);
	return $result;
}

function obtenerUsuarioEvaluado($pidCita){

	$query = "SELECT nombre,apellido1 FROM tusuarios,tcitas WHERE tusuarios.id = tcitas.idSolicitado AND tcitas.id = '$pidCita'";
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



function mostrarEvaluacionesRealizadasProf($puser) {
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
       

		echo $html;
}


function mostrarEvaluacionesRealizadasEst($puser) {
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
                                			<label class="">2)¿En qué grado el profesor cumplió con puntualidad a la cita?</label>
								        </div>

								        <div class="opcs">
										    <label id="promedio">'.utf8_encode($row['nota2']).'</label>
										</div>
								    </div>
                                
									<div class="form-row-ev">

										<div class="preguntas">
											<label class="" >3)¿En qué grado el profesor logró mantener un ambiente cordial y de respeto?</label>
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
	echo $html;
}

function mostrarEvaluacionPendienteXRol($puser,$prol){
	switch ($prol) {
		case 4:
			mostrarEvaluacionesPendientesProf($puser);
			break;
		case 5:
			mostrarEvaluacionesPendientesEst($puser);
			break;
		default:
			echo 'SU ROL NO APLICA A LAS EVALUACIONES';
			break;
	}

}

/***********************************************************************EVALUACIONES PENDIENTES INICIO**************************************************************************************/
function obtenerEvaluacionesPendientes($puser){
	
	$query = "SELECT * FROM tcitas  WHERE estado=4 AND tipo=0 AND idSolicitante = '$puser'";
	
	$result = do_query($query);
	return $result;
}

function mostrarEvaluacionesPendientesProf($puser) {
	$evaluacionesPendientes = obtenerEvaluacionesPendientes($puser);	

	while($row = mysqli_fetch_assoc($evaluacionesPendientes)){
		$html .='<ul class="accordion">';
        $html .=     '<li class="accordion-item ">
                        <a href="#">
                        	<p class="titulo2">
                        		<span class="stit2">Usuario a evaluar : '.obtenerUsuarioEvaluado($row['id']).'</span> <span>Fecha y hora finalización :'.obtenerFechayHoraCita($row['id']).'</span>
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

	echo $html;
}


function mostrarEvaluacionesPendientesEst($puser) {
	$evaluacionesPendientes = obtenerEvaluacionesPendientes($puser);	

	while($row = mysqli_fetch_assoc($evaluacionesPendientes)){
		$html .='<ul class="accordion">';
        $html .=     '<li class="accordion-item ">
                        <a href="#">
                        	<p class="titulo2">
                        		<span class="stit2">Usuario a evaluar : '.obtenerUsuarioEvaluado($row['id']).'</span> <span>Fecha y hora finalización :'.obtenerFechayHoraCita($row['id']).'</span>
                        	</p>
                        </a>

                        <div class="accordion-detail">
                            <form id="frm" class="form-evaluacion" action="/cenfotec-proyecto-1/evaluacion/evaluarCitaConfirm.php" method="post">
								<fieldset>
								<div class="msj-ev">
									<h2 >Formulario de evaluación de cita</h2>
									<div class="form-row-ev">
										<div id="pregunta1">
											<label class="">1)¿El profesor se presentó a la cita?</label>
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
                                			<label class="">2)¿En qué grado el profesor cumplió con puntualidad a la cita?</label>
								        </div>

								        <div class="opcs">	
								        	<input class="nbr"type="number" name="puntaje" min="1" max="5" value="3">
									    </div>
								    </div>
                                
									<div class="form-row-ev">

										<div class="preguntas">
											<label class="" >3)¿En qué grado el profesor logró mantener un ambiente cordial y de respeto?</label>
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
	echo $html;
}

/*********************************************************MI RANKING********************************************************************************************************/

function obtenerCalificaciones($idUser){
	$query = "SELECT nota2,nota3,nota4,nota5 FROM tevaluaciones,tcitas WHERE tcitas.idSolicitante='$idUser'";

	$result = do_query($query);

return $result;
}

function obtenerPromedios($idUser){

	$calificaciones = obtenerCalificaciones($idUser);
    $cont=0;
    $prmNot2=0;
    $prmNot3=0;
    $prmNot4=0;
    $prmNot5=0;

	while($row = mysqli_fetch_assoc($calificaciones)){

		$arraynota2[$cont].= $row['nota2'];
		$arraynota3[$cont].= $row['nota3'];
		$arraynota4[$cont].= $row['nota4'];
		$arraynota5[$cont].= $row['nota5'];
		$cont++;
	}
	$prmNot2=calcularPromedioArray($arraynota2);
	$prmNot3=calcularPromedioArray($arraynota3);
	$prmNot4=calcularPromedioArray($arraynota4);
	$prmNot5=calcularPromedioArray($arraynota5);

	$arrayPromedios=[$prmNot2,$prmNot3,$prmNot4,$prmNo5];
	$promRanking=calcularPromedioArray($arrayPromedios);
	$arrayPromedios=['nota2'=> $prmNot2,"nota3"=>$prmNot3,"nota4"=>$prmNot4,"nota5"=>$prmNot5,"ranking"=>$promRanking];

    return $arrayPromedios;
}

function calcularPromedioArray($arreglo){

	$sumatoria=0;
	$promedio=0;
	$cont=0;

	foreach ($arreglo as $nota ) {

		$sumatoria = $sumatoria + $nota;
		$cont++;
	}
	$promedio = $sumatoria/$cont;
	return $promedio;
}



function mostrarRanking($idUser){

	$arrayPromediosRanking = obtenerPromedios($idUser);


	echo         '<div id="rankDiv">
					
	 			    <div id="user">
							<h1><span>Mi ranking</span></h1>
				    </div>

					<div id ="puntuacion">
						
						<h1><span class="circulo">'.$arrayPromediosRanking['ranking'].'</span>Puntuación</h1>
					</div>

					<div id="cantidad">
						<span id="">Citas asistidas: 10 de 10</span>
					</div>
					
	             </div>';

     echo        '<table>
					<thead>
						<tr>
							<th>Criterio a evaluar</th>
							<th></th>
							<th class="center"></th>
							<th class="center">Promedio</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Puntualidad</td>
							<td></td>
							<td class="center"></td>
							<td class="center">'.$arrayPromediosRanking['nota2'].'</td>
						</tr>
						<tr>
							<td>Cordialidad y respeto</td>
							<td></td>
							<td class="center"></td>
							<td class="center">'.$arrayPromediosRanking['nota3'].'</td>
						</tr>
						<tr>
							<td>Colaboración</td>
							<td></td>
							<td class="center"></td>
							<td class="center">'.$arrayPromediosRanking['nota4'].'</td>
						</tr>
						<tr>
							<td>Satisfacción</td>
							<td></td>
							<td class="center"></td>
							<td class="center">'.$arrayPromediosRanking['nota5'].'</td>
						</tr>
						<tr>
							<td>Promedio obtenido</td>
							<td></td>
							<td class="center"></td>
							<td class="center">'.$arrayPromediosRanking['ranking'].'</td>
						</tr>
					</tbody>
			</table>';
			
}





?>
