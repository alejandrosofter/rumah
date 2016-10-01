<?php
$model=  FacturasEntrantes::model();
	$vencimientos=$model->consultarVencidos();
	$porVencer=$model->consultarVencidos(7);
	$pendiente=$model->consultarVencidos(0,true);
	echo '<b>Vencido: </b>'. Yii::app()->numberFormatter->formatCurrency($vencimientos['importe'],"$").'('.CHtml::link($vencimientos['cantidad'].' Factura/s',Yii::app()->createUrl('facturasEntrantesVencimientos/consultarVencidas')) .')<br>';
	echo '<b>A Vencer: </b>'. Yii::app()->numberFormatter->formatCurrency($porVencer['importe'],"$") .'<br>';
	echo '<b>Pendiente: </b>'. Yii::app()->numberFormatter->formatCurrency($pendiente['importe'],"$").'('.CHtml::link($pendiente['cantidad'].' Factura/s',Yii::app()->createUrl('facturasEntrantesVencimientos/consultarPendientes')) .')<br>';
	?>