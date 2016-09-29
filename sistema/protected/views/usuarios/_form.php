<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'usuarios-form',
	'enableAjaxValidation'=>false,
)); 

//$this->widget( 'ext.EChosen.EChosen'); 
?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	

	<div class="row">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>30,'maxlength'=>30)); ?>
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'usuario_'); ?>
		<?php echo $form->textField($model,'usuario_',array('size'=>30,'maxlength'=>30)); ?>
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'clave_'); ?>
		<?php echo $form->textField($model,'clave_',array('size'=>30,'maxlength'=>30)); ?>
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
            <?php echo CHtml::image('images/iconos/famfam/email.png'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>80)); ?>
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mobil'); ?>
            <?php echo CHtml::image('images/iconos/famfam/phone.png'); ?>
		<?php echo $form->textField($model,'mobil',array('class'=>'span7','maxlength'=>80)); ?>
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idAreaUsuario'); ?>
		<?php echo $form->dropDownList($model,'idAreaUsuario',CHtml::listData(UsuariosAreas::model()->findAll(), 'idUsuarioArea', 'nombreArea'),array ('prompt'=>'Seleccione el area...','class'=>'chzn-select'));?>
		
	</div>
        <div class="row">
		<?php echo $form->labelEx($model,'panelDeControl'); ?>
		<?php 
                $this->widget(
    'ext.asmselect.JAMSelect',
    array(
 'selected'=>$this->getKeywords($model->panelDeControl),
        'data'=>CHtml::listData(UsuariosPaneles::model()->findAll(), 'idPanelUsuario', 'nombrePanel'), // an array
        'htmlOptions'=>array(
            'title'=>'Seleccione los paneles que desaea ver...',
            'name'=>'panelDeControl'
        ),
        'animate'=>true
    ));
                ?>
		
	</div>

	<div class="actions">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Aceptar' : 'Guardar',array('class'=>'btn primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->