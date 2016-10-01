<?php
$this->breadcrumbs=array(
	'Gastosfijoses'=>array('index'),
	$model->idGastoFijo=>array('view','id'=>$model->idGastoFijo),
	'Update',
);

$this->menu=array(
	array('label'=>'List Gastosfijos', 'url'=>array('index')),
	array('label'=>'Create Gastosfijos', 'url'=>array('create')),
	array('label'=>'View Gastosfijos', 'url'=>array('view', 'id'=>$model->idGastoFijo)),
	array('label'=>'Manage Gastosfijos', 'url'=>array('admin')),
);
?>

<h1>Update Gastosfijos <?php echo $model->idGastoFijo; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>