<?php
$this->breadcrumbs=array(
	'Cierre Cuentas Efectivos'=>array('index'),
	$model->idCierreCuenta=>array('view','id'=>$model->idCierreCuenta),
	'Update',
);

$this->menu=array(
	array('label'=>'List CierreCuentasEfectivo', 'url'=>array('index')),
	array('label'=>'Create CierreCuentasEfectivo', 'url'=>array('create')),
	array('label'=>'View CierreCuentasEfectivo', 'url'=>array('view', 'id'=>$model->idCierreCuenta)),
	array('label'=>'Manage CierreCuentasEfectivo', 'url'=>array('admin')),
);
?>

<h1>Update CierreCuentasEfectivo <?php echo $model->idCierreCuenta; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>