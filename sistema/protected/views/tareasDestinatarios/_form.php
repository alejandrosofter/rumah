<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tareas-destinatarios-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->textField($model,'idTarea',array('size'=>30,'maxlength'=>30,'TYPE'=>'hidden')); ?>
            <?php echo $form->textField($model,'idUsuarioEmisor',array('size'=>30,'maxlength'=>30,'TYPE'=>'hidden')); ?>

	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idUsuario'); ?>
		<?php echo  $form->dropDownList($model,'idUsuario',CHtml::listData(Usuarios::model()->findAll(), 'idUsuario', 'nombre'),array ('prompt'=>'Seleccione Personal...'));?>
		<?php echo CHtml::submitButton('Agregar',array('class'=>'btn primary')); ?>
	
	</div>


<?php $this->endWidget(); ?>
<?php $form=$this->beginWidget('CActiveForm', array(
'action'=>Yii::app()->createUrl("tareasDestinatarios/tareas",array("id"=>$idTarea,"idCliente"=>$idCliente,"cliente"=>$cliente)),
)); ?>

<div class="actions">
		<?php echo CHtml::submitButton('Finalizar',array('class'=>'btn primary')); ?>
	</div>

<?php $this->endWidget(); ?>
</div>