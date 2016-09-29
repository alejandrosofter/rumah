<?php
//$this->breadcrumbs=array(
//	'Vencimientos VENCIDOS',
//);
//
////$this->menu=array(
////	array('label'=>'Create FacturasEntrantesVencimientos', 'url'=>array('create')),
////	array('label'=>'Manage FacturasEntrantesVencimientos', 'url'=>array('admin')),
////);
?>

<h1>Vencimientos <?php echo $titulo ?></h1>



<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'items-factura-saliente-grid',
	'dataProvider'=>$model->buscarVencidas(),
	
	'columns'=>array(
	'proveedor',	
array(
                  'name'=>'fechaVencimiento',
                    'type'=>'html',
                    'value'=>'Yii::app()->dateFormatter->format("dd-M-y",$data->fechaVencimiento);',
                ),
array(
                  'name'=>'diasVencidos',
                    'type'=>'html',
                    'value'=>'$data->diasVencidos<0?"A Vencer ".(-$data->diasVencidos)." días":"Vencido ".$data->diasVencidos." días"',
                ),
'estado',
array(
                  'name'=>'importe',
                    'type'=>'html',
                    'value'=>'Yii::app()->numberFormatter->formatCurrency($data->importe,"$")',
                ),

	
	array(
			'class'=>'CButtonColumn','template' => '{update} {delete}',)
	),
)); ?>