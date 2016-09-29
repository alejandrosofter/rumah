<?php
$this->breadcrumbs=array(
	'Reloj'=>array('RelojCategorias/menuAlternativo'),
	'Incidenciases'=>array('admin'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Volver a incidencias', 'url'=>array('admin')),
);
?>

<h1>Crear incidencias</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>