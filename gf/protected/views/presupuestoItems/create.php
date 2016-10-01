<?php
$this->breadcrumbs=array(
	'Presupuestos'=>array('/presupuestos'),
	'Items'=>array('/presupuestoItems'),
	'Nuevo'
);

$this->menu=array(
	array('label'=>'Listar Items', 'url'=>array('index&idPresupuesto='.$idPresupuesto)),
);
?>

<h1>Nuevo Item</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>