<?php
$this->breadcrumbs=array(
	'Movimientoses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Movimientos', 'url'=>array('index')),
	array('label'=>'Manage Movimientos', 'url'=>array('admin')),
);
?>

<h1>Create Movimientos</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>