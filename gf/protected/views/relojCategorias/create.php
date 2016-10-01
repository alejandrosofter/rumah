<?php
$this->breadcrumbs=array(
	'Reloj'=>array('RelojCategorias/menuAlternativo'),
	'Categorias del reloj'=>array('admin'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Volver a categorias', 'url'=>array('admin')),
);
?>

<h1>Agregar categorias</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>