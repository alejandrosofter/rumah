<?php
$this->breadcrumbs=array(
	'Reloj'=>array('RelojCategorias/menuAlternativo'),
	'Cargar Horas'=>array('admin'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Volver a carga de horas', 'url'=>array('admin')),
);
?>

<h1>Generar carga de horas</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>