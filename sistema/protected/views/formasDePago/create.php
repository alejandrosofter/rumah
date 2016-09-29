<?php
$this->breadcrumbs=array(
	'Formas De Pagos'=>array('index'),
	'Nuevo',
);

$this->menu=array(
	array('label'=>'Listar Formas de Pago', 'url'=>array('index')),
);
?>

<h1>Nueva Forma de Pago</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>