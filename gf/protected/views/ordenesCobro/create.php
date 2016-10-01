<?php
$this->breadcrumbs=array(
	'Ordenes de Cobro'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Listar OrdenesCobro', 'url'=>array('index')),
);
?>

<h1>Crear Orden de Cobro</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>