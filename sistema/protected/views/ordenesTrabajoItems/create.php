<?php
$this->breadcrumbs=array(
	'Ordenes Trabajo Items'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List OrdenesTrabajoItems', 'url'=>array('index')),
	array('label'=>'Manage OrdenesTrabajoItems', 'url'=>array('admin')),
);
?>

<h1>Create OrdenesTrabajoItems</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>