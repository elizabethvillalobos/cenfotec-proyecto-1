<?php
    require_once('../includes/functions.php');
    require_once(ROOT.'/includes/functions-configuracionGeneral.php');

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

				<section class="modificar-curso">
				<ul class="accord">

                        <li class="accordion-item expanded">
                            <a href="#">Citas</a>
                            <ul class="accordion-detail">
                            	<div>
                            		<form class="frmC"  method="post">
                            			<?php $resultados = getDiasDeExpiracion(); ?>		
	                            		<div id="divTxtCit">
	                            			<label class="lbl">Dias de expiración de solicitud:</label>
		                            	</div>

		                            	<div id="divNbr">
		                            		<input class="nbr" type="number" name="puntaje" min="1" max="31" value="<?php echo utf8_encode($resultados['valor'])?>">
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
                            		<form class="frmC"   action="configuracionGeneralConfirm.php" method="post">
                            			<?php $resultado = getCaracteresParaModificar(); ?>		
	                            		<div id="divTxtCit">
	                            			<label class="lbl">Máximo carateres por mensaje:</label>
		                            	</div>

		                            	<div id="divNbr">
		                            		<input id="caracterMaximo" class="nbr" type="number" name="puntaje" min="1" max="31" value="<?php echo utf8_encode($resultado['valor'])?>" >
		                            	</div>

		                            	<div  id="divBtnEvr">
											<button id="modificarCaracteres" class="btn btn-primary" type="submit">Aplicar</button>
			                                
							            </div>

	                                </form>
                            	</div>                                

                            </div>
                        </li>
                        <li class="accordion-item expanded">
                            <a href="#">Notificaciones</a>
                            <div class="accordion-detail">

                            	<div>
                            		<form id="form-confGrl" action="configuracionGeneralConfirm.php" method="post" >
                            			
                            			<?php $result = getCorreoParaModificar(); ?>	

		                            	<div id="divMail">
		                            		<label class="lbl">Usuario (dirección de correo):</label>
		                            		<input id="emailNot" value="<?php echo utf8_encode($result['valor'])?>" type="text"  class="form-control" />
		                            		<p class="alert-error"></p>		                            		
		                            	</div>

		                            	<div id="divMail">
		                            		<label class="lbl">Clave:</label>
		                            		<input id="pass" placeholder="clave" class="form-control" />
		                            				                            		
		                            	</div>

		                            	<p class="alert-error1"></p>

		                            	<div  id="divBtnEvr">
											<button id="btnEvr"class="btn btn-primary" type="submit">Aplicar</button>			                                   
							            </div>							            
	                                </form>
                            	</div> 
                            	                               

                            </div>
                        </li>
                    </ul>
                 </main>   

			<?php include(ROOT.'/includes/footer.php'); ?>
		</div>
		<!-- Load JS-->
		<script src="/cenfotec-proyecto-1/js/configuracion.js"></script>
		<script src="/cenfotec-proyecto-1/js/configuracionGeneral.js"></script>
		<script src="/cenfotec-proyecto-1/js/vendors/jquery-1.8.3.min.js"></script>
		<script src="/cenfotec-proyecto-1/js/vendors/jquery-ui-1.10.3.custom.min.js"></script>
        <script src="/cenfotec-proyecto-1/js/vendors/bootstrap.min.js"></script>
        <script src="/cenfotec-proyecto-1/js/vendors/bootstrap-select.js"></script>
		<script src="/cenfotec-proyecto-1/js/vendors/flatui-checkbox.js"></script>
		<script src="/cenfotec-proyecto-1/js/vendors/flatui-radio.js"></script>
        <script src="/cenfotec-proyecto-1/js/gic.js"></script>
        <script src="/cenfotec-proyecto-1/js/common-logic.js"></script> 
	</body>
</html>