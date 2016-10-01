<div class="row">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>


		<?php echo $form->label($model,'buscar'); ?>
		<?php echo $form->textField($model,'buscar',array('class'=>'')); ?>
		<?php echo CHtml::submitButton('Buscar',array('class'=>'btn primary')); ?>


<?php $this->endWidget(); ?>

</div><!-- search-form -->