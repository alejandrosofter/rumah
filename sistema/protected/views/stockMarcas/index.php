<?php
$this->breadcrumbs=array(
	'Marcas',
);

$this->menu=array(
	array('label'=>'Crear Marca', 'url'=>array('create')),
	array('label'=>'Manage StockMarcas', 'url'=>array('admin')),
);
?>

<h1>Marcas</h1>



<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'stockMarcas-grid',
	'dataProvider'=>$dataProvider,
	
	'columns'=>array(
		'nombreMarca',
		
		array(
		'header' => 'Acciones',
			'class'=>'CButtonColumn',
		),
	),
)); ?>