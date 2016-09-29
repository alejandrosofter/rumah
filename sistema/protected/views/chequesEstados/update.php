<?php
$this->breadcrumbs=array(
	'Cheques Estadoses'=>array('index'),
	$model->idEstadoCheque=>array('view','id'=>$model->idEstadoCheque),
	'Update',
);

$this->menu=array(
	array('label'=>'List ChequesEstados', 'url'=>array('index')),
	array('label'=>'Create ChequesEstados', 'url'=>array('create')),
	array('label'=>'View ChequesEstados', 'url'=>array('view', 'id'=>$model->idEstadoCheque)),
	array('label'=>'Manage ChequesEstados', 'url'=>array('admin')),
);
?>

<h1>Update ChequesEstados <?php echo $model->idEstadoCheque; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>