<?php
$this->breadcrumbs=array(
	'Orden de Cobro Facturas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Listar OrdenesCobroFacturas', 'url'=>array('index')),
);
?>

<h1>Crear Orden de Cobro Facturas</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>