<?php
$this->breadcrumbs=array(
	'Items Factura Salientes'=>array('index'),
	$model->idItemsFacturaSaliente,
);


?>

<h1>Ver Item #<?php echo $model->idItemsFacturaSaliente; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idItemsFacturaSaliente',
		'idElemento',
		'cantidad',
		'nombreItem',
		'importeItem',
		'tipoImporte',

	),
)); ?>
