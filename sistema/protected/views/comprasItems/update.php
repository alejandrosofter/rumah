<?php
$this->breadcrumbs=array(
	'Compras Items'=>array('index'),
	$model->idCompraItem=>array('view','id'=>$model->idCompraItem),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Items', 'url'=>array('index')),
	array('label'=>'Nuevo Item', 'url'=>array('create')),
	array('label'=>'Ver Item', 'url'=>array('view', 'id'=>$model->idCompraItem)),
);
?>

<h1>Actualizar Item <?php echo $model->idCompraItem; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>