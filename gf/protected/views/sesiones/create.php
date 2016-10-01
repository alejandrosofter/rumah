<?php
$this->breadcrumbs=array(
	'Sesiones'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Sesiones', 'url'=>array('index')),
	array('label'=>'Manage Sesiones', 'url'=>array('admin')),
);
?>

<h1>Create Sesiones</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>