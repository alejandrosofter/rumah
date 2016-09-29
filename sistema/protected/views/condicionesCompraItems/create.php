<?php
$this->breadcrumbs=array(
	'Condiciones Compra Items'=>array('index'),
	'Nueva Item',
);

?>

<h1>Nueva Condicion de Compra</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>