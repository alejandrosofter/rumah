<?php
$this->breadcrumbs=array(
	'Usuarios Paneles'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List UsuariosPaneles', 'url'=>array('index')),
	array('label'=>'Manage UsuariosPaneles', 'url'=>array('admin')),
);
?>

<h1>Create UsuariosPaneles</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>