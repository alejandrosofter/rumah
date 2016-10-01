<?php
$this->breadcrumbs=array(
	'Centro de Servicios'=>array('/servicios/centroServicios'),
	'Nuevo Servicio',
);

$this->menu=array(
	array('label'=>'Listar Servicios', 'url'=>array('index')),
	array('label'=>'Nuevo Servicio'),
	array('label'=>'Cuentas', 'url'=>array('/cuentas')),
	array('label'=>'Listas de Precios', 'url'=>array('/stockPrecios')),
);
?>

<h1>Nuevo Servicio</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>