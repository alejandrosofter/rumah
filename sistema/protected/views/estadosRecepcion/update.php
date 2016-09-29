<?php
$this->breadcrumbs=array(
	'Estados Recepcions'=>array('index'),
	$model->idEstadoRecepcion=>array('view','id'=>$model->idEstadoRecepcion),
	'Update',
);

$this->menu=array(
	array('label'=>'List EstadosRecepcion', 'url'=>array('index')),
	array('label'=>'Create EstadosRecepcion', 'url'=>array('create')),
	array('label'=>'View EstadosRecepcion', 'url'=>array('view', 'id'=>$model->idEstadoRecepcion)),
	array('label'=>'Manage EstadosRecepcion', 'url'=>array('admin')),
);
?>

<h1>Update EstadosRecepcion <?php echo $model->idEstadoRecepcion; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>