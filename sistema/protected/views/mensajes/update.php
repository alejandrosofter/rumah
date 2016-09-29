<?php
$this->breadcrumbs=array(
	'Mensajes'=>array('index'),
	$model->idMensaje=>array('view','id'=>$model->idMensaje),
	'Update',
);

$this->menu=array(
	array('label'=>'List Mensajes', 'url'=>array('index')),
	array('label'=>'Create Mensajes', 'url'=>array('create')),
	array('label'=>'View Mensajes', 'url'=>array('view', 'id'=>$model->idMensaje)),
	array('label'=>'Manage Mensajes', 'url'=>array('admin')),
);
?>

<h1>Update Mensajes <?php echo $model->idMensaje; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>