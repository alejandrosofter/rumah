<?php
$model=FacturasSalientes::model();
	$hoy=$model->consultarFacturado('hoy');
	$mes=$model->consultarFacturado('mes');
	$mesActual=Date('m');
	$anoActual=Date('Y');
	$diaActual=Date('d');
	$rutaHoy="index.php?r=impresiones/create&tipoImpresion=saldoEmpresa&fechaFin=$anoActual-$mesActual-$diaActual&fechaInicio=$anoActual-$mesActual-$diaActual";
	$ruta="index.php?r=impresiones/create&tipoImpresion=saldoEmpresa&fechaFin=$anoActual-$mesActual-31&fechaInicio=$anoActual-$mesActual-01";
	$masVendido=$model->consultarFacturado('masVendido');
	echo '<b>Hoy: </b>'. Yii::app()->numberFormatter->formatCurrency($hoy['importe'],"$").' '.CHtml::link('Ver!',$rutaHoy).'  <br>';
	echo '<b>Mes: </b>'. Yii::app()->numberFormatter->formatCurrency($mes['importe'],"$").' '.CHtml::link('Ver!',$ruta).' <br>';
	echo '<b>Lo Mas Vendido: </b>'.CHtml::link($masVendido['nombre'].'!','index.php?r=stock/update&id='.$masVendido['idStock']).' ('. $masVendido['cantidad'].' unidades) <br>';
	?>