<?php
$this->breadcrumbs=array(
	'Configuraciones'=>array('/datosSistema'),'Usuarios'=>array('/usuarios'),'Tipo Usuarios'=>array('/usuariosTipoUsuarios'),'Nuevo'
);

$this->menu=array(
	array('label'=>'Listar Tipo Usuarios', 'url'=>array('index')),
);
?>

<h1>Crear Tipo Usuario</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>