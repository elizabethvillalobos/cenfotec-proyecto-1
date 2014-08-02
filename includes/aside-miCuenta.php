<?php
switch ($currentSubModule) {
    case 'contraseña':
        $subModPassword = 'class="active"';
        break;
    default: 
        $subModPerfil = 'class="active"';
        break;
}
?>

<aside>
    <nav class="secondary-nav">
        <ul class="sec-nav-category accordion">
            <li class="accordion-item">
                <a href="/cenfotec-proyecto-1/configuracion/perfil.php" <?php echo $subModPerfil; ?>>Perfil</a>
            </li>
            <li class="accordion-item">
                <a href="/cenfotec-proyecto-1/configuracion/miCuenta.php" <?php echo $subModPassword; ?>>Cambiar contraseña</a>
            </li>
        </ul>
    </nav>
</aside>