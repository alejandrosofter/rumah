<?php
$this->breadcrumbs=array(
	'Recepcions'=>array('index'),
	$model->idRecepcion=>array('view','id'=>$model->idRecepcion),
	'Update',
);

$this->menu=array(
	array('label'=>'List Recepcion', 'url'=>array('index')),
	array('label'=>'Create Recepcion', 'url'=>array('create')),
	array('label'=>'View Recepcion', 'url'=>array('view', 'id'=>$model->idRecepcion)),
	array('label'=>'Manage Recepcion', 'url'=>array('admin')),
);
?>

<h1>Update Recepcion <?php echo $model->idRecepcion; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>