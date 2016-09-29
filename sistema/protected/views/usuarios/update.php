<?php
$this->breadcrumbs=array(
	'Configuraciones'=>array('/settings'),'Usuarios'=>array('/usuarios'),'Actualizar'
);

$this->menu=array(
	array('label'=>'Listar Usuarios', 'url'=>array('index')),
	array('label'=>'Nuevo Usuario', 'url'=>array('create')),
	array('label'=>'Ver Usuario', 'url'=>array('view', 'id'=>$model->idUsuario)),
);
?>

<h1>Actualizar Usuario <?php echo $model->idUsuario; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>