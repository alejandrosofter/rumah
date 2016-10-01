<?php
$this->breadcrumbs=array(
	'Clasificacion AFIP',
);

$this->menu=array(
	array('label'=>'Crear Clasificacion AFIP', 'url'=>array('create')),
	
);
?>

<h1>Clasificacion AFIP</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$dataProvider,
	
'columns'=>array(
		'idClasificacionAfip',
'nombreClasificacionAfip',
'codigoClasificacion',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
