<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pre-ventas-estados-form',
	'enableAjaxValidation'=>false,
    'focus'=>array($model,'comentario')
)); 

?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>
<?php echo $form->textField($model,'idUsuario',array('TYPE'=>'hidden')); ?>
	<?php echo $form->textField($model,'idPreVentaEmpresa',array('TYPE'=>'hidden')); ?>
        
	<div class="row">
		<?php echo $form->labelEx($model,'fecha'); ?>
		<?php $this->renderPartial('/varios/campoFecha',array('model'=>$model,'campo'=>'fecha'))?>
		<?php echo $form->error($model,'fecha'); ?>
	</div>

		

	<div class="row">
		<?php echo $form->labelEx($model,'comentario'); ?>
		<?php echo $form->textArea($model,'comentario',array('rows'=>3, 'class'=>'span6')); ?>
		<?php echo $form->error($model,'comentario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'estado'); ?>
		<?php echo  $form->dropDownList($model,'estado',CHtml::listData(PreVentasNombreEstados::model()->findAll(), 'idPreventaEmpresaNombreEstado', 'nombreEstado'),array ());?>

		<?php echo $form->error($model,'estado'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Aceptar' : 'Guardar',array('class'=>'btn primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->