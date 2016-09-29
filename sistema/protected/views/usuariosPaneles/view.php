<?php
$this->breadcrumbs=array(
	'Usuarios Paneles'=>array('index'),
	$model->idPanelUsuario,
);

$this->menu=array(
	array('label'=>'List UsuariosPaneles', 'url'=>array('index')),
	array('label'=>'Create UsuariosPaneles', 'url'=>array('create')),
	array('label'=>'Update UsuariosPaneles', 'url'=>array('update', 'id'=>$model->idPanelUsuario)),
	array('label'=>'Delete UsuariosPaneles', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idPanelUsuario),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage UsuariosPaneles', 'url'=>array('admin')),
);
?>

<h1>View UsuariosPaneles #<?php echo $model->idPanelUsuario; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idPanelUsuario',
		'nombrePanel',
		'descripcionPanel',
		'ayuda',
		'linkAyuda',
	),
)); ?>
