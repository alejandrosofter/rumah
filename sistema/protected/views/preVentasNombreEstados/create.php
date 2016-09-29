<?php
$this->breadcrumbs=array(
	'Pre Ventas'=>array('index'),
	'Nuevo',
);

$this->menu=array(
	array('label'=>'Listar Pre-Ventas', 'url'=>array('/preVentasEmpresas/index')),
);
?>

<h1>Nuevo Estado de PRE-VENTA</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>