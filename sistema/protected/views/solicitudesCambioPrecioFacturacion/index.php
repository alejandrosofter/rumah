<?php
$this->breadcrumbs=array(
	'Solicitudes Cambio Precio Facturacions',
);

?>

<h1>Solicitudes de Cambio de Precios</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'solicitudes-cambio-precio-facturacion-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
            'fecha',
		'producto',
		'importeLista',
		'importeDescontado',
		'usuario',
		
            'estado',
		/*
		'nroInterno',
		*/
		array(
			'class'=>'CButtonColumn',
			'template' => '{aprobar}{denegar}',
			'buttons' => array(
                            'aprobar' => array(
                    			'label'=>'Aprobar',     // text label of the button
                    			'options'=>array('style'=>'width:150px'),
                    			'url'=>'Yii::app()->createUrl("solicitudesCambioPrecioFacturacion/aprobar",array("id"=>$data->idSolicitudPrecio))'   ,    // the PHP expression for generating the URL of the button
                    			'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/famfam/accept.png',  // image URL of the button. If not set or false, a text link is used
                    
                            ),
                            'denegar' => array(
                    			'label'=>'Denegar',     // text label of the button
                    			'options'=>array('style'=>'width:150px'),
                    			'url'=>'Yii::app()->createUrl("solicitudesCambioPrecioFacturacion/denegar",array("id"=>$data->idSolicitudPrecio))'   ,    // the PHP expression for generating the URL of the button
                    			'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/famfam/cancel.png',  // image URL of the button. If not set or false, a text link is used
                    
                            ),
                        )
		),
	),
)); ?>