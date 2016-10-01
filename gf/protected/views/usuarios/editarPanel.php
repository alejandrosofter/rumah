<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'clientes-form',
	'enableAjaxValidation'=>false,
'focus'=>array($model,'panelDeControl'),
)); ?>
<h1>Editar Panel de Usuario</h1>
	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>


	
		<?php echo $form->textField($model,'nombre',array('TYPE'=>'hidden','maxlength'=>30)); ?>
		
		<?php echo $form->textField($model,'usuario_',array('TYPE'=>'hidden','maxlength'=>30)); ?>
		
		<?php echo $form->textField($model,'clave_',array('TYPE'=>'hidden','maxlength'=>30)); ?>
		
		<?php echo $form->textField($model,'email',array('TYPE'=>'hidden','maxlength'=>30)); ?>
	
		<?php echo $form->textField($model,'rutaImagen',array('TYPE'=>'hidden','maxlength'=>30)); ?>
		
		<?php echo $form->textField($model,'idAreaUsuario',array('TYPE'=>'hidden','maxlength'=>30)); ?>
		
		<?php echo $form->textField($model,'anotador',array('TYPE'=>'hidden','maxlength'=>30)); ?>
		

	<?php $this->widget('application.extensions.fckeditor.FCKEditorWidget',array(
    "model"=>$model,                # Data-Model
    "attribute"=>'panelDeControl',         # Attribute in the Data-Model
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

	<div class="actions">
		<?php echo CHtml::submitButton('Aceptar',array('class'=>'btn primary')); ?>

	</div>

<?php $this->endWidget(); ?>
Las variables para editar el inicio son (para anexarlos debe escribir el nombre de la variable): <br>
<h4>MENU HORIZONTAL</h4>
%menuHorizontal proveedores,ordenesTrabajo,nuevaFactura,nuevoCobro, clientes,mantenimientos,nuevaTarea,stock,nuevaOrden,precios %finMenuHorizontal
<h4>MENU LATERAL</h4>
%menu
<h4>INDICADOR DE PAGOS</h4>
%indicadorPagos
<h4>INDICADOR DE COBROS</h4>
%indicadorCobros
<h4>INDICADOR DE TAREAS</h4>
%indicadorTareas
<h4>INDICADOR DE VENTAS</h4>
%indicadorVentas
<h4>INDICADOR DE COMPRAS</h4>
%indicadorCompras
<h4>ALERTAS</h4>
%alertas
<h4>MOVIMIENTOS</h4>
%movimientos
<h4>BUSCADOR DE PRODUCTOS</h4>
%buscadorProductos
<h4>ANOTADOR</h4>
%anotador
</div><!-- form -->