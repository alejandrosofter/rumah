<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'rutinas-impresiones-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>
<div class="row">
		<?php echo $form->labelEx($model,'nombreImpresion'); ?>
		<?php echo $form->textField($model,'nombreImpresion',array('class'=>'span5')); ?>
		<?php echo $form->error($model,'nombreImpresion'); ?>
	</div>
        <div class="row">
		<?php echo $form->labelEx($model,'impresora'); ?>
		<?php echo  $form->dropDownList($model,'impresora',FacturasEntrantes::model()->getTipoImpresiones());?>
	
		<?php echo $form->error($model,'impresora'); ?>
	</div>
        
        	
		<?php echo $form->textField($model,'idRutina',array('TYPE'=>'hidden')); ?>
	

	<div class="row">
		<?php echo $form->labelEx($model,'detalleImpresion'); ?>
		<?php $this->widget('application.extensions.fckeditor.FCKEditorWidget',array(
    "model"=>$model,                # Data-Model
    "attribute"=>'detalleImpresion',         # Attribute in the Data-Model
    "height"=>'600px',
    "width"=>'100%',
   // "toolbarSet"=>'Full',          # EXISTING(!) Toolbar (see: fckeditor.js)
    "fckeditor"=>Yii::app()->basePath."/../fckeditor/fckeditor.php",
                                    # Path to fckeditor.php
    "fckBasePath"=>Yii::app()->baseUrl."/fckeditor/",
                                    # Realtive Path to the Editor (from Web-Root)
    
                                    # http://docs.fckeditor.net/FCKeditor_2.x/Developers_Guide/Configuration/Configuration_Options
                                    # Additional Parameter (Can't configure a Toolbar dynamicly)
    ) ); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cantidadDefecto'); ?>
		<?php echo $form->textField($model,'cantidadDefecto',array('class'=>'span1')); ?>
		<?php echo $form->error($model,'cantidadDefecto'); ?>
	</div>

	<div class="actions">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Aceptar' : 'Guardar',array('class'=>'btn primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->