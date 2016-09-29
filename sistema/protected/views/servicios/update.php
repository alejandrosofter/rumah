<?php
$this->breadcrumbs=array(
	'Centro de Servicios'=>array('/servicios/centroServicios'),
	'Actualizar Servicio',
);

$this->menu=array(
	array('label'=>'Listar Servicios', 'url'=>array('index')),
	array('label'=>'Nuevo Servicio', 'url'=>array('create')),
	array('label'=>'Ver Servicio', 'url'=>array('view', 'id'=>$model->idStock)),
	array('label'=>'Cuentas', 'url'=>array('/cuentas')),
	array('label'=>'Listas de Precios', 'url'=>array('/stockPrecios')),

);
?>

<h1>Actualizar Servicio <?php echo $model->idStock; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>