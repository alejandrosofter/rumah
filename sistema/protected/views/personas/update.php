<?php
$this->breadcrumbs=array(
	'Personases'=>array('index'),
	$model->idCliente=>array('view','id'=>$model->idCliente),
	'Update',
);

$this->menu=array(
	array('label'=>'List Personas', 'url'=>array('index')),
	array('label'=>'Create Personas', 'url'=>array('create')),
	array('label'=>'View Personas', 'url'=>array('view', 'id'=>$model->idCliente)),
	array('label'=>'Manage Personas', 'url'=>array('admin')),
);
?>

<h1>Update Personas <?php echo $model->idCliente; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>