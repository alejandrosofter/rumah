<?php
$this->breadcrumbs=array(
	'Presupuestos'=>array('/presupuestos'),
	'Items'=>array('/presupuestoItems&idPresupuesto='.$idPresupuesto),
	$model->idItemPresupuesto=>array('view','id'=>$model->idItemPresupuesto),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Presupuestos', 'url'=>array('/presupuestos')),
	array('label'=>'Nuevo Item', 'url'=>array('create&idPresupuesto='.$idPresupuesto)),
	array('label'=>'Items Presupuesto', 'url'=>array('index&idPresupuesto='.$idPresupuesto)),
	array('label'=>'Ver Item', 'url'=>array('view', 'id'=>$model->idItemPresupuesto)),

);
?>

<h1>Actualizar Item <?php echo $model->idItemPresupuesto; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>