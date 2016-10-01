<?php
$this->breadcrumbs=array(
	'Recepciones',
);

$this->menu=array(
	array('label'=>'Nueva Recepcion', 'url'=>array('create')),
	array('label'=>'Listar Recepciones', 'url'=>array('index')),
);
?>

<h1>Recepciones</h1>
A continuación se disponen todos los LLAMADOS y peticiones que hacen los clientes, y no se encuentra a la/s personas correspondientes (una vez resuelto por favro cerrar el caso)
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'recepcion-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'idRecepcion',
		'idCliente',
		'descripcionRecepcion',
		'fechaRecepcion',
		'tipoRecepcion',
		'idRecepcionPadre',
		/*
		'estadoRecepcion',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>