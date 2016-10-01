<?php
$modelOrdenes=  OrdenesTrabajo::model();
//	$pendientes=$modelTareas->consultarPendientes();
	$ordenes=$modelOrdenes->consultarPendientes();
	//echo '<b>Tareas Pendientes: </b>'.'('.CHtml::link($pendientes['cantidad'].' Tarea/s',Yii::app()->createUrl('tareas/tareasPendientes')) .')<br>';
	echo '<b>Ordenes Pendientes: </b>'.'('.CHtml::link($ordenes['cantidad'].' Orden/es',Yii::app()->createUrl('ordenesTrabajo/paraRealizar')) .')<br>';
	
	?>