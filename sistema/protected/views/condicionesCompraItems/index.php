<?php
$this->breadcrumbs=array(
	'Condiciones de Compra'=>array('/condicionesCompra/index'),
	'Condiciones',
);

?>

<h1>Condiciones</h1>
Las siguientes condiciones rigen la condicion de compra: 
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'condiciones-compra-items-grid',
	'dataProvider'=>$model->search(),
	'template'=>'{items}',
	'columns'=>array(
		'porcentajeTotalFacturado',
		'cantidadCuotas',
		'aVencerEnDias',
		'cantidadDiasMeses',
		/*
		'unidadCantidad',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
<?php echo $this->renderPartial('_form2', array('model'=>$model)); ?>