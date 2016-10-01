<?php
$this->breadcrumbs=array(
	'Orden de Cobro'=>array('index'),
	$model->idOrdenCobro=>array('view','id'=>$model->idOrdenCobro),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar OrdenesCobro', 'url'=>array('index')),
	array('label'=>'Crear OrdenesCobro', 'url'=>array('create')),
	array('label'=>'Ver OrdenesCobro', 'url'=>array('view', 'id'=>$model->idOrdenCobro)),
);
?>

<h1>Actualizar OrdenesCobro <?php echo $model->idOrdenCobro; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>