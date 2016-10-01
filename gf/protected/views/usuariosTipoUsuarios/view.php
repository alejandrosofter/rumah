<?php
$this->breadcrumbs=array(
	'Configuraciones'=>array('/datosSistema'),'Usuarios'=>array('/usuarios'),'Tipo Usuarios'=>array('/usuariosTipoUsuarios'),'Actualizar'
);

$this->menu=array(
	array('label'=>'Listar Tipos', 'url'=>array('index')),
	array('label'=>'Crear Tipos', 'url'=>array('create')),
	array('label'=>'Actualizar Tipos', 'url'=>array('update', 'id'=>$model->idUsuarioTipo)),
	array('label'=>'Quitar Tipos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idUsuarioTipo),'confirm'=>'Are you sure you want to delete this item?')),

);
?>

<h1>Ver Tipo Usuario #<?php echo $model->idUsuarioTipo; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idUsuarioTipo',
		'nombre',
	),
)); ?>
