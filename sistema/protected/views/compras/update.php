<?php
$this->breadcrumbs=array(
	'Comprases'=>array('index'),
	$model->idCompra=>array('view','id'=>$model->idCompra),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar Compras', 'url'=>array('index')),
	array('label'=>'Nueva Compra', 'url'=>array('create')),
	array('label'=>'Actualizar Compra'),
	array('label'=>'Quitar Compra', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idCompra),'confirm'=>'Are you sure you want to delete this item?')),

);
?>

<h1>Update Compras <?php echo $model->idCompra; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>