<?php
$this->breadcrumbs=array(
	'Reloj'=>array('RelojCategorias/menuAlternativo'),
	'Tipo turnos'=>array('admin'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Volver a tipo turnos', 'url'=>array('admin')),
);
?>

<h1>Generar tipo turnos</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>