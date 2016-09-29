<?php
$this->breadcrumbs=array(
	'Alertas Usuarios'=>array('index'),
	$model->idAlertaUsuario=>array('view','id'=>$model->idAlertaUsuario),
	'Update',
);

$this->menu=array(
	array('label'=>'List AlertasUsuario', 'url'=>array('index')),
	array('label'=>'Create AlertasUsuario', 'url'=>array('create')),
	array('label'=>'View AlertasUsuario', 'url'=>array('view', 'id'=>$model->idAlertaUsuario)),
	array('label'=>'Manage AlertasUsuario', 'url'=>array('admin')),
);
?>

<h1>Update AlertasUsuario <?php echo $model->idAlertaUsuario; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>