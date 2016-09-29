<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idParo'); ?>
		<?php echo $form->textField($model,'idParo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fechaParo'); ?>
		<?php echo $form->textField($model,'fechaParo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'comentarioParo'); ?>
		<?php echo $form->textField($model,'comentarioParo',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->