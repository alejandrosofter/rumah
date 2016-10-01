<?php
$this->breadcrumbs=array(
	'Matenimientos Empresas'=>array('/mantenimientosEmpresas'),$cliente=>array('/tareas/cliente&idCliente='.$idCliente.'&cliente='.$cliente),'Personal Tarea'
);


$this->menu=array(
	array('label'=>'List TareasDestinatarios', 'url'=>array('index')),
	array('label'=>'Create TareasDestinatarios', 'url'=>array('create')),
	array('label'=>'View TareasDestinatarios', 'url'=>array('view', 'id'=>$model->idTareaDestinantario)),
	array('label'=>'Manage TareasDestinatarios', 'url'=>array('admin')),
);
?>

<h1>Update TareasDestinatarios <?php echo $model->idTareaDestinantario; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>