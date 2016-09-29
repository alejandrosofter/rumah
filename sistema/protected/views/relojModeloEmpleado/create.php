<?php
$this->breadcrumbs=array(
	'Reloj'=>array('RelojCategorias/menuAlternativo'),
	'Modelos de empleado'=>array('admin'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Volver a modelo de empleado', 'url'=>array('admin')),
);
?>

<h1>Generar modelo de empleado</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>