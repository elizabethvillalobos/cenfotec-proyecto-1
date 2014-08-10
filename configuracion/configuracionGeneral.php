<?php
    require_once('../includes/functions.php');
    $currentModule = 'configuracion';
    $currentSubModule = 'general';
?>

<!DOCTYPE html>
<html>
	<head>
		<title><?php echo APP_TITLE; ?></title>
		<meta charset="utf-8">
		<link href="/cenfotec-proyecto-1/css/bootstrap/css/bootstrap.css" rel="stylesheet">
		<link rel="stylesheet" href="/cenfotec-proyecto-1/css/gic.css">
		<link rel="stylesheet" href="/cenfotec-proyecto-1/css/pages/configuracion.css">
	</head>
	<body>
		<div class="wrapper">
			<?php include(ROOT.'/includes/header.php'); ?>
            <?php include(ROOT.'/includes/aside-configuracion.php'); ?>

			<main id="mainCG">
				<ul class="accord">
                        <li class="accordion-item expanded">
                            <a href="#">Citas</a>
                            <ul class="accordion-detail">
                            	<div>
                            		<form class="frmC" action="/cenfotec-proyecto-1/configuracion/configuracionGeneralConfirm.php" method="post">

	                            		<div id="divTxtCit">
	                            			<label class="lbl">Dias de expiración de solicitud:</label>
		                            	</div>

		                            	<div id="divNbr">
		                            		<input class="nbr" type="number" name="puntaje" min="1" max="31" value="30">
		                            	</div>

		                            	<div  id="divBtnEvr">
											<button class="btn btn-primary" type="submit">Aplicar</button>
			                                
							            </div>

	                                </form>
                            	</div>
                            </ul>
                        </li>
                        <li class="accordion-item expanded">
                            <a href="#">Mensajería</a>
                            <div class="accordion-detail">

                            	<div>
                            		<form class="frmC" action="configuracionGeneralConfirm.html" method="post">

	                            		<div id="divTxtCit">
	                            			<label class="lbl">Máximo carateres por mensaje:</label>
		                            	</div>

		                            	<div id="divNbr">
		                            		<input class="nbr" type="number" name="puntaje" min="1" max="31" value="30">
		                            	</div>

		                            	<div  id="divBtnEvr">
											<button class="btn btn-primary" type="submit">Aplicar</button>
			                                
							            </div>

	                                </form>
                            	</div>                                

                            </div>
                        </li>
                        <li class="accordion-item expanded">
                            <a href="#">Notificaciones</a>
                            <div class="accordion-detail">

                            	<div>
                            		<form class="frmC" id="form-confGrl" action="configuracionGeneralConfirm.html" method="post" >

	                            		<div id="divTxtMail">
	                            			<label class="lbl">Servidor smtp:</label>
	                            			<input id="emailNot" type="text" placeholder="smtp" class="form-control" />
		                            	</div>

		                            	<div id="divMail">
		                            		<label class="lbl">Puerto:</label>
		                            		<input id="emailNot" type="text" placeholder="puerto" class="form-control" />
		                            		<p class="alert-error"></p>		                            		
		                            	</div>

		                            	<div id="divMail">
		                            		<label class="lbl">Smtp seguridad:</label>
		                            		<input id="emailNot" type="text" placeholder="ssl" class="form-control" />
		                            		<p class="alert-error"></p>		                            		
		                            	</div>

		                            	<div id="divMail">
		                            		<label class="lbl">Usuario:</label>
		                            		<input id="emailNot" type="text" placeholder="mail@ucenfotec.ac.cr" class="form-control" />
		                            		<p class="alert-error"></p>		                            		
		                            	</div>

		                            	<div id="divMail">
		                            		<label class="lbl">Clave:</label>
		                            		<input id="emailNot" type="text" placeholder="clave" class="form-control" />
		                            		<p class="alert-error"></p>		                            		
		                            	</div>

		                            	


		                            	<div  id="divBtnEvr">
											<button id="btnEvr"class="btn btn-primary" type="submit">Aplicar</button>			                                   
							            </div>							            
	                                </form>
                            	</div> 
                            	                               

                            </div>
                        </li>
                    </ul>
                 </main>   
			<footer>
				<p>2014 Universidad Cenfotec. Todos los derechos reservados.</p>
			</footer>
		</div>
		<!-- Load JS-->
		<script src="/cenfotec-proyecto-1/js/vendors/jquery-1.8.3.min.js"></script>
		<script src="/cenfotec-proyecto-1/js/vendors/jquery-ui-1.10.3.custom.min.js"></script>
        <script src="/cenfotec-proyecto-1/js/vendors/bootstrap.min.js"></script>
        <script src="/cenfotec-proyecto-1/js/vendors/bootstrap-select.js"></script>
		<script src="/cenfotec-proyecto-1/js/vendors/flatui-checkbox.js"></script>
		<script src="/cenfotec-proyecto-1/js/vendors/flatui-radio.js"></script>
        <script src="/cenfotec-proyecto-1/js/gic.js"></script>
        <script src="/cenfotec-proyecto-1/js/configuracion.js"></script>
        <script src="/cenfotec-proyecto-1/js/common-logic.js"></script> 
	</body>
</html>