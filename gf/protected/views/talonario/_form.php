<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'talonario-form',
	'enableAjaxValidation'=>false,'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>
<?php echo $form->errorSummary($model); ?>
	
		<?php echo $form->textField($model,'idPuntoVenta',array('TYPE'=>'hidden','maxlength'=>30,'readonly'=>'readonly')); ?>
	<div class="row">
		<?php echo $form->labelEx($model,'esElectronica'); ?>
		<?php echo $form->checkBox($model,'esElectronica',array('onclick'=>'visible() ')); ?>
            Certificado
		<?php echo CHtml::activeFileField($model,'certificado'); ?>
            csr
            <?php echo CHtml::activeFileField($model,'csr'); ?>
            key
            <?php echo CHtml::activeFileField($model,'key'); ?>
	</div>
        <div class="row">
		<?php echo $form->labelEx($model,'predeterminado'); ?>
		<?php echo $form->checkBox($model,'predeterminado',array()); ?>
	</div>
<div class="row">
		<?php echo $form->labelEx($model,'tipoTalonario'); ?>
    <?php echo  $form->dropDownList($model,'tipoTalonario',$model->getTalonarios());?>
		
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'desdeNumero'); ?>
		<?php echo $form->textField($model,'desdeNumero',array('class'=>'span2')) ?>
		
	</div>
        <div class="row">
		<?php echo $form->labelEx($model,'descricpion'); ?>
		<?php echo $form->textField($model,'descripcion',array('class'=>'span5')) ?>
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hastaNumero'); ?>
		<?php echo $form->textField($model,'hastaNumero',array('class'=>'span2')); ?>
		
	</div>
<div class="row">
		<?php echo $form->labelEx($model,'codigoPuntoVenta'); ?>
		<?php echo $form->textField($model,'codigoPuntoVenta',array('class'=>'span2')); ?>
		Codigo que proporciona AFIP por el punto de venta
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'proximo'); ?>
		<?php echo $form->textField($model,'proximo',array('class'=>'span2')); ?>
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'letraTalonario'); ?>
		<?php echo $form->textField($model,'letraTalonario',array('class'=>'span1','maxlength'=>255)); ?>
		
	</div>

	

	<div class="row">
		<?php echo $form->labelEx($model,'numeroSerie'); ?>
		<?php echo $form->textField($model,'numeroSerie',array('class'=>'span1')); ?>
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ultimoNroPagIva'); ?>
		<?php echo $form->textField($model,'ultimoNroPagIva',array('class'=>'span1')); ?>
		
	</div>

	<div class="actions">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar',array('class'=>'btn primary')); ?>
	</div>

<?php $this->endWidget(); ?>
<script>
    visible();
function visible() 
{
 var control = document.getElementById('Talonario_certificado');
  var control2 = document.getElementById('Talonario_csr');
   var control3 = document.getElementById('Talonario_key');
var check = document.getElementById('Talonario_esElectronica');
if(check.checked==0) 
{ 
control.style.visibility='hidden';
control2.style.visibility='hidden';
control3.style.visibility='hidden';

} 
else 
{ 
control.style.visibility='';
control2.style.visibility='';
control3.style.visibility='';
} 
} 
</script>
</div><!-- form -->