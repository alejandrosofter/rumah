<?php
$this->breadcrumbs=array(
	'Reloj'=>array('RelojCategorias/menuAlternativo'),
	'Paros'=>array('admin'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Volver a paros', 'url'=>array('admin')),
);
?>

<h1>Generar paros</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>