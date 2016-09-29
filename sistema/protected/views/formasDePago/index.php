<?php
$this->breadcrumbs=array(
	'Formas De Pagos',
);

$this->menu=array(
	array('label'=>'Nueva Formas de Pago', 'url'=>array('create')),
);
?>

<h1>Formas De Pagos</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'formas-de-pago-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
	
		'nombreForma',
		'tipoForma',
		'cantidadCuotas',
		'intereses',
		array(
                  'name'=>'ingresoEgreso',
                  'header'=>'Dirigido a ',
                    'type'=>'html',
                    'value'=>'$data->ingresoEgreso==1?"Compras":"Ventas"', 
                ),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>