<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'alertas-form',
	'action'=>Yii::app()->createUrl('alertas/create'),
	'method'=>'post',
	'focus'=>array($model,'titulo'),
	'enableAjaxValidation'=>false,
)); ?>



<?php echo $form->textField($model,'tipoAlerta',array('TYPE'=>'hidden')); ?>
<?php echo $form->textField($model,'estadoAlerta',array('TYPE'=>'hidden')); ?>
	<div class="row">
		<?php echo $form->labelEx($model,'titulo'); ?>
		<?php echo $form->textField($model,'titulo',array('class'=>'span6')); ?>

	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descripcion'); ?>
		<?php echo $form->textArea($model,'descripcion',array('rows'=>3, 'cols'=>50)); ?>

	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nivelAlerta'); ?>
		<?php echo  $form->dropDownList($model,'nivelAlerta',$model->getNivelAlertas(),array (
		));?>
		
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'fechaVencimiento'); ?>
				<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
    'attribute'=>'fechaVencimiento',
    'model'=>$model,
    // additional javascript options for the date picker plugin
    'options'=>array(
        'showAnim'=>'fold',
        'dateFormat' => 'yy-mm-dd',
    ),
    'htmlOptions'=>array(
    	
        'style'=>'height:20px;'
    ),
)); ?>
	
	</div>


	<div class="actions">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Aceptar' : 'Guardar',array('class'=>'btn primary')); ?>
		<?php echo CHtml::submitButton('Reset',array('class'=>'btn')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->