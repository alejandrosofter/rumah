<?php
$this->breadcrumbs=array(
	'Centro de Productos'=>array('centroStock'),
	'Detalle de Producto'
);

$this->menu=array(
	array('label'=>'Listar Productos', 'url'=>array('index')),
	array('label'=>'Crear Producto', 'url'=>array('create')),
	array('label'=>'Actualizar Producto', 'url'=>array('update', 'id'=>$model->idStock)),
	array('label'=>'Ver Stock (disponibilidades)'),
	array('label'=>'Listas de Precios', 'url'=>array('/stockPrecios')),
	array('label'=>'Quitar Stock', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idStock),'confirm'=>'Are you sure you want to delete this item?')),

);
?>

<h1>Detalle de Producto #<?php echo $model->idStock; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'nombre',
		'detalle:html',
		'estado',
		'codigoBarra',
		'porcentajeIva',
		'min',
		'max',
		'tipoProducto',
		'idTipoProducto',
		'idCuenta',
		'idStockMarca',
		'nombreMarca',
	),
)); ?>
