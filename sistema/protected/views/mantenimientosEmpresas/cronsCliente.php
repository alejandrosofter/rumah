<?php
$this->breadcrumbs=array(
	'Tareas Programadas Mantenimientos',
);

$this->menu=array(
	array('label'=>'Nueva Tareas Programada', 'url'=>array('/crons/createUsuario')),


);
?>
<h1>TAREAS PROGRAMADAS </h1>
        A continuacion se listan las tareas programadas sobre el mantenimiento: <br><br>
<?php
 if(count($model)==0)echo '<i>No se encuentran Tareas</i>';
 $i=1;
foreach ($model as $cron)
{
    echo '<b>'.(string)$i.'.- </b>';
    echo '<b> '. $cron['nombre'].'</b><br>';
    echo '<b>HORARIO: </b>'. $cron['horas']. ':'.$cron['minutos']. '<br><b>DIAS:</b> '. $cron['dias']. '<br>';
    echo '<b>MESES: </b>'. $cron['meses']. '<br>';
    echo '<b>DIAS SEMANA: </b>'. Crons::model()->getDia($cron['diasSemana']). '<br>';
    echo '<b>TIPO: </b>Tarea<br>';
    echo '<b>ENCARGADO: </b>'.$cron['encargado'].'<br>';
    echo '<b>SUPERVISOR: </b>'.$cron['supervisor'].'<br>';
    
    echo CHtml::link(CHtml::image('images/iconos/famfam/pencil.png').'editar','index.php?r=crons/update&id='.$cron['idCron']);
    echo '<br><br>';
}
?>
