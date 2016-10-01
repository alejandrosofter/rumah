<?php
$this->breadcrumbs=array(
	'Cuentas de Ventas'=>array('index'),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Cuentas', 'url'=>array('index')),
	array('label'=>'Nueva Cuenta', 'url'=>array('create')),
	array('label'=>'Ver Cuenta', 'url'=>array('view', 'id'=>$model->idCuentaVenta)),
);
?>

<h1>Actualizar Cuenta <?php echo $model->idCuentaVenta; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>