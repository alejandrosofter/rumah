<?php
$this->breadcrumbs=array(
	'Centro de Servicios'=>array('/servicios/centroServicios') ,'Ordenes de Trabajo',
);

$this->menu=array(
array('label'=>"Sin Asignar(".($model->buscarPorEstado('')->getTotalItemCount()).")", 'url'=>array('porEstado&estado=')),
	array('label'=>"Trabajando(".($model->buscarPorEstado('Trabajando')->getTotalItemCount()).")", 'url'=>array('porEstado&estado=Trabajando')),
	array('label'=>"Stand-By(".($model->buscarPorEstado('Stand-by')->getTotalItemCount()).")", 'url'=>array('porEstado&estado=Stand-by')),
	array('label'=>"Tercero(".($model->buscarPorEstado('Tercero')->getTotalItemCount()).")", 'url'=>array('porEstado&estado=Tercero')),
	array('label'=>"Realizadas(".($model->buscarPorEstado('Realizada')->getTotalItemCount()).")", 'url'=>array('porEstado&estado=Realizada')),
	array('label'=>"Todas(".($model->search()->getTotalItemCount()).")", 'url'=>array('index')),
	array('label'=>'Crear Orden', 'url'=>array('create')),
	
);
?>

<h1>Seguimiento de Orden de Trabajo</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'facturas-ordenes-trabajo-grid',
	'dataProvider'=>$modelo->search(),
	
	'columns'=>array(
	'fecha',
		array(
		
			'class'=>'CButtonColumn',
			'header' => 'Factura',
			'template' => '{factura}',
			'buttons' => array(
							'factura' => array(        						
                    			'label'=>'Factura',
                    			'url'=>'Yii::app()->createUrl("impresiones/create",array("idTipo"=>$data->idFacturaSaliente,"tipoImpresion"=>"factura"))'   ,    // the PHP expression for generating the URL of the button
                    			'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/famfam/script.png',  // image URL of the button. If not set or false, a text link is used
                   				
                            ),
                            )
		),
		
		
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>