<?php
$this->breadcrumbs=array(
	'Empresases'=>array('index'),
	$model->idEmpresa=>array('view','id'=>$model->idEmpresa),
	'Update',
);

$this->menu=array(
	array('label'=>'List Empresas', 'url'=>array('index')),
	array('label'=>'Create Empresas', 'url'=>array('create')),
	array('label'=>'View Empresas', 'url'=>array('view', 'id'=>$model->idEmpresa)),
	array('label'=>'Manage Empresas', 'url'=>array('admin')),
);
?>

<h1>Update Empresas <?php echo $model->idEmpresa; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>