<?php
$this->breadcrumbs=array(
	'Presupuestos Ordenes Trabajos'=>array('index'),
	$model->idPresupuestoOrden=>array('view','id'=>$model->idPresupuestoOrden),
	'Update',
);

$this->menu=array(
	array('label'=>'List PresupuestosOrdenesTrabajo', 'url'=>array('index')),
	array('label'=>'Create PresupuestosOrdenesTrabajo', 'url'=>array('create')),
	array('label'=>'View PresupuestosOrdenesTrabajo', 'url'=>array('view', 'id'=>$model->idPresupuestoOrden)),
	array('label'=>'Manage PresupuestosOrdenesTrabajo', 'url'=>array('admin')),
);
?>

<h1>Update PresupuestosOrdenesTrabajo <?php echo $model->idPresupuestoOrden; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>