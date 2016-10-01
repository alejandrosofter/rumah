<?php
$this->breadcrumbs=array(
	'Ordenes Trabajo Recursoses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List OrdenesTrabajoRecursos', 'url'=>array('index')),
	array('label'=>'Manage OrdenesTrabajoRecursos', 'url'=>array('admin')),
);
?>

<h1>Create OrdenesTrabajoRecursos</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>