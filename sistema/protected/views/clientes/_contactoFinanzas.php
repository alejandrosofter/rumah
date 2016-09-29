<div class="form">
<div  >
		<?php echo $form->labelEx($model,'nombresContactoFinanzas'); ?>

		<?php 
		echo $form->textField($model,'nombresContactoFinanzas',
		array('size'=>40,'maxlength'=>40,
			  'style'=>"text-transform: uppercase;",
		'onBlur'=>'this.value = this.value.toUpperCase(); ')); ?>
		
	</div>
<div class="row">
		<?php echo $form->labelEx($model,'emailContactoFinanzas'); ?>
                <?php echo CHtml::image('images/iconos/famfam/email.png'); ?>
		<?php echo $form->textField($model,'emailContactoFinanzas',array('class'=>'span8','maxlength'=>140)); ?>
		
	</div>
<div class="row">
		<?php echo $form->labelEx($model,'mobilContactoFinanzas'); ?>
                <?php echo CHtml::image('images/iconos/famfam/phone.png'); ?>
		<?php echo $form->textField($model,'mobilContactoFinanzas',array('class'=>'span8','maxlength'=>140)); ?>
		
	</div>
    </div>