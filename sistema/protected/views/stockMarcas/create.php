<?php
$this->breadcrumbs=array(
	'Marcas'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Lista Marcas', 'url'=>array('index')),
	array('label'=>'Manage StockMarcas', 'url'=>array('admin')),
);
?>

<h1>CREAR MARCA</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>