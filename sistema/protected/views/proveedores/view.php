<?php
$this->breadcrumbs=array(
	'Proveedores'=>array('index'),
	$model->idProveedor,
);

$this->menu=array(
	array('label'=>'Listar Proveedores', 'url'=>array('index')),
	array('label'=>'Crear Proveedores', 'url'=>array('create')),
	array('label'=>'Modificar Proveedores', 'url'=>array('update', 'id'=>$model->idProveedor)),
	array('label'=>'Eliminar Proveedores', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idProveedor),'confirm'=>'Are you sure you want to delete this item?')),

);
?>

<h1>Ver Proveedores #<?php echo $model->idProveedor; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idProveedor',
		'nombre',
'cuit',
'direccion',
'nro',
'localidad',
'idJuridiccion',
'nombreJuridiccion',
'codigoProveedor',
'letraHabitual',
	
		'email',
		
		'telefono',
		'celular',
		
		
	),
)); ?>
