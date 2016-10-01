<?php
$this->breadcrumbs=array(
	'Comentarios Fichas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ComentariosFicha', 'url'=>array('index')),
	array('label'=>'Manage ComentariosFicha', 'url'=>array('admin')),
);
?>

<h1>Create ComentariosFicha</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>