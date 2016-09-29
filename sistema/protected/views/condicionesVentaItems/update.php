<?php
$this->breadcrumbs=array(
	'Condiciones Venta Items'=>array('index'),
	$model->idCondicionVentaItem=>array('view','id'=>$model->idCondicionVentaItem),
	'Actualizar',
);


?>

<h1>Actualizar Condicion de Venta Items <?php echo $model->idCondicionVentaItem; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>