

<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array( // the dialog
       
        'options'=>array(
            'title'=>'Modificar Item',
            'autoOpen'=>true,
            'modal'=>true,
            'width'=>500,
//            'height'=>470,
        ),
 ));
$form=$this->beginWidget('CActiveForm', array(
	'id'=>'presupuesto-items-form',
	'enableAjaxValidation'=>false,
)); ?>
<div class="form">
	<p class="note">Campos con  <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

		<?php echo $form->textField($model,'idPresupuesto',array('TYPE'=>'hidden')); ?>
	

	
		<?php echo $form->textField($model,'idStock',array('TYPE'=>'hidden')); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'cantidadItems'); ?>
		<?php echo $form->textField($model,'cantidadItems',array('class'=>'span1')); ?>
		<?php echo $form->error($model,'cantidadItems'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'precioVenta'); ?>
		<?php echo $form->textField($model,'precioVenta'); ?>
		<?php echo $form->error($model,'precioVenta'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nombreStock'); ?>
		<?php echo $form->textField($model,'nombreStock',array('class'=>'span6')); ?>
		<?php echo $form->error($model,'nombreStock'); ?>
	</div>



	<div class="row">
		<?php echo $form->labelEx($model,'porcentajeIva'); ?>
		<?php echo $form->textField($model,'porcentajeIva',array('class'=>'span1')); ?>
		<?php echo $form->error($model,'porcentajeIva'); ?>
	</div>



	<div class="actions">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Aceptar' : 'Guardar',array('class'=>'btn primary')); ?>
	</div>
</div><!-- form -->
<?php $this->endWidget(); ?>
<?php $this->endWidget(); ?>
