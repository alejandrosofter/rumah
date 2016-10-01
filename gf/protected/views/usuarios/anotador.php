<div class="form">

<?php 
$idUsuario=Yii::app()->user->id;
$model=Usuarios::model()->findByPk($idUsuario);
 $form=$this->beginWidget('CActiveForm', array(
	'id'=>'clientes-form',
	'action'=>Yii::app()->createUrl('usuarios/anotador&id='.$idUsuario),
	'method'=>'post',
	'enableAjaxValidation'=>false,
'focus'=>array($model,'panelDeControl'),
));
?>
<h4>Anotador</h4>


	
		<?php echo $form->textField($model,'nombre',array('TYPE'=>'hidden','maxlength'=>30)); ?>
		
		<?php echo $form->textField($model,'usuario_',array('TYPE'=>'hidden','maxlength'=>30)); ?>
		
		<?php echo $form->textField($model,'clave_',array('TYPE'=>'hidden','maxlength'=>30)); ?>
		
		<?php echo $form->textField($model,'email',array('TYPE'=>'hidden','maxlength'=>30)); ?>
	
		<?php echo $form->textField($model,'rutaImagen',array('TYPE'=>'hidden','maxlength'=>30)); ?>
		
		<?php echo $form->textField($model,'idAreaUsuario',array('TYPE'=>'hidden','maxlength'=>30)); ?>
		
		<?php echo $form->textField($model,'panelDeControl',array('TYPE'=>'hidden','maxlength'=>30)); ?>
		

	<?php $this->widget('application.extensions.fckeditor.FCKEditorWidget',array(
    "model"=>$model,                # Data-Model
    "attribute"=>'anotador',         # Attribute in the Data-Model
    "height"=>'100%',
    "width"=>'100%',
   "toolbarSet"=>'Basic',          # EXISTING(!) Toolbar (see: fckeditor.js)
    "fckeditor"=>Yii::app()->basePath."/../fckeditor/fckeditor.php",
                                    # Path to fckeditor.php
    "fckBasePath"=>Yii::app()->baseUrl."/fckeditor/",
                                    # Realtive Path to the Editor (from Web-Root)
    
                                    # http://docs.fckeditor.net/FCKeditor_2.x/Developers_Guide/Configuration/Configuration_Options
                                    # Additional Parameter (Can't configure a Toolbar dynamicly)
    ) ); ?>

	<div class="actions">
		<?php echo CHtml::submitButton('Guardar',array('class'=>'btn primary')); ?>

	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->