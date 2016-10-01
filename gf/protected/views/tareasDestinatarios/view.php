<?php
$this->breadcrumbs=array(
	'Matenimientos Empresas'=>array('/mantenimientosEmpresas'),$cliente=>array('/tareas/cliente&idCliente='.$idCliente.'&cliente='.$cliente),'Personal Tarea'
);


$this->menu=array(
	array('label'=>'List TareasDestinatarios', 'url'=>array('index')),
	array('label'=>'Create TareasDestinatarios', 'url'=>array('create')),
	array('label'=>'Update TareasDestinatarios', 'url'=>array('update', 'id'=>$model->idTareaDestinantario)),
	array('label'=>'Delete TareasDestinatarios', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idTareaDestinantario),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TareasDestinatarios', 'url'=>array('admin')),
);
?>

<h1>View TareasDestinatarios #<?php echo $model->idTareaDestinantario; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idTareaDestinantario',
		'idTarea',
		'idUsuario',
		'notificarArea',
	),
)); ?>
