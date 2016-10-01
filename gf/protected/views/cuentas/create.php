<?php
$this->breadcrumbs=array(
	'Cuentas'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Cuentas', 'url'=>array('index')),
array('label'=>'Centros de costo', 'url'=>array('/centrosCosto')),
);
?>

<h1>Crear Cuenta</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'modelCentrosCosto'=>$model)); ?>