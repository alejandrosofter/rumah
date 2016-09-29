<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ordenes-trabajo-estados-form',
	'enableAjaxValidation'=>false,
	'action'=>Yii::app()->createUrl('ordenesTrabajoEstados/create'),
	'method'=>'post',
	'focus'=>array($model,'detalleEstado')
)); ?>


	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'fechaEstado'); ?>
		<?php $this->renderPartial('/varios/campoFecha',array('model'=>$model,'campo'=>'fechaEstado'))?>
</div>
	<div class="row">
		<?php echo $form->textField($model,'idUsuario',array('size'=>30,'maxlength'=>30,'TYPE'=>'hidden','VALUE'=>$idUsuario)); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'idOrdenTrabajo',array('size'=>30,'maxlength'=>30,'TYPE'=>'hidden','VALUE'=>$idOrden)); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'estado'); ?>
		<?php echo $form->dropDownList($model,'estado',OrdenesTrabajo::model()->getEstados(),array ('prompt'=>'Seleccione un Estado...'));?>

	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'detalleEstado'); ?>
		<?php echo $form->textArea($model,'detalleEstado',array('rows'=>3, 'class'=>'span6')); ?>
	</div>
        <div class="row">
		<?php echo $form->labelEx($model,'enviaMail'); ?>
		<?php echo $form->checkBox($model,'enviaMail').' '.' (envia mail cuando se finalice el estado)'; ?>
		<?php echo $form->error($model,'enviaMail'); ?>
	</div>
    <?php

    $orden=OrdenesTrabajo::model()->findByPk($_GET['id']);
    $cliente=Clientes::model()->findByPk($orden->idCliente);
    echo $this->renderPartial('/clientes/_envioInformacion',array('cliente'=>$cliente),true);
    
    
    ?>

<div class="actions">
		<?php echo CHtml::submitButton('Agregar',array('class'=>'btn primary')); ?>
		<?php echo CHtml::resetButton('Reset',array('class'=>'btn ')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->