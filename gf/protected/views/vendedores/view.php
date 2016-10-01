<?php
$this->breadcrumbs=array(
	'Vendedores'=>array('index'),
	$model->idVendedor,
);

$this->menu=array(
	array('label'=>'List Vendedores', 'url'=>array('index')),
	array('label'=>'Create Vendedores', 'url'=>array('create')),
	array('label'=>'Update Vendedores', 'url'=>array('update', 'id'=>$model->idVendedor)),
	array('label'=>'Delete Vendedores', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idVendedor),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Vendedores', 'url'=>array('admin')),
);
?>

<h1>View Vendedores #<?php echo $model->idVendedor; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idVendedor',
		'nombre',
		'apellido',
		'telefono',
		'nroLegajo',
		'porcentajeGanancia',
		'fechaInicio',
	),
)); ?>
