<?php
$this->breadcrumbs=array(
	'Configuraciones'=>array('/datosSistema'),'Usuarios'=>array('/usuarios'),'Tipo Usuarios'=>array('/usuariosTipoUsuarios'),'Ver '.$model->idTipoUsuario
);

$this->menu=array(
	array('label'=>'List UsuariosTipoUsuarios', 'url'=>array('index')),
	array('label'=>'Create UsuariosTipoUsuarios', 'url'=>array('create')),
	array('label'=>'View UsuariosTipoUsuarios', 'url'=>array('view', 'id'=>$model->idUsuarioTipo)),
	array('label'=>'Manage UsuariosTipoUsuarios', 'url'=>array('admin')),
);
?>

<h1>Update UsuariosTipoUsuarios <?php echo $model->idUsuarioTipo; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>