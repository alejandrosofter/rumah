<?php
$this->breadcrumbs=array(
	'Configuraciones'=>array('/settings'),'Tipo Valores Moneda'

);

$this->menu=array(
	array('label'=>'Nuevo Tipo', 'url'=>array('create')),
	array('label'=>'Listar Tipos'),
);
?>

<h1>Tipos</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'valor-moneda-tipos-grid',
	'dataProvider'=>$dataProvider,

	'columns'=>array(

		'nombreMoneda',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>