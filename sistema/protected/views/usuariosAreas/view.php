<?php
$this->breadcrumbs=array(
	'Configuraciones'=>array('/datosSistema'),'Usuarios'=>array('/usuarios'),'Areas'=>array('/usuariosAreas'),'Ver Area'
);

$this->menu=array(
	array('label'=>'Listar Areas', 'url'=>array('index')),
	array('label'=>'Crear Area', 'url'=>array('create')),
	array('label'=>'Actualizar Area', 'url'=>array('update', 'id'=>$model->idUsuarioArea)),
	array('label'=>'Quitar Area', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idUsuarioArea),'confirm'=>'Are you sure you want to delete this item?')),

);
?>

<h1>Ver Area #<?php echo $model->idUsuarioArea; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idUsuarioArea',
		'nombreArea',
		'centroCosto',
	),
)); ?>
