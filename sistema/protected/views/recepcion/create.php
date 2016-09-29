<?php
$this->breadcrumbs=array(
	'Recepcions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Recepcion', 'url'=>array('index')),
	array('label'=>'Manage Recepcion', 'url'=>array('admin')),
);
?>

<h1>Create Recepcion</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>