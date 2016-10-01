<?php
$this->breadcrumbs=array(
	'Ordenes Trabajo Coordinaciones'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List OrdenesTrabajoCoordinaciones', 'url'=>array('index')),
	array('label'=>'Manage OrdenesTrabajoCoordinaciones', 'url'=>array('admin')),
);
?>

<h1>Create OrdenesTrabajoCoordinaciones</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>