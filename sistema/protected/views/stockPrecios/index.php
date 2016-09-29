<?php
$this->breadcrumbs=array(
	'Listas de Precios'=>array('/stockPrecios/'),'Listas de Precios'
);
$this->menu=array(

);
?>

<h1>ASIGNACION DE PRECIOS</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'stock-precios-grid',
	'dataProvider'=>$model->search(),

	'columns'=>array(
		
//		'fechaStock',
		array(
                  'name'=>'fechaStock',
                    'type'=>'html',
                    'value'=>'($data->fechaStock=="")?"-":Yii::app()->dateFormatter->format("dd-M-y",$data->fechaStock);',
                ),
		'tipo',
		array(
                  'name'=>'cantidadProductos',
                    'type'=>'html',
                    'value'=>'CHtml::link("productos(".$data->cantidadProductos.")", Yii::app()->createUrl("stockPreciosItems/index",array("idStockPrecio"=>$data->idStockPrecio,"tipo"=>$data->tipo)))',
                ),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>