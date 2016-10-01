<?php
$this->breadcrumbs=array(
	'Centro de Productos'=>array('/stock/centroStock'),'Asignacion Precios'=>array('/stockPrecios'),
	'Ver Asignación de Producto'
);

$this->menu=array(
	array('label'=>'Listar Asignaciones', 'url'=>array('index')),

);
?>

<h1>View stockPreciosItems #<?php echo $model->idStockPrecioStock; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(

		'importePesosStockMin',
		'importePesosStock',
		'importeDolarStock',
	),
)); ?>
