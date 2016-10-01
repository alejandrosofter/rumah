<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'mantenimientos-empresas-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

<?php
        $this->widget('zii.widgets.jui.CJuiTabs', array(
     'tabs'=>array(
     'Informacion'=>$this->renderPartial('_informacion',array('form'=>$form,'model'=>$model),true),
     'Datos del Contrato'=>$this->renderPartial('_datosContrato',array('form'=>$form,'model'=>$model),true),
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
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Aceptar' : 'Guardar',array('class'=>'btn primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->