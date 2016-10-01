<?php
$this->breadcrumbs=array(
	'Configuraciones'=>array('/settings'),'Usuarios'=>array('/usuarios'),'Ver'
);

$this->menu=array(
	array('label'=>'Listar Usuarios', 'url'=>array('index')),
	array('label'=>'Crear Usuario', 'url'=>array('create')),
	array('label'=>'Actualizar Usuario', 'url'=>array('update', 'id'=>$model->idUsuario)),
	array('label'=>'Quitar Usuario', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idUsuario),'confirm'=>'Are you sure you want to delete this item?')),

);
?>

<h1>Ver Usuario #<?php echo $model->idUsuario; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idUsuario',
		'nombre',
		'usuario_',
		'clave_',
		'email',
		'rutaImagen',
		'idTipoUsuario',
		'idAreaUsuario',
	),
)); ?>
