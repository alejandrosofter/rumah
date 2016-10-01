<?php
$this->breadcrumbs=array(
	'Gastosfijoses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Gastosfijos', 'url'=>array('index')),
	array('label'=>'Manage Gastosfijos', 'url'=>array('admin')),
);
?>

<h1>Create Gastosfijos</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>