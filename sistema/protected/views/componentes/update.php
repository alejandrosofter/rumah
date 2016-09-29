<?php
$this->breadcrumbs=array(
	'Componentes'=>array('index'),
	$model->idComponente=>array('view','id'=>$model->idComponente),
	'Update',
);

$this->menu=array(
	array('label'=>'List Componentes', 'url'=>array('index')),
	array('label'=>'Create Componentes', 'url'=>array('create')),
	array('label'=>'View Componentes', 'url'=>array('view', 'id'=>$model->idComponente)),
	array('label'=>'Manage Componentes', 'url'=>array('admin')),
);
?>

<h1>Update Componentes <?php echo $model->idComponente; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>