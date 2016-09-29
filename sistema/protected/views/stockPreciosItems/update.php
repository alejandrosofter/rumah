<?php
$this->breadcrumbs=array(
	'Centro de Productos'=>array('/stock/centroStock'),'Asignacion Precios'=>array('/stockPrecios'),
	'Actualizar Precio'
);

?>

<h1>Actualizar Precio de Producto</h1>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
<br>
<h3>Historial de compras</h3>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'compras-items-grid',
	'dataProvider'=>$compras,

	'columns'=>array(
		'nombreProveedor',
		'cantidad',
		'alicuotaIva',
		
		'fechaCompra',
		'importeCompra',
		'importeDolarCompra',
		
	),
)); ?>