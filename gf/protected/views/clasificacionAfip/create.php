<?php
$this->breadcrumbs=array(
	'Clasificacion AFIP'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Listar Clasificacion AFIP', 'url'=>array('index')),
	
);
?>

<h1>Crear Clasificacion AFIP</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>