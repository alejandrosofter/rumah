<?php
$this->breadcrumbs=array(
	'Comentarios Fichas'=>array('index'),
	$model->idComentarioFicha=>array('view','id'=>$model->idComentarioFicha),
	'Update',
);

$this->menu=array(
	array('label'=>'List ComentariosFicha', 'url'=>array('index')),
	array('label'=>'Create ComentariosFicha', 'url'=>array('create')),
	array('label'=>'View ComentariosFicha', 'url'=>array('view', 'id'=>$model->idComentarioFicha)),
	array('label'=>'Manage ComentariosFicha', 'url'=>array('admin')),
);
?>

<h1>Update ComentariosFicha <?php echo $model->idComentarioFicha; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>