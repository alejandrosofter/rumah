<?php
$this->breadcrumbs=array(
	'Cuentas Efectivo'=>array('index'),
	$model->idCuentaEfectivo=>array('view','id'=>$model->idCuentaEfectivo),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Cuentas', 'url'=>array('index')),
	array('label'=>'Nueva Cuenta', 'url'=>array('create')),
	array('label'=>'Ver Cuenta', 'url'=>array('view', 'id'=>$model->idCuentaEfectivo)),
);
?>

<h1>Actualizar Cuenta <?php echo $model->idCuentaEfectivo; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>