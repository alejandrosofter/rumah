<?php
$this->breadcrumbs=array('Ordenes '=>array('/ordenesTrabajo'),
	'Estados'=>array('/ordenesTrabajoEstados'),$idOrden
);

$this->menu=array(
	array('label'=>'Volver a las Ordenes', 'url'=>array('/ordenesTrabajo/porEstado&estado=')),
);
?>

<h1>Estados ORDEN</h1>
Se muestran los estado por lo cual ha pasado la orden de TRABAJO: (en estapa test)<br/>
<?php 
//echo $seguimiento;
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'ordenes-trabajo-estados-grid',
	'dataProvider'=>$dataProvider,
	
	//'filter'=>$model,
	'columns'=>array(
            array(
                  'name'=>'enviaMail',
                  'header'=>'',
                    'type'=>'html',
                'value'=>'$data->enviaMail?CHtml::image("images/iconos/famfam/email.png"):""',
                   
                ),
		'fechaEstado',
            'usuario',
		'estado',
		'detalleEstado',
                
		array(
			'class'=>'CButtonColumn',
			'template' => '{standBy}{trabajando}{Finalizar} {tercero}{delete}',
			'buttons' => array(
                            'Finalizar' => array(
                    			'label'=>'Finalizar',
                    			'url'=>'Yii::app()->createUrl("ordenesTrabajoEstados/finalizarEstado",array("id"=>$data->idEstadoOrden,"estadoAsignar"=>"Realizada"))'   ,
                    			'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/famfam/accept.png',
                    
                            ),
                            'tercero' => array(
                    			'label'=>'Tercero',
                    			'url'=>'Yii::app()->createUrl("ordenesTrabajoEstados/finalizarEstado",array("id"=>$data->idEstadoOrden,"estadoAsignar"=>"Tercero"))'   ,
                    			'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/famfam/user.png',
                    
                            ),
                            'trabajando' => array(
                    			'label'=>'Trabajando',
                    			'url'=>'Yii::app()->createUrl("ordenesTrabajoEstados/finalizarEstado",array("id"=>$data->idEstadoOrden,"estadoAsignar"=>"Trabajando"))'   ,
                    			'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/famfam/wrench.png',
                    
                            ),
                            'standBy' => array(
                    			'label'=>'Stand-By',
                    			'url'=>'Yii::app()->createUrl("ordenesTrabajoEstados/finalizarEstado",array("id"=>$data->idEstadoOrden,"estadoAsignar"=>"Stand-by"))'   ,
                    			'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/famfam/clock.png',
                    
                            ),
                            )
		),
	),
)); ?>
<?php echo $this->renderPartial('_form2', array('model'=>$model,'idOrden'=>$_GET['id'],'idUsuario'=>Yii::app()->user->id)); ?>