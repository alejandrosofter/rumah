<?php
$this->breadcrumbs=array(
	'Cuentas'=>array('index'),
	$model->idCuenta=>array('view','id'=>$model->idCuenta),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar Cuentas', 'url'=>array('index')),
	array('label'=>'Crear Cuentas', 'url'=>array('create')),

);
?>

<h1>Update Cuentas <?php echo $model->idCuenta; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'modelCentrosCosto'=>$modelCentrosCosto)); ?>