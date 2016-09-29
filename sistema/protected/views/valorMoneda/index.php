<?php
$this->breadcrumbs=array(
	'Configuraciones'=>array('/settings'),'Valores Moneda'

);

$this->menu=array(
	array('label'=>'Listar Valores'),
	array('label'=>'Nuevo Valor', 'url'=>array('create')),
	array('label'=>'Tipo de Monedas', 'url'=>array('/valorMonedaTipos')),
	
);
?>

<h1>Valor Monedas</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'valor-moneda-grid',
	'dataProvider'=>$dataProvider,

	'columns'=>array(

		'fecha',
		'valorCompra',
		'valorVenta',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
