<?php
$this->breadcrumbs=array(
	'Personas'=>array('index'),
	$model->idCliente,
);

$this->menu=array(
	array('label'=>'Listar Personas', 'url'=>array('index')),
	array('label'=>'Crear Personas', 'url'=>array('create')),
	array('label'=>'Actualizar Persona', 'url'=>array('update', 'id'=>$model->idCliente)),
	array('label'=>'Quitar Persona', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idCliente),'confirm'=>'Esta Seguro de eliminar este Item?')),

);
?>

<h1>Persona #<?php echo $model->idCliente; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'nombre',
		'apellido',
		'direccion',
		'telefono',
		'celular',
		'email',
		'cuit',
		'condicionIva',

	),
)); ?>
