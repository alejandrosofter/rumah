<?php
$this->breadcrumbs=array(
	'Ordenes Trabajo Recursoses'=>array('index'),
	$model->idOrdenIdRecurso=>array('view','id'=>$model->idOrdenIdRecurso),
	'Update',
);

$this->menu=array(
	array('label'=>'List OrdenesTrabajoRecursos', 'url'=>array('index')),
	array('label'=>'Create OrdenesTrabajoRecursos', 'url'=>array('create')),
	array('label'=>'View OrdenesTrabajoRecursos', 'url'=>array('view', 'id'=>$model->idOrdenIdRecurso)),
	array('label'=>'Manage OrdenesTrabajoRecursos', 'url'=>array('admin')),
);
?>

<h1>Update OrdenesTrabajoRecursos <?php echo $model->idOrdenIdRecurso; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>