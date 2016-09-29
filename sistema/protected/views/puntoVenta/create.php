<?php
$this->breadcrumbs=array(
	'Punto Ventas'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Ver Puntos de Venta', 'url'=>array('index')),
	
);
?>

<h1>Crear Punto de Venta</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>