<?php
$this->breadcrumbs=array(
	'Facturas de Venta'=>array('/facturasSalientes'),
	'Actualizar Item Factura'
);

$this->menu=array(
	array('label'=>'Listar Items', 'url'=>array('index&idFacturaSaliente='.$model->idFacturaSaliente)),
	array('label'=>'Ver Items', 'url'=>array('view', 'id'=>$model->idItemsFacturaSaliente)),
);
?>

<h1>Actualizar Item <?php echo $model->idItemsFacturaSaliente; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>