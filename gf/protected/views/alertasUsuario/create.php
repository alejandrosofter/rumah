<?php
$this->breadcrumbs=array(
	'Alertas Usuarios'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AlertasUsuario', 'url'=>array('index')),
	array('label'=>'Manage AlertasUsuario', 'url'=>array('admin')),
);
?>

<h1>Create AlertasUsuario</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>