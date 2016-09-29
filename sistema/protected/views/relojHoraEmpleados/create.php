<?php
$this->breadcrumbs=array(
	'Reloj'=>array('RelojCategorias/menuAlternativo'),
	'Horas empleados'=>array('admin'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Volver a horas empleados', 'url'=>array('admin')),
);
?>

<h1>Generar horas empleados</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>