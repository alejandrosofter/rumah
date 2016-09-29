<?php
$this->breadcrumbs=array(
	'Condiciones Ventas'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Condiciones de Venta', 'url'=>array('index')),
	
);
?>

<h1>Crear Condicion de Venta</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>