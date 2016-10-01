<?php
$this->breadcrumbs=array(
	'Condiciones Ventas',
);

$this->menu=array(
	array('label'=>'Crear Condicion de Venta', 'url'=>array('create')),

);
?>

<h1>Condiciones de Ventas</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'condicionesVenta-grid',
	'dataProvider'=>$model->search(),
	
	'columns'=>array(
		

		array(
		'name'=>'descripcionVenta',
		'type'=>'html',
		'value'=>'CHtml::link($data->descripcionVenta,
		Yii::app()->createUrl("condicionesVentaItems/index",array("idCondicionVenta"=>$data->idCondicionVenta)))',
		'filter'=>CHtml::textField('descripcionVenta',(isset($_GET['descripcionVenta']) ? $_GET['descripcionVenta'] : "")),
		),
		
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>



