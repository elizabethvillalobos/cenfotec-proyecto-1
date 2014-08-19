<?php
	require_once('../includes/functions.php');
	require_once(ROOT.'/includes/functions-evaluaciones.php');
	 
	$currentModule = 'evaluacion';
	$currentSubModule = 'evaluacionesPendientes'; 
?>

<!DOCTYPE html>
<html>
	<head>
		<title><?php echo APP_TITLE; ?></title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="/cenfotec-proyecto-1/css/bootstrap/css/bootstrap.css">
		<link rel="stylesheet" href="/cenfotec-proyecto-1/css/gic.css">
		<link rel="stylesheet" href="/cenfotec-proyecto-1/css/pages/evaluacion.css">
	</head>
	<body>
		<div class="wrapper">
			<?php include(ROOT.'/includes/header.php'); ?>
			<?php include(ROOT.'/includes/aside-evaluacion.php'); ?>

			<main>
				<ul class="accordion">
                    <li class="accordion-item expanded">
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
                </li>



                <li class="accordion-item">
                    <a href="#">
                        	<p class="titulo2">
                        		<span class="stit2">Usuario a evaluar: <span>Luis Guzmán</span></span><span>Fecha: <span>23/07/14 Hora: 7:00pm</span></span>
                        	</p>
                        </a>
                    <div class="accordion-detail">
                        <form id="frm" class="form-evaluacion" action="evaluarCitaConfirm2.html" method="post">
								<fieldset>
									<div class="msj-ev">
									<h2>Formulario de evaluación de cita</h2>									

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
											<label class="" >Promedio obtenido en esta cita:</label>
										</div>

										<div class="opcs">
										    <label id="promedio">3</label>
										</div>

									</div>	

								</div>

								<div class="form-row form-row-button">
									<button class="btn btn-primary">Enviar</button>							        
						        </div>

							</fieldset>
				        </form>
                    </div>
                </li>

                <li class="accordion-item">
                    <a href="#">
                        	<p class="titulo2">
                        		<span class="stit2">Usuario a evaluar: <span>Ernesto Rivera</span></span><span>Fecha: <span>28/07/14 Hora: 5:00pm</span></span>
                        	</p>
                        </a>
                    <div class="accordion-detail">
                        <form id="frm" class="form-evaluacion" action="evaluarCitaConfirm3.html" method="post">
								<fieldset>
									<div class="msj-ev">
									<h2>Formulario de evaluación de cita</h2>									

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
											<label class="" >Promedio obtenido en esta cita:</label>
										</div>

										<div class="opcs">
										    <label id="promedio">3</label>
										</div>

									</div>	

								</div>

								<div class="form-row form-row-button">
									<button class="btn btn-primary">Enviar</button>							        
						        </div>

							</fieldset>
				        </form>
                    </div>
                </li>
             </ul>
            </main>
			
			<?php include(ROOT.'/includes/footer.php'); ?>
		</div>

		<script src="/cenfotec-proyecto-1/js/vendors/jquery-1.8.3.min.js"></script>
        <script src="/cenfotec-proyecto-1/js/vendors/jquery-ui-1.10.3.custom.min.js"></script>
        <script src="/cenfotec-proyecto-1/js/vendors/bootstrap.min.js"></script>
        <script src="/cenfotec-proyecto-1/js/vendors/bootstrap-select.js"></script>
        <script src="/cenfotec-proyecto-1/js/vendors/flatui-radio.js"></script>
        <script src="/cenfotec-proyecto-1/js/flatui.js"></script>
        <script src="/cenfotec-proyecto-1/js/common-logic.js"></script>	
        <script src="/cenfotec-proyecto-1/js/evaluacion.js"></script>
	</body>
</html>