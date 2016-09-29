<?php
$this->breadcrumbs=array(
	'Imagenes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Imagenes', 'url'=>array('index')),
	array('label'=>'Manage Imagenes', 'url'=>array('admin')),
);
?>

<h1>Create Imagenes</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>