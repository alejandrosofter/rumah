<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'condiciones-compra-items-form',
	'action'=>Yii::app()->createUrl('condicionesCompraItems/create'),
	'method'=>'post',
	'focus'=>array($model,'porcentajeTotalFacturado'),
	'enableAjaxValidation'=>false,
)); ?>



	<?php echo $form->errorSummary($model); ?>


		<?php echo $form->textField($model,'idCondicionCompra',array('TYPE'=>'hidden')); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'porcentajeTotalFacturado'); ?>
		<?php echo $form->textField($model,'porcentajeTotalFacturado',array('class'=>'span2'));?>
	
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cantidadCuotas'); ?>
		<?php echo $form->textField($model,'cantidadCuotas',array('class'=>'span2'));?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'aVencerEnDias'); ?>
		<?php echo $form->textField($model,'aVencerEnDias',array('class'=>'span1'));?>
	<span class='help-block'><b>NOTA: </b> En caso contado A VENCER EN DIAS poner en 0 (cero)  </span>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cantidadDiasMeses'); ?>
		<?php echo $form->textField($model,'unidadCantidad',array('class'=>'span1','maxlength'=>1,"placeholder"=>"D")); ?>
		<?php echo $form->textField($model,'cantidadDiasMeses',array('class'=>'span2')); ?>
	
	</div>

	<div class="actions">
		<?php echo CHtml::submitButton('Agregar',array('class'=>'btn primary')); ?>
		<?php echo CHtml::submitButton('Reset',array('class'=>'btn ')); ?>
	</div>
<span class='label warning'>Para <b>CONTADO </b> debe ser una sola condicion y con el campo <b>A VENCER EN DIAS </b>= 0 (cero). </span>
<?php $this->endWidget(); ?>


</div><!-- form -->