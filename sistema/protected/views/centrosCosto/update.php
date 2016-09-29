<?php
$this->breadcrumbs=array(
	'Centros Costos'=>array('index'),
	$model->idCentroCosto=>array('view','id'=>$model->idCentroCosto),
	'Update',
);

$this->menu=array(
	array('label'=>'List CentrosCosto', 'url'=>array('index')),
	array('label'=>'Create CentrosCosto', 'url'=>array('create')),
	array('label'=>'View CentrosCosto', 'url'=>array('view', 'id'=>$model->idCentroCosto)),
	array('label'=>'Manage CentrosCosto', 'url'=>array('admin')),
);
?>

<h1>Update CentrosCosto <?php echo $model->idCentroCosto; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>