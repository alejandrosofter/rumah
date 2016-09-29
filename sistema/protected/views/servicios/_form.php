<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'stock-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>
<?php echo $form->textField($model,'tipoProducto',array('size'=>30,'maxlength'=>30,'TYPE'=>'hidden','VALUE'=>'SERVICIO')); ?>
<?php echo $form->textField($model,'min',array('size'=>30,'maxlength'=>30,'TYPE'=>'hidden','VALUE'=>0)); ?>

<div class="row">
		<?php echo $form->labelEx($model,'codigoProducto'); ?>
		<?php echo $form->textField($model,'codigoProducto',array('size'=>10)); ?>
		
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('class'=>'span5','maxlength'=>1500)); ?>
	
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'unidadMedida'); ?>
		<?php echo  $form->dropDownList($model,'unidadMedida',Stock::model()->getUnidades(),array ('prompt'=>'Seleccione ...'));?>
		
	</div>
	

	<div class="row">
		<?php echo $form->labelEx($model,'detalle'); ?>
		<i>Descripcion corta del producto.</i><br>
		<?php echo $form->textArea($model,'detalle',array('rows'=>3, 'cols'=>40)); ?>
		
	</div>
	
		

	<div class="row">
		<?php echo $form->labelEx($model,'estado'); ?>
		<?php 
//		echo  $form->radioButtonList($model,'estado',$model->getEstados(),array( 'separator' => "  |  " ));
		?>
			<?php echo  $form->dropDownList($model,'estado',Stock::model()->getEstados(),
	array ('prompt'=>'Seleccione...'));?>
	
	
	
	
		
	</div>

<div class="row">
		<?php echo $form->labelEx($model,'codigoBarra'); ?>
		<?php echo $form->textField($model,'codigoBarra',array('size'=>40,'maxlength'=>30)); ?>
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'porcentajeIva'); ?>
		<?php echo $form->textField($model,'porcentajeIva',array('size'=>10)); ?>
		
	</div>



	<div class="row">
		<?php echo $form->labelEx($model,'idTipoProducto'); ?>
		<?php echo  $form->dropDownList($model,'idTipoProducto',CHtml::listData(StockTipoProducto::model()->findAll(array('order'=>'nombre')), 'idStockTipo', 'nombre'),array ('prompt'=>'Seleccione...'));?>
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idStockMarca'); ?>
	<?php  echo  $form->dropDownList($model,'idStockMarca',CHtml::listData(StockMarcas::model()->findAll(array('order'=>'nombreMarca')), 'idStockMarcas', 'nombreMarca'),array ('prompt'=>'Seleccione...'));?>
		
	</div>

	<div class="actions">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Aceptar' : 'Guardar',array('class'=>'btn primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->