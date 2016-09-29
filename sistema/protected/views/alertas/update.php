<?php
$this->breadcrumbs=array(
	'Alertases'=>array('index'),
	$model->idAlerta=>array('view','id'=>$model->idAlerta),
	'Update',
);

$this->menu=array(
	array('label'=>'List Alertas', 'url'=>array('index')),
	array('label'=>'Create Alertas', 'url'=>array('create')),
	array('label'=>'View Alertas', 'url'=>array('view', 'id'=>$model->idAlerta)),
	array('label'=>'Manage Alertas', 'url'=>array('admin')),
);
?>

<h1>Update Alertas <?php echo $model->idAlerta; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>