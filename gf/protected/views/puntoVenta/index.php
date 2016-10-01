<?php
$this->breadcrumbs=array(
	'Puntos de Venta',
);

$this->menu=array(
	array('label'=>'Nuevo Punto de Venta', 'url'=>array('create')),
);
?>

<h1>Puntos de Venta</h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'clientes-grid',
	'dataProvider'=>$model->search(),
//	'filter'=>$model,
	'columns'=>array(
		'idPuntoVenta',
		'nombrePuntoVenta',
		'descripcionPuntoVenta',
	
				

		array(
			'class'=>'CButtonColumn','template' => '{talonarios} {view} {update} {delete}',
			'buttons' => array(
                            'talonarios' => array(
                    			'label'=>'talonarios',
                    			'url'=>'Yii::app()->createUrl("talonario/index",
                    			array("idPuntoVenta"=>$data->idPuntoVenta))'   ,
                    			'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/famfam/script.png',
                    
                            ),
								
                            ),
		),
	),
)); ?>

