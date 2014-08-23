<?php
	session_start(); 
	error_reporting(0);
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
				<section class="modificar-expiracion-solicitudes">
				<ul class="accord">
                    <li class="accordion-item expanded">
                        <a href="#">Citas</a>
                        <ul class="accordion-detail">
                           	<div>
                         	   	<form class="frmC" action="" method="post" data-validate="true" novalidate>
                         	   		<?php $results = getDiasDeExpiracion(); ?>	
	                            	<div id="divTxtCit">
	                            		<label class="lbl">Días de expiración de solicitud:</label>
		                            </div>
		                            <div id="divNbr" class="form-row">
		                            	<input id="diasExpiracion" class="nbr form-control" type="number" name="puntaje" min="1" max="31" value="<?php echo utf8_encode($results['valor'])?>">
		                            </div>
		                            <div id="divBtnEvr">
			                            <button id="modificarDias" class="btn btn-primary" type="button">Aplicar</button>
							        </div>
	                           	</form>
                            </div>
                        </ul>
                    </li>
                    <li class="accordion-item expanded">
                    	<a href="#">Mensajería</a>
                        <div class="accordion-detail">
                        	<div>
                            	<form class="frmC" action="" method="post" data-validate="true" novalidate>
                            		<?php $caracteres = getCaracteres(); ?>		
	                            	<div id="divTxtCit">
	                            			<label class="lbl">Máximo carateres por mensaje:</label>
		                            </div>
		                          	<div id="divNbr" class="form-row">
		                            	<input id="caracteresMaximo" class="nbr form-control" type="number" name="puntaje" min="1" max="160" value="<?php echo utf8_encode($caracteres['valor'])?>">
		                            </div>
		                            <div  id="divBtnEvr">
										<button id="modificarCaracteres" class="btn btn-primary" type="button">Aplicar</button>    
							        </div>
	                            </form>
                            </div>                                
                        </div>
                    </li>
                    <li class="accordion-item expanded">
                        <a href="#">Notificaciones</a>
                        <div class="accordion-detail">
                        	<div>
                            	<form id="form-confGrl" action="" method="post" data-validate="true" novalidate>		
                            		<?php 
                            			$correo = getCorreo(); 
                            			$clave = getClave();
                            		?>		
		                            
		                            <div>
		                            	<label class="lbl">Usuario (dirección de correo):</label>
		                            	<input id="email" value="<?php echo utf8_encode($correo['valor'])?>" type="text" class="form-control">
		                            	
		                            </div>
		                            
		                            <div>
		                            	<label class="lbl">Clave:</label>
		                            	<input id="password" type="password" value="<?php echo utf8_encode($clave['valor'])?>" class="form-control">	                            		
		                            	
		                            </div>
		                            
		                            <div id="divBtnEvr">
										<button id="modificarNotificaciones"class="btn btn-primary" type="button">Aplicar</button>			                                   
							        </div>									            
	                            </form>
                            </div> 	                               
                        </div>
                    </li>
                </ul>
            </main>   
			<?php include(ROOT.'/includes/footer.php'); ?>
		</div>
		<script src="/cenfotec-proyecto-1/js/vendors/jquery-1.8.3.min.js"></script>
		<script src="/cenfotec-proyecto-1/js/common-logic.js"></script>
		<script src="/cenfotec-proyecto-1/js/configuracionGeneral.js"></script>
	</body>
</html>