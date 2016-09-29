<?php
$this->breadcrumbs=array(
	'Stock'=>array('/stock/stokReal'),
	'Nueva disponibilidad',
);

?>

<h1>Nueva Disponibilidad de Producto</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>