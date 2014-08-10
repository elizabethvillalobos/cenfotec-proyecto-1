<?php
    require_once('../includes/functions.php');
    require_once(ROOT.'/includes/functions-usuarios.php');

    $currentModule = 'configuracion';
    $currentSubModule = 'usuarios';
?>

<!DOCTYPE html>
<html>
	<head>
		<title><?php echo APP_TITLE; ?></title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="/cenfotec-proyecto-1/css/bootstrap/css/bootstrap.css">
		<link rel="stylesheet" href="/cenfotec-proyecto-1/css/gic.css">
		<link rel="stylesheet" href="/cenfotec-proyecto-1/css/pages/configuracion.css">
	</head>
	<body>
		<div class="wrapper">
			<?php include(ROOT.'/includes/header.php'); ?>
            <?php include(ROOT.'/includes/aside-configuracion.php'); ?>

			<main class='usuarios'>
				<div class="mod-hd">
				    <h2>Usuarios</h2>
                </div>
                <div class="mod-bd">

                    <a class="crearUsuario btn btn-default flaticon-add73" href="/cenfotec-proyecto-1/configuracion/usuarioCrear.php">Crear usuario</a>
                    <div class="usuarios-filtros">
                        <span class="usuarios-filtros-label">Filtrar por rol:</span>
                        <span class="usuarios-filtro filtro-rector">Rector</span>
                        <span class="usuarios-filtro filtro-director-academico">Director académico</span>
                        <span class="usuarios-filtro filtro-profesor">Profesor</span>
                        <span class="usuarios-filtro filtro-estudiante">Estudiante</span>
                        <span class="usuarios-filtro filtro-asistente">Asistente</span>
                        <span class="usuarios-filtro filtro-mercadeo">Mercadeo</span>
                        
                    </div>
					<table class="lista-usuarios">
                        <tbody>
                            <?php mostrarUsuarios() ?>
                        </tbody>
                    </table>
				</div>
			</main>
			
            <?php include(ROOT.'/includes/footer.php'); ?>
		</div>

		<!-- Load JS -->
        <script src="/cenfotec-proyecto-1/js/vendors/jquery-1.8.3.min.js"></script>
        <script src="/cenfotec-proyecto-1/js/vendors/jquery-ui-1.10.3.custom.min.js"></script>
        <script src="/cenfotec-proyecto-1/js/vendors/bootstrap.min.js"></script>
        <script src="/cenfotec-proyecto-1/js/vendors/bootstrap-select.js"></script>
        <script src="/cenfotec-proyecto-1/js/vendors/flatui-checkbox.js"></script>
        <script src="/cenfotec-proyecto-1/js/vendors/flatui-radio.js"></script>
        <script src="/cenfotec-proyecto-1/js/gic.js"></script>
        <script src="/cenfotec-proyecto-1/js/common-logic.js"></script>
        <script src="/cenfotec-proyecto-1/js/configuracion.js"></script>
	</body>
</html>