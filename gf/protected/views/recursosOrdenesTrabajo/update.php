<?php
$this->breadcrumbs=array(
	'Recursos Ordenes Trabajos'=>array('index'),
	$model->idOrdenTrabajoRecurso=>array('view','id'=>$model->idOrdenTrabajoRecurso),
	'Update',
);

$this->menu=array(
	array('label'=>'List RecursosOrdenesTrabajo', 'url'=>array('index')),
	array('label'=>'Create RecursosOrdenesTrabajo', 'url'=>array('create')),
	array('label'=>'View RecursosOrdenesTrabajo', 'url'=>array('view', 'id'=>$model->idOrdenTrabajoRecurso)),
	array('label'=>'Manage RecursosOrdenesTrabajo', 'url'=>array('admin')),
);
?>

<h1>Update RecursosOrdenesTrabajo <?php echo $model->idOrdenTrabajoRecurso; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>