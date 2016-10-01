<?php
$this->breadcrumbs=array(
	'Reloj'=>array('RelojCategorias/menuAlternativo'),
	'Sucursales'=>array('admin'),
	'Generar',
);

$this->menu=array(
	array('label'=>'Volver a sucursales', 'url'=>array('admin')),
);
?>

<h1>Generador de sucursales</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>