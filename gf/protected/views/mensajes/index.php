<?php
$this->breadcrumbs=array(
	'Mensajes',
);


?>

<h1>Mensajes</h1>
<?php 

echo CHtml::link('Nuevo Mensaje (mail, celular)','index.php?r=mensajes/create');

?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'mensajes-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		
		'tipoMensaje',
		array(
                  'name'=>'fechaMensaje',
                    'type'=>'html',
                    'value'=>'Yii::app()->dateFormatter->format("dd-M-y h:m:s",$data->fechaMensaje);',
                ),
		'destinatario',
            array(
                  'name'=>'Status',
                    'type'=>'html',
                    'value'=>'($data->tipoMensaje=="email")?$data->stausMail:$data->Status',
                ),
            array(
			'class'=>'CButtonColumn','template' => '{view}',
			
		),
		
	),
)); ?>
