<?php
$this->breadcrumbs=array(
	'Condiciones Venta Items'=>array('index'),
	'Nuevo',
);

$this->menu=array(
	array('label'=>'Volver a Items', 'url'=>array('index&idCondicionVenta='.$_GET['idCondicionVenta'])),
	
);
?>

<h1>Crear Condicion de Venta Items</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>