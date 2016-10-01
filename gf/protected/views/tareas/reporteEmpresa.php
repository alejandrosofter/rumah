<?php
$this->breadcrumbs=array(
	'Matenimientos Empresas'=>array('/mantenimientosEmpresas'),$cliente,'Tareas'
);

$this->menu=array(
	array('label'=>'Listar Tareas', 'url'=>array('cliente&idCliente='.$idCliente.'&cliente='.$cliente)),
	array('label'=>'Listar Pendientes', 'url'=>array('pendientes&idCliente='.$idCliente.'&cliente='.$cliente)),
	array('label'=>'Nueva Tarea', 'url'=>array('create&idCliente='.$idCliente.'&cliente='.$cliente)),
);
?>

<h1>Tareas <?php echo $cliente ?></h1>

<?php $form=$this->beginWidget('CActiveForm', array(
    'enableAjaxValidation'=>false,'id'=>'Reporte-form',
'action'=>Yii::app()->createUrl('tareas/reporteEmpresa'),
	'method'=>'post',
)); ?>
<div class="form">
<p class="note">Por favor ingrese el rango de fechas a consultar:</p>
<div class="row">
<?php echo $form->labelEx($model,'fechaInicio'); ?>
<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
    'model'=>$model,
    'attribute'=>'fechaInicio',
'id'=>'fechaInicio',
    'options'=>array(
        'showAnim'=>'fold',
        'dateFormat' => "dd-mm-yy",
    ),
    'htmlOptions'=>array(
//         'value'=>$fechaInicio,
        'style'=>'height:20px;'
    ),
));


?>
	<div class="row">
		
		<?php echo $form->textField($model,'idEmpre', 
		array('size'=>60,'maxlength'=>255,'value'=>$idCliente,'TYPE'=>'hidden')); ?>
		
	</div>
	<div class="row">
		
		<?php echo $form->textField($model,'tipoImpresion', 
		array('size'=>60,'maxlength'=>255,'value'=>'informeTareas','TYPE'=>'hidden')); ?>
		
	</div>

</div>
<div class="row">
<?php echo $form->labelEx($model,'fechaFin'); ?>
<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
           'attribute'=>'fechaFin',
			'id'=>'fechaFin',
           'model'=>$model,
        'options'=>array(
        'showAnim'=>'fold',
        'dateFormat' => "dd-mm-yy",
    ),
    'htmlOptions'=>array(
//        'value'=>$fechaFin,
        'style'=>'height:20px;'
    ),
));?>
</div>
<div class="row buttons">
<?php echo CHtml::submitButton('Reporte'); ?>
</div>
</div>
<?php $this->endWidget(); ?> 	