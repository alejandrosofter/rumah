<?php
$this->breadcrumbs=array(
	'Centro de Servicios'=>array('/servicios/centroServicios') ,'Ordenes Trabajo'=>array('index'),
	$model->idOrdenTrabajo=>array('view','id'=>$model->idOrdenTrabajo),
	'Actualizar',
);

$this->menu=array(
	array('label'=>"Sin Asignar(".($model->buscarPorEstado('')->getTotalItemCount()).")", 'url'=>array('porEstado&estado=')),
	array('label'=>"Trabajando(".($model->buscarPorEstado('Trabajando')->getTotalItemCount()).")", 'url'=>array('porEstado&estado=Trabajando')),
	array('label'=>"Stand-By(".($model->buscarPorEstado('Stand-By')->getTotalItemCount()).")", 'url'=>array('porEstado&estado=Stand-By')),
	array('label'=>"Tercero(".($model->buscarPorEstado('Tercero')->getTotalItemCount()).")", 'url'=>array('porEstado&estado=tercero')),
	array('label'=>"Realizadas(".($model->buscarPorEstado('Finzalizado')->getTotalItemCount()).")", 'url'=>array('porEstado&estado=Finalizada')),
	
	array('label'=>"Todas(".($model->search()->getTotalItemCount()).")", 'url'=>array('index')),
	array('label'=>'Crear Orden'),

);
?>

<h1>Actualizar Orden <?php echo $model->idOrdenTrabajo; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>