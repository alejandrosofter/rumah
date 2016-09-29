<?php
$this->breadcrumbs=array(
	'Reloj'=>array('RelojCategorias/menuAlternativo'),
	'Turnos'=>array('admin'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Volver a turnos', 'url'=>array('admin')),
);
?>

<h1>Generar turnos</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>