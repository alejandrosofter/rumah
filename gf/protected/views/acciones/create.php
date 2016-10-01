<?php
$this->breadcrumbs=array(
	'Acciones'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Acciones', 'url'=>array('index')),
	array('label'=>'Manage Acciones', 'url'=>array('admin')),
);
?>

<h1>Create Acciones</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>