<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'condiciones-venta-items-form',
	'action'=>Yii::app()->createUrl('condicionesVentaItems/create&idCondicionVenta='.$model->idCondicionVenta),
	'method'=>'post',
	'focus'=>array($model,'porcentajeTotalFacturado'),
	'enableAjaxValidation'=>false,
)); ?>


		<?php echo $form->textField($model,'idCondicionVenta',array('TYPE'=>'hidden')); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'porcentajeTotalFacturado'); ?>
		
      <?php echo $form->textField($model,'porcentajeTotalFacturado',array('size'=>10,'class'=>'span1')); ?>
		
	</div>
	<br>

	<div class="row">
		<?php echo $form->labelEx($model,'cantidadCuotas'); ?>
		 <?php echo $form->textField($model,'cantidadCuotas',array('size'=>10,'class'=>'span1')); ?>
		 

		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'aVencerEnDias'); ?>
		 <?php echo $form->textField($model,'aVencerEnDias',array('size'=>10,'class'=>'span1')); ?>

	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CantidadDiasMesesCuotas'); ?>
		<?php echo $form->textField($model,'letraDiaMes',array('size'=>1,'maxlength'=>1,"placeholder"=>"D",'class'=>'span1',)); ?>
		<?php echo $form->textField($model,'CantidadDiasMesesCuotas',array('size'=>10,'class'=>'span1')); ?>
		
	</div>
	
	<br>
	
	
		
	<div class="row">
		<?php echo $form->labelEx($model,'porcentajeInteres'); ?>
		<?php echo $form->textField($model,'porcentajeInteres',array('size'=>10,'class'=>'span1')); ?>
		
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'fechaVencimiento'); ?>
		
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
    'name'=>'CondicionesVentaItems[fechaVencimiento]',
    'value'=>$model->fechaVencimiento,
    // additional javascript options for the date picker plugin
    'options'=>array(
        'showAnim'=>'fold',
        'dateFormat' => 'yy-mm-dd',
    ),
    'htmlOptions'=>array(
    	'size'=>10,
        'style'=>'height:20px;',
    'class'=>'span2'
        
    ),
)); ?>
		
	</div>
	
		<!--<td>
	<div class="row">
		<?php echo $form->labelEx($model,'calculo'); ?>
		<?php echo $form->textField($model,'calculo',array('size'=>10)); ?>
		
	</div>
	</td>

	-->
<div class="actions">
		<?php echo CHtml::submitButton('Agregar',array('class'=>'btn primary')); ?>
	</div>

	
		
<?php $this->endWidget(); ?>
<i> En caso contado A VENCER EN DIAS poner en 0 (cero) </i>
</div><!-- form -->