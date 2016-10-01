<?php
$this->breadcrumbs=array(
	'Centro de Servicios'=>array('/servicios/centroServicios') ,'Ordenes Trabajo Realizadas',
);

$this->menu=array(
	array('label'=>"Ordenes(".($model->search()->getTotalItemCount()).")", 'url'=>array('index')),
	array('label'=>"Para Realizar(".($model->paraRealizar()->getTotalItemCount()).")", 'url'=>array('paraRealizar')),
	array('label'=>"Finalizadas(".($model->realizadas()->getTotalItemCount()).")"),
	array('label'=>"Facturadas(".($model->facturadas()->getTotalItemCount()).")", 'url'=>array('facturadas')),
	array('label'=>'Crear Orden', 'url'=>array('create')),
	
);
?>

<h1>ORDENES DE TRABAJO (REALIZADAS)</h1>
Estas son las ordenes que se encuentran ya RELIZADAS:
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'ordenes-trabajo-grid',
	'dataProvider'=>$model->realizadas(),
	'filter'=>$model,
	'columns'=>array(
	array(
                        'class'=>'CCheckBoxColumn','selectableRows'=>2,
                       'id'=>'idOrdenTrabajo',),
		'idOrdenTrabajo',
		array(
                  'name'=>'fechaIngreso',
                    'type'=>'html',
                    'value'=>'Yii::app()->dateFormatter->format("dd-M-y",$data->fechaIngreso);',
                ),
		array(
                  'name'=>'fechaFinalizo',
                    'type'=>'html',
                    'value'=>'($data->fechaFinalizo=="")?"-":Yii::app()->dateFormatter->format("dd-M-y",$data->fechaFinalizo);',
                ),
		'cliente',
		'descripcionCliente',
		array(
                  'name'=>'cantidadEstados',
                    'type'=>'html',
                    'value'=>'CHtml::link($data->estadoOrden."(".$data->cantidadEstados.")",Yii::app()->createUrl("ordenesTrabajoEstados/verEstadosOrden",array("id"=>$data->idOrdenTrabajo)))',
                ),

		/*
		'prioridad',
		'tipoOrden',
		'observaciones',
		*/
		array(
			'class'=>'CButtonColumn',
			'template' => '{facturar} {view} {update} {delete}',
			'buttons' => array(
                            'facturar' => array(
                    			'label'=>'Facturar',
                    			'url'=>'Yii::app()->createUrl("ventas/facturarOrden",array("id"=>$data->idOrdenTrabajo))'   ,    
                    			'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/famfam/money_dollar.png', 
                    
                            ),)
		),
	),
)); ?>
<?php $this->widget('zii.widgets.jui.CJuiButton', array(
		'name'=>'aFacturar',
		'buttonType'=>'link','url'=>Yii::app()->createUrl("/ordenesTrabajo/facturarOrdenes",array("selecciones"=>1)),
		'caption'=>('FACTURAR SELECCION'),
		'options'=>array(
        ),
));?>
