<?php
$model=  FacturasEntrantes::model();
	$stockMes=$model->consultarImporteCompras('stock');
	$conceptosMes=$model->consultarImporteCompras('conceptos');
	echo '<b>Compras de Mercaderia del Mes: </b>'. Yii::app()->numberFormatter->formatCurrency($stockMes['total'],"$").CHtml::link(' Ver!',Yii::app()->createUrl('impresiones/create&tipoImpresion=facturasCompra&idTipo=stock')).'<br>';
	echo '<b>Compras de Insumos/conceptos del Mes: </b>'. Yii::app()->numberFormatter->formatCurrency($conceptosMes['total'],"$") .CHtml::link(' Ver!',Yii::app()->createUrl('impresiones/create&tipoImpresion=facturasCompra&idTipo=conceptos')).'<br>';
	?>