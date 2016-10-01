<?php
$this->breadcrumbs=array(
	'Centros de Costos',
);

$this->menu=array(
	array('label'=>'Crear Centro de Costo', 'url'=>array('create')),
	array('label'=>'Listar Centros de Costo', 'url'=>array('index')),
);
?>

<h1>Centros de Costos</h1>
Esta area indica un diferenciamiento GENERAL de toda la empresa!
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'centros-costo-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'idCentroCosto',
		'nombre',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
