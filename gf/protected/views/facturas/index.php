<?php
$this->breadcrumbs=array(
	'Facturas'
);
?>

<h1>Facturas</h1>
<?php $this->renderPartial('_search', array('model'=>$model));?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'facturas-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		array(
                  'name'=>'fecha',
                    'type'=>'html',
                    'value'=>'Yii::app()->dateFormatter->format("dd-M-y",$data->fecha);',
                ),
		array(
                  'name'=>'Cliente',
                    'type'=>'html',
                    'value'=>'"<b>".$data->cliente->razonSocial."</b>"',
                ),
		'nroFactura',
		'estado',
		'talonario.tipoTalonario',
		'talonario.letraTalonario',
		array(
                  'name'=>'Importe',
                    'type'=>'html',
                    'value'=>'Yii::app()->numberFormatter->formatCurrency($data->importe,"$")',
                ),
		/*
		'bonificacion',
		'interes',
		'idVendedor',
		array(
                  'name'=>'Importe',
                    'type'=>'html',
                    'value'=>'Yii::app()->numberFormatter->formatCurrency($data->importe,"$")',
                ),
		'importeSaldo',
		*/
		array(
			'class'=>'CButtonColumn','template' => '{mostrar} {delete}',
			'buttons' => array(
                            'mostrar' => array(
                    			'label'=>'Mostrar',
                    			'url'=>'Yii::app()->createUrl("facturasItems/admin&idFactura=".$data->id)'   ,
                    			
                    
                            ),
                            'aplica' => array(
                    			'label'=>'Aplica',
                    			'url'=>'Yii::app()->createUrl("facturas/aplicaStock&id=".$data->id)'   ,
                    			
                    
                            )
                            )
		),
	),
)); ?>
