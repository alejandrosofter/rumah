<?php
$this->breadcrumbs=array(
	'Cierre Cuentas Efectivos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CierreCuentasEfectivo', 'url'=>array('index')),
	array('label'=>'Manage CierreCuentasEfectivo', 'url'=>array('admin')),
);
?>

<h1>Create CierreCuentasEfectivo</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>