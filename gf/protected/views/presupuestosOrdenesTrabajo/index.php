<?php
$this->breadcrumbs=array(
	'Presupuestos'=>array('/presupuestos'),
	'Ver',
);

$this->menu=array(
	array('label'=>'Listar Presupuestos', 'url'=>array('/presupuestos')),
	array('label'=>'Nuevo Presupuesto', 'url'=>array('/presupuestos/create')),
);

?>

<h1>Seguimiento de Presupuesto</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'presupuestos-ordenes-trabajo-grid',
	'dataProvider'=>$model->search(),
	
	'columns'=>array(

		'fecha',
		array(
		
			'class'=>'CButtonColumn',
			'header' => 'Orden',
			'template' => '{orden}',
			'buttons' => array(
							'orden' => array(        						
                    			'label'=>'Factura',
                    			'url'=>'Yii::app()->createUrl("ordenesTrabajo/update",array("id"=>$data->idOrdenTrabajo))'   ,    // the PHP expression for generating the URL of the button
                    			'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/famfam/report.png',  // image URL of the button. If not set or false, a text link is used
                   				
                            ),
                            )
		),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>