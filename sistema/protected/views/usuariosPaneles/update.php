<?php
$this->breadcrumbs=array(
	'Usuarios Paneles'=>array('index'),
	$model->idPanelUsuario=>array('view','id'=>$model->idPanelUsuario),
	'Update',
);

$this->menu=array(
	array('label'=>'List UsuariosPaneles', 'url'=>array('index')),
	array('label'=>'Create UsuariosPaneles', 'url'=>array('create')),
	array('label'=>'View UsuariosPaneles', 'url'=>array('view', 'id'=>$model->idPanelUsuario)),
	array('label'=>'Manage UsuariosPaneles', 'url'=>array('admin')),
);
?>

<h1>Update UsuariosPaneles <?php echo $model->idPanelUsuario; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>