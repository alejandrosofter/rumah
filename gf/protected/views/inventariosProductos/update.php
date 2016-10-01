<?php
$this->breadcrumbs=array(
	'Inventarios Productoses'=>array('index'),
	$model->idInventarioProducto=>array('view','id'=>$model->idInventarioProducto),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar Productos', 'url'=>array('index')),
);
?>

<h1>Actualizar Producto de Inventario <?php echo $model->idInventarioProducto; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'modelPrecio'=>$modelPrecio)); ?>