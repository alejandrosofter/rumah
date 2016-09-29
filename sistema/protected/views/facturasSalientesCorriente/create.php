<?php
$this->breadcrumbs=array(
	'Facturas Salientes Corrientes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Listar Facturas', 'url'=>array('index')),
);
?>

<h1>Nueva Factura Corriente</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>