<?php
$this->breadcrumbs=array(
	'Condiciones de Compra',
);

$this->menu=array(
	array('label'=>'Nueva Condicion de Compra', 'url'=>array('create')),
);
?>

<h1>Condiciones de Compra</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'condiciones-compra-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'idCondicionCompra',
		array(
                  'name'=>'descripcion',
                    'type'=>'html',
                    'value'=>'CHtml::link($data->descripcion,
                    Yii::app()->createUrl("condicionesCompraItems/index",array("id"=>$data->idCondicionCompra)))',
                    'filter'=>CHtml::textField('descripcion',(isset($_GET['descripcion']) ? $_GET['descripcion'] : "")),
                ),
		'generaFacturaCredito',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
