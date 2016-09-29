<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pre-ventas-empresas-form',
	'enableAjaxValidation'=>false,
    'focus'=>array($model,'interes')
));
$this->widget('ext.eguiders.EGuider', array(
        'id'=> 'g_interes',
        'title'=> "Interes",
        'description' => "este campo determina por que MOTIVO se esta tratando de contactar a el posible cliente.",
        'classString' => 'custom',
        'buttons' => array(
            array(
                'name'=>'Exit',
                'onclick'=> "js:function(){guiders.hideAll();}"
            )
            ),
        'classString' => 'custom',
    'show'=>true,
    'position'=>12,
    'attachTo' 		=> '#interes',
    )
);
$this->widget('ext.eguiders.EGuider', array(
        'id'=> 'g_estado',
        'title'=> "Estado",
        'description' => "Seleccione el estado en que se encuentra actualmente el posible cliente",
        'classString' => 'custom',
        'buttons' => array(
            array(
                'name'=>'Exit',
                'onclick'=> "js:function(){guiders.hideAll();}"
            )
            ),
        'classString' => 'custom',
    'show'=>false,
    'position'=>12,
    'attachTo' 		=> '#estado',
    )
);
?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>
        
        
	<div class="row">
		<?php echo $form->labelEx($model,'fecha'); ?>
		<?php $this->renderPartial('/varios/campoFecha',array('model'=>$model,'campo'=>'fecha'))?>
		<?php echo $form->error($model,'fecha'); ?>
	</div>
        <div id="interes" class="row">
		<?php echo $form->labelEx($model,'interes'); ?>
		<?php echo $form->textField($model,'interes',array('class'=>'span6','onblur'=>"guiders.hideAll()",
                     'onfocus'=>"guiders.show('g_interes')")); ?>
		<?php echo $form->error($model,'interes'); ?>
	</div>
        <div id="interes" class="row">
		<?php echo $form->labelEx($model,'contacto'); ?>
		<?php echo $form->textField($model,'contacto',array('class'=>'span7')); ?>
		<?php echo $form->error($model,'contacto'); ?>
	</div>
        <div id="interes" class="row">
		<?php echo $form->labelEx($model,'responsable'); ?>
		<?php echo $form->textField($model,'responsable',array('class'=>'span3')); ?>
		<?php echo $form->error($model,'responsable'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'empresa'); ?>
		<?php echo $form->textField($model,'empresa',array('style'=>"text-transform: uppercase;",
		'onBlur'=>'this.value = this.value.toUpperCase(); ','class'=>'span5','maxlength'=>255)); ?>
		<?php echo $form->error($model,'empresa'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'telefono'); ?>
		<?php echo $form->textField($model,'telefono',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'telefono'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div id="estado" class="row">
		<?php echo $form->labelEx($model,'estado'); ?>
		<?php echo  $form->dropDownList($model,'estado',CHtml::listData(PreVentasNombreEstados::model()->findAll(), 'idPreventaEmpresaNombreEstado', 'nombreEstado'),array ('onblur'=>"guiders.hideAll()",
                     'onfocus'=>"guiders.show('g_estado')"));?>

		<?php echo $form->error($model,'estado'); ?>
	</div>

		<?php echo $form->textField($model,'idUsuario',array('TYPE'=>'hidden')); ?>
		

	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Aceptar' : 'Guardar',array('class'=>'btn primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->