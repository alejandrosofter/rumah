<?php
$this->breadcrumbs=array(
	'Ordenes Trabajo Stocks'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List OrdenesTrabajoStock', 'url'=>array('index')),
	array('label'=>'Manage OrdenesTrabajoStock', 'url'=>array('admin')),
);
?>

<h1>Create OrdenesTrabajoStock</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>