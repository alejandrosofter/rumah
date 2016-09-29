<?php
$this->breadcrumbs=array(
	'Condiciones Compra Items'=>array('index'),
	$model->idCondicionCompraItem=>array('view','id'=>$model->idCondicionCompraItem),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Volver', 'url'=>array('index','id'=>$model->idCondicionCompra)),
);
?>

<h1>Actualizar Condicion <?php echo $model->idCondicionCompraItem; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>