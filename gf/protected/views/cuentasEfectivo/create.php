<?php
$this->breadcrumbs=array(
	'Cuentas Efectivo'=>array('index'),
	'Nueva Cuenta',
);

$this->menu=array(
	array('label'=>'Listar Cuentas', 'url'=>array('index')),
	array('label'=>'Nueva Cuenta'),
);
?>

<h1>Nueva Cuenta</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>