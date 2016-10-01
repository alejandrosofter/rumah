<div class="form">



	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>
 <?php echo $form->errorSummary($model); ?>
<?php echo $form->textField($model,'esCorriente',array('size'=>30,'maxlength'=>30,'TYPE'=>'hidden')); ?>
<?php echo $form->textField($model,'estado',array('size'=>30,'maxlength'=>30,'TYPE'=>'hidden')); ?>
<?php echo $form->textField($model,'condicion',array('size'=>30,'maxlength'=>30,'TYPE'=>'hidden')); ?>
<?php echo $form->textField($model,'importeFlete',array('size'=>30,'maxlength'=>30,'TYPE'=>'hidden')); ?>
<?php echo $form->textField($model,'importeDescuentos',array('size'=>30,'maxlength'=>30,'TYPE'=>'hidden')); ?>
<?php echo $form->textField($model,'importeRecargos',array('size'=>30,'maxlength'=>30,'TYPE'=>'hidden')); ?>
<?php echo $form->textField($model,'importeImpuestos',array('size'=>30,'maxlength'=>30,'TYPE'=>'hidden')); ?>


	<div class="row">
		<?php echo $form->labelEx($model,'idProveedor'); ?>
<?php $this->renderPartial('/proveedores/buscadorProveedores',array('form'=>$form,'model'=>$model,'campo'=>'idProveedor','nombreModelo'=>'FacturasEntrantes'))?>
	
	</div>

<div class="row">
		<?php echo $form->labelEx($model,'idCondicionCompra'); ?>
<?php $this->renderPartial('/condicionesCompra/buscadorCondicionesCompra',array('form'=>$form,'model'=>$model,'campo'=>'idCondicionCompra','nombreModelo'=>'FacturasEntrantes'))?>

	</div>
		<div class="row">
		<?php echo $form->labelEx($model,'tipoFactura'); ?>
		<?php echo $form->textField($model,'tipoFactura',array('class'=>'span1','style'=>"text-transform: uppercase;",'onBlur'=>'this.value = this.value.toUpperCase(); ','size'=>1,'maxlength'=>1)); ?>
		<?php echo 'Nro' ?>
		<?php
$this->widget('CMaskedTextField', array(
'model' => $model,
'attribute' => 'numeroFactura',
'mask' => '9999 - 99999999',
));
?>
		
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha'); ?>

		<?php $this->renderPartial('/varios/campoFecha',array('model'=>$model,'campo'=>'fecha'))?>
<span class='help-block'><b>NOTA: </b>Esta es la fecha propiamente de la factura </span>
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fechaVencimiento'); ?>

		<?php $this->renderPartial('/varios/campoFecha',array('model'=>$model,'campo'=>'fechaVencimiento'))?>
<span class='help-block'><b>NOTA: </b>Esta es la fecha ligada a los libros de IVA </span>
	
	</div>
<?php $this->renderPartial('/formasDePago/_formaPago',array('model'=>$model,'class'=>'span5'))?>






</div><!-- form -->