<?php
$this->breadcrumbs=array(
	'Centro de Stock'=>array('/stock/centroStock'),'Inventarios'=>array('/inventarios'),
	'Crear'
);

$this->menu=array(
	array('label'=>'Listar Inventarios', 'url'=>array('index')),
	array('label'=>'Crear Inventario'),
);
?>

<h1>Crear Inventario</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>