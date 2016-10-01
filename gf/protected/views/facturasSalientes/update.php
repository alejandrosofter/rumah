<?php
$this->breadcrumbs=array(
	'Centro de Ventas'=>array('centroVentas'),'Facturas Salientes'=>array('index'),
	$model->idFacturaSaliente=>array('view','id'=>$model->idFacturaSaliente),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Facturas', 'url'=>array('index')),
	array('label'=>'Crear Factura', 'url'=>array('create')),
	array('label'=>'Ver Factura', 'url'=>array('view', 'id'=>$model->idFacturaSaliente)),
);
?>

<h1>Actualizar Factura <?php echo $model->idFacturaSaliente; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>