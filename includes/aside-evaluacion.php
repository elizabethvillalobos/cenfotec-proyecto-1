<?php
if ($currentSubModule == 'miRanking') { 
    $miRanking = 'class="active"';
}

if ($currentSubModule == 'evaluacionesPendientes') { 
    $evaluaciones = 'class="active"';
    $evaluacionesPendientes = 'class="active"';
}

if ($currentSubModule == 'evaluacionesRealizadas') { 
    $evaluaciones = 'class="active"';
    $evaluacionesRealizadas = 'class="active"';
}
?>

<aside>
    <nav class="secondary-nav">
        <ul class="sec-nav-category accordion">
        	<li class="accordion-item">
        		<a href="/cenfotec-proyecto-1/evaluacion/miRanking.php" <?php echo $miRanking; ?> >Mi ranking</a>
        	</li>

            <li class="accordion-item <? if ($currentSubModule == 'evaluacionesPendientes' || $currentSubModule == 'evaluacionesRealizadas') { echo ' expanded'; } ?>" >
                <a href="/cenfotec-proyecto-1/evaluacion/evaluarCita.php" <?php echo $evaluaciones; ?> >Evaluaciones</a>
                <ul class="thrd-nav-category accordion-detail">
                    <li><a href="/cenfotec-proyecto-1/evaluacion/evaluarCita.php" <?php echo $evaluacionesPendientes; ?> >Pendientes</a></li>
                    <li><a href="/cenfotec-proyecto-1/evaluacion/consultarEvaluacionesRealizadas.php" <?php echo $evaluacionesRealizadas; ?> >Realizadas</a></li>   
                </ul>
            </li>                   
        </ul>
    </nav>
</aside>