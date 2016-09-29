<?php
$this->breadcrumbs=array(
	'Recursos Tipo Recursos Ordenes Trabajos'=>array('index'),
	$model->idOrdenTrabajoTipoRecurso=>array('view','id'=>$model->idOrdenTrabajoTipoRecurso),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Tipo de Recursos', 'url'=>array('index')),
	array('label'=>'Nuevo', 'url'=>array('create')),
);
?>

<h1>Actualizar <?php echo $model->idOrdenTrabajoTipoRecurso; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>