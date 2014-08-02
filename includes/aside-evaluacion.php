<?php
switch ($currentSubModule) {
    case 'evaluacionesPendientes':
        $subModEvaluaciones = 'class="active"';
        $subModEvaluacionesPendientes = 'class="active"';
        break;
    case 'evaluacionesRealizadas':
        $subModEvaluaciones = 'class="active"';
        $subModEvaluacionesRealizadas = 'class="active"';
        break;
    default: 
        $subModMiRanking = 'class="active"';
        break;
}
?>

<aside>
    <nav class="secondary-nav">
        <ul class="sec-nav-category accordion">
        	<li class="accordion-item">
        		<a href="/cenfotec-proyecto-1/evaluacion/miRanking.php" <?php echo $subModMiRanking; ?> >Mi ranking</a>
        	</li>

            <li class="accordion-item <?php if ($currentSubModule == 'evaluacionesPendientes' || $currentSubModule == 'evaluacionesRealizadas') { echo ' expanded'; } ?>" >
                <a href="/cenfotec-proyecto-1/evaluacion/evaluarCita.php" <?php echo $subModEvaluaciones; ?> >Evaluaciones</a>
                <ul class="thrd-nav-category accordion-detail">
                    <li><a href="/cenfotec-proyecto-1/evaluacion/evaluarCita.php" <?php echo $subModEvaluacionesPendientes; ?> >Pendientes</a></li>
                    <li><a href="/cenfotec-proyecto-1/evaluacion/consultarEvaluacionesRealizadas.php" <?php echo $subModEvaluacionesRealizadas; ?> >Realizadas</a></li>   
                </ul>
            </li>                   
        </ul>
    </nav>
</aside>