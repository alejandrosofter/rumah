<?php
$this->breadcrumbs=array(
	'Rutinas Impresiones',
);

$this->menu=array(
	array('label'=>'Nueva Impresion', 'url'=>array('create&id='.$_GET['id'])),
    array('label'=>'Volver a Rutinas', 'url'=>array('/rutinasOrdenesTrabajo')),
);
?>

<h1>Impresiones de Rutina</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'rutinas-impresiones-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		'nombreImpresion',
		'cantidadDefecto',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>