<?php
$this->breadcrumbs=array(
	'Proveedores'=>array('/proveedores'),'Rubros'
);

$this->menu=array(
	array('label'=>'Crear Rubro', 'url'=>array('create')),
	array('label'=>'Listar Rubros', 'url'=>array('index')),

);
?>

<h1>Rubros</h1>
A continuación se muestran los RUBROS que pueden llegar a adoptar un Proveedor: <br>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'proveedores-rubros-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'idProveedor_rubro',
		'nombre',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
