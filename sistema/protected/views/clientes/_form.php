<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'clientes-form',
	'enableAjaxValidation'=>false,
'focus'=>array($model,'apellido'),
)); 

?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

        <?php
        $this->widget('zii.widgets.jui.CJuiTabs', array(
     'tabs'=>array(
     'Datos del Cliente'=>$this->renderPartial('_datosCliente',array('form'=>$form,'model'=>$model),true),
     'Contacto de Finanzas'=>$this->renderPartial('_contactoFinanzas',array('form'=>$form,'model'=>$model),true),
     'Contacto Mantenimiento & Tareas'=>$this->renderPartial('_contactoMantenimiento',array('form'=>$form,'model'=>$model),true),
    ),
    // additional javascript options for the accordion plugin
    'htmlOptions'=>array(
    // 'style'=>'height:450px;',
    //'height'=>500
      //  'collapsible'=>true,
    ),
));
        
        ?>

	<div class="actions">
		<?php echo CHtml::submitButton('Aceptar',array('class'=>'btn primary')); ?>
		<?php echo CHtml::resetButton('Reset',array('class'=>'btn ')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->