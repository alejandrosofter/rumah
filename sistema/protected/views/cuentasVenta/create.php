<?php
$this->breadcrumbs=array(
	'Cuentas de Venta'=>array('index'),
	'Nuevo',
);

$this->menu=array(
	array('label'=>'Listar Cuentas de Venta', 'url'=>array('index')),

);
?>

<h1>Nueva Cuenta de Venta</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>