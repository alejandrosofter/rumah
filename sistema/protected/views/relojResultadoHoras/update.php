<?php
$this->breadcrumbs=array(
	'Reloj Resultado Horases'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar RelojResultadoHoras', 'url'=>array('admin')),
	array('label'=>'Nuevo RelojResultadoHoras', 'url'=>array('create')),
	array('label'=>'Ver RelojResultadoHoras', 'url'=>array('view', 'id'=>$model->id)),

);
?>

<h1>Actualizar RelojResultadoHoras <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>