<?php
$this->breadcrumbs=array(
	'Condiciones Venta Items',
);

$this->menu=array(
	array('label'=>'Crear Condicion de Venta', 'url'=>array('create&idCondicionVenta='.$_GET['idCondicionVenta'])),
    array('label'=>'Volver a Condiciones de Venta', 'url'=>array('/condicionesVenta')),
);
?>

<h1>Condiciones Venta Items</h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'condicionesVenta-grid',
	'dataProvider'=>$model->search(),
	
	'columns'=>array(
		'porcentajeTotalFacturado',
		'cantidadCuotas',		
		'aVencerEnDias',
'letraDiaMes',
		'CantidadDiasMesesCuotas',
		'porcentajeInteres',		
		'fechaVencimiento',
		
		array(
			'class'=>'CButtonColumn',
		 'template'=>'{update}{delete}',
		),
	),
)); ?>

