<?php
$this->breadcrumbs=array(
	'Personas'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Personas', 'url'=>array('index')),
	array('label'=>'Crear Persona', 'url'=>array('create')),
);
?>

<h1>Crear Personas</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>