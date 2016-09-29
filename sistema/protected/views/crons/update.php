<?php
$this->breadcrumbs=array(
	'Crons'=>array('index'),
	$model->idCron=>array('view','id'=>$model->idCron),
	'Update',
);

$this->menu=array(
	array('label'=>'List Crons', 'url'=>array('index')),
	array('label'=>'Create Crons', 'url'=>array('create')),
	array('label'=>'View Crons', 'url'=>array('view', 'id'=>$model->idCron)),
	array('label'=>'Manage Crons', 'url'=>array('admin')),
);
?>

<h1>Update Crons <?php echo $model->idCron; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>