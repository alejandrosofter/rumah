<?php
$this->breadcrumbs=array(
	'Rutinas Estados Ordenes Trabajos',
);

$this->menu=array(
	array('label'=>'Nuevo Estado', 'url'=>array('create&id='.$_GET['id'])),
    array('label'=>'Volver a Rutinas', 'url'=>array('/rutinasOrdenesTrabajo')),
);
?>

<h1>Estados de la Rutina</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'rutinas-estados-ordenes-trabajo-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
	'nroEstado',
		'dias',
		'estado',
		'detalle',
		
		/*
		'costoTiempo',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>