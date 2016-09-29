<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'impresiones-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>


		<?php echo $form->textField($model,'idTipoImpresion',array('size'=>30,'maxlength'=>30,'TYPE'=>'hidden','VALUE'=>1)); ?>
<div class="row">
		
		<?php $this->widget('application.extensions.fckeditor.FCKEditorWidget',array(
    "model"=>$model,                # Data-Model
    "attribute"=>'textoImpresion',         # Attribute in the Data-Model
    "height"=>'600px',
    "width"=>'125%',
   // "toolbarSet"=>'Full',          # EXISTING(!) Toolbar (see: fckeditor.js)
    "fckeditor"=>Yii::app()->basePath."/../fckeditor/fckeditor.php",
                                    # Path to fckeditor.php
    "fckBasePath"=>Yii::app()->baseUrl."/fckeditor/",
                                    # Realtive Path to the Editor (from Web-Root)
    
                                    # http://docs.fckeditor.net/FCKeditor_2.x/Developers_Guide/Configuration/Configuration_Options
                                    # Additional Parameter (Can't configure a Toolbar dynamicly)
    ) ); ?>
		<?php echo $form->error($model,'textoImpresion'); ?>
	</div>
	<?php $this->widget('zii.widgets.jui.CJuiButton', array(
		'name'=>'aPdf',
		'caption'=>('Imprime a PDF'),
		'options'=>array(
        ),
));?>
<?php $this->widget('zii.widgets.jui.CJuiButton', array(
		'name'=>'aExcel',
		'buttonType'=>'link','url'=>Yii::app()->createUrl("/impresiones/imprimeExcel",array("idTipoImpresion"=>$model->idTipoImpresion,'tipoImpresion'=>$model->tipoImpresion)),
		'caption'=>('Imprime a EXCEL'),
		'options'=>array(
        ),
));?>
	<div class="row">
		<?php echo $form->labelEx($model,'tipoImpresion'); ?>
		<?php echo  $form->dropDownList($model,'tipoImpresion',$model->getTipos(),array ('prompt'=>'Seleccione una Tipo...'));?>
		<?php echo $form->error($model,'tipoImpresion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fechaImpresion'); ?>
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
    'name'=>'Impresiones[fechaImpresion]',
    'value'=>$model->fechaImpresion,
    // additional javascript options for the date picker plugin
    'options'=>array(
        'showAnim'=>'fold',
        'dateFormat' => 'yy-mm-dd',
    ),
    'htmlOptions'=>array(
    	
        'style'=>'height:20px;'
    ),
)); ?>
		<?php echo $form->error($model,'fechaImpresion'); ?>
	</div>


<?php $this->endWidget(); ?>

</div><!-- form -->