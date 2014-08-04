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

                    <a class="crearUsuario btn btn-default flaticon-add73" href="/cenfotec-proyecto-1/configuracion/usuariosCrear.php">Crear usuario</a>
                    <div class="usuarios-filtros">
                        <span class="usuarios-filtros-label">Filtrar por rol:</span>
                        <span class="usuarios-filtro filtro-estudiante">Estudiante</span>
                        <span class="usuarios-filtro filtro-profesor">Profesor</span>
                        <span class="usuarios-filtro filtro-director-academico">Director académico</span>
                        <span class="usuarios-filtro filtro-rector">Rector</span>
                        <span class="usuarios-filtro filtro-mercadeo">Mercadeo</span>
                        <span class="usuarios-filtro filtro-administrador">Administrador</span>
                    </div>
                    <table class="lista-usuarios">
                        <tbody>
                            <tr>
                                <td class="usuarios-nombre">
                                    <a href="#">Diego Barillas Valverde</a>
                                    <span class="usuarios-email">dbarillasv@ucenfotec.ac.cr</span>
                                    </td>
                                <td class="usuarios-rol">Estudiante</td>
                                <td class="usuarios-acciones">
                                    <div>
                                        <span class="flaticon-machine2"></span>
                                        <!-- <a class="usuarios-habilitar" href="#">Habilitar</a> -->
                                        <a class="usuarios-deshabilitar" href="#">Deshabilitar</a>
                                        <a class="usuarios-modificar" href="/cenfotec-proyecto-1/configuracion/usuariosModificar.php">Modificar</a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="usuarios-nombre">
                                    <a href="#">Juan Carlos Brenes Álvarez</a>
                                    <span class="usuarios-email">jbrenesa@ucenfotec.ac.cr</span>
                                </td>
                                <td class="usuarios-rol">Estudiante</td>
                                <td class="usuarios-acciones">
                                    <div>
                                        <span class="flaticon-machine2"></span>
                                        <!-- <a class="usuarios-habilitar" href="#">Habilitar</a> -->
                                        <a class="usuarios-deshabilitar" href="#">Deshabilitar</a>
                                        <a class="usuarios-modificar" href="/cenfotec-proyecto-1/configuracion/usuariosModificar.php">Modificar</a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="usuarios-nombre">
                                    <a href="#">Álvaro Cordero Peña</a>
                                    <span class="usuarios-email">acordero@ucenfotec.ac.cr</span>
                                </td>
                                <td class="usuarios-rol">Profesor</td>
                                <td class="usuarios-acciones">
                                    <div>
                                        <span class="flaticon-machine2"></span>
                                        <!-- <a class="usuarios-habilitar" href="#">Habilitar</a> -->
                                        <a class="usuarios-deshabilitar" href="#">Deshabilitar</a>
                                        <a class="usuarios-modificar" href="/cenfotec-proyecto-1/configuracion/usuariosModificar.php">Modificar</a>
                                    </div>
                                </td>
                            </tr>
                            <tr class="usuarios-deshabilitado">
                                <td class="usuarios-nombre">
                                    Susana Fuentes Morales
                                    <span class="usuarios-email">sfuentesm@ucenfotec.ac.cr</span>
                                </td>
                                <td class="usuarios-rol">Estudiante</td>
                                <td class="usuarios-acciones">
                                    <div>
                                        <span class="flaticon-machine2"></span>
                                        <!-- <a class="usuarios-habilitar" href="#">Habilitar</a> -->
                                        <a class="usuarios-deshabilitar" href="#">Deshabilitar</a>
                                        <a class="usuarios-modificar" href="/cenfotec-proyecto-1/configuracion/usuariosModificar.php">Modificar</a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="usuarios-nombre">
                                    <a href="#">Luis Guzmán Valverde</a>
                                    <span class="usuarios-email">lguzmanv@ucenfotec.ac.cr</span>
                                </td>
                                <td class="usuarios-rol">Estudiante</td>
                                <td class="usuarios-acciones">
                                    <div>
                                        <span class="flaticon-machine2"></span>
                                        <!-- <a class="usuarios-habilitar" href="#">Habilitar</a> -->
                                        <a class="usuarios-deshabilitar" href="#">Deshabilitar</a>
                                        <a class="usuarios-modificar" href="/cenfotec-proyecto-1/configuracion/usuariosModificar.php">Modificar</a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="usuarios-nombre">
                                    <a href="#">Marcela Madriz López</a>
                                    <span class="usuarios-email">mmadrizl@ucenfotec.ac.cr</span>
                                </td>
                                <td class="usuarios-rol">Estudiante</td>
                                <td class="usuarios-acciones">
                                    <div>
                                        <span class="flaticon-machine2"></span>
                                        <!-- <a class="usuarios-habilitar" href="#">Habilitar</a> -->
                                        <a class="usuarios-deshabilitar" href="#">Deshabilitar</a>
                                        <a class="usuarios-modificar" href="/cenfotec-proyecto-1/configuracion/usuariosModificar.php">Modificar</a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="usuarios-nombre">
                                    <a href="#">Pablo Monestel</a>
                                    <span class="usuarios-email">pmonestel@ucenfotec.ac.cr</span>
                                </td>
                                <td class="usuarios-rol">Director académico</td>
                                <td class="usuarios-acciones">
                                    <div>
                                        <span class="flaticon-machine2"></span>
                                        <!-- <a class="usuarios-habilitar" href="#">Habilitar</a> -->
                                        <a class="usuarios-deshabilitar" href="#">Deshabilitar</a>
                                        <a class="usuarios-modificar" href="/cenfotec-proyecto-1/configuracion/usuariosModificar.php">Modificar</a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="usuarios-nombre">
                                    <a href="#">Walter Torres García</a>
                                    <span class="usuarios-email">wtorresg@ucenfotec.ac.cr</span>
                                </td>
                                <td class="usuarios-rol">Estudiante</td>
                                <td class="usuarios-acciones">
                                    <div>
                                        <span class="flaticon-machine2"></span>
                                        <!-- <a class="usuarios-habilitar" href="#">Habilitar</a> -->
                                        <a class="usuarios-deshabilitar" href="#">Deshabilitar</a>
                                        <a class="usuarios-modificar" href="/cenfotec-proyecto-1/configuracion/usuariosModificar.php">Modificar</a>
                                    </div>
                                </td>
                            </tr>
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
	</body>
</html>