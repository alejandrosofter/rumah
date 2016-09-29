<?php
$this->breadcrumbs=array(
	'Configuraciones'=>array('/settings'),'Usuarios'=>array('/usuarios'),'Nuevo'
);

$this->menu=array(
	array('label'=>'Listar Usuarios', 'url'=>array('index')),
);
?>

<h1>Nuevo Usuario</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>