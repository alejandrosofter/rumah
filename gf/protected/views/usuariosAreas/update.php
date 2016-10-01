<?php
$this->breadcrumbs=array(
	'Configuraciones'=>array('/datosSistema'),'Usuarios'=>array('/usuarios'),'Areas'=>array('/usuariosAreas'),'Actualizar Area'.$model->idUsuarioArea
);

$this->menu=array(
	array('label'=>'Listar Areas', 'url'=>array('index')),
	array('label'=>'Crear Area', 'url'=>array('create')),
	array('label'=>'Ver Area', 'url'=>array('view', 'id'=>$model->idUsuarioArea)),
);
?>

<h1>Actualizar Area <?php echo $model->idUsuarioArea; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>