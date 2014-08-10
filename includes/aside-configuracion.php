<?php
$subModUsuarios = '';
$subModGeneral = '';
$subModCarreras = '';

switch ($currentSubModule) {
    case 'usuarios':
        $subModUsuarios = 'class="active"';
        break;
    case 'general':
        $subModGeneral = 'class="active"';
        break;
    default: 
        $subModCarreras = 'class="active"';
        break;
}
?>

<aside>
    <nav class="secondary-nav">
        <ul class="sec-nav-category accordion">
            <li class="accordion-item">
                <a href="/cenfotec-proyecto-1/configuracion/carrerasConsultar.php" <?php echo $subModCarreras; ?> >Carreras y cursos</a>
            </li>
            <li class="accordion-item">
                <a href="/cenfotec-proyecto-1/configuracion/usuariosConsultar.php" <?php echo $subModUsuarios; ?>>Usuarios</a>
            </li>
            <li class="accordion-item">
                <a href="/cenfotec-proyecto-1/configuracion/configuracionGeneral-copia.php" <?php echo $subModGeneral; ?>>General</a>
            </li>
        </ul>
    </nav>
</aside>