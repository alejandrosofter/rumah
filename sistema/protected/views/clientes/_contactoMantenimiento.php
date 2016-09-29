<div class="form">
<div  >
		<?php echo $form->labelEx($model,'nombresContactoMantenimiento'); ?>

		<?php 
		echo $form->textField($model,'nombresContactoMantenimiento',
		array('size'=>40,'maxlength'=>40,
			  'style'=>"text-transform: uppercase;",
		'onBlur'=>'this.value = this.value.toUpperCase(); ')); ?>
		
	</div>
<div class="row">
		<?php echo $form->labelEx($model,'emailContactoMantenimiento'); ?>
                <?php echo CHtml::image('images/iconos/famfam/email.png'); ?>
		<?php echo $form->textField($model,'emailContactoMantenimiento',array('class'=>'span8','maxlength'=>140)); ?>
		
	</div>
<div class="row">
		<?php echo $form->labelEx($model,'mobilContactoMantenimiento'); ?>
                <?php echo CHtml::image('images/iconos/famfam/phone.png'); ?>
		<?php echo $form->textField($model,'mobilContactoMantenimiento',array('class'=>'span8','maxlength'=>140)); ?>
		
	</div>
</div>