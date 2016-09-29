<?php
$this->breadcrumbs=array(
	'Condiciones Compras'=>array('index'),
	'Nueva',
);

$this->menu=array(
	array('label'=>'Listar Condiciones de Compra', 'url'=>array('index')),
);
?>

<h1>Nueva Condicion de Compra</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>