<?php
$this->breadcrumbs=array(
	'Centro de Stock'=>array('/stock/centroStock'),'Inventarios'=>array('/inventarios'),
	'Actualizar'
);

$this->menu=array(
	array('label'=>'Listar Inventarios', 'url'=>array('index')),
	array('label'=>'Crear Inventario', 'url'=>array('create')),
	array('label'=>'Actualizar Inventario'),
	array('label'=>'Quitar Inventario', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idInventario),'confirm'=>'Are you sure you want to delete this item?')),

);
?>

<h1>Actualizar Inventario <?php echo $model->idInventario; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>