<div class="form">
<?php echo $form->errorSummary($model); ?>
    <?php echo $form->errorSummary($model2); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

<?php echo $form->textField($model,'esCorriente',array('size'=>30,'maxlength'=>30,'TYPE'=>'hidden')); ?>
<?php echo $form->textField($model,'estado',array('size'=>30,'maxlength'=>30,'TYPE'=>'hidden')); ?>
<?php echo $form->textField($model,'condicion',array('size'=>30,'maxlength'=>30,'TYPE'=>'hidden')); ?>
<?php echo $form->textField($model,'importeFlete',array('size'=>30,'maxlength'=>30,'TYPE'=>'hidden')); ?>
<?php echo $form->textField($model,'importeDescuentos',array('size'=>30,'maxlength'=>30,'TYPE'=>'hidden')); ?>
<?php echo $form->textField($model,'importeRecargos',array('size'=>30,'maxlength'=>30,'TYPE'=>'hidden')); ?>
<?php echo $form->textField($model,'importeImpuestos',array('size'=>30,'maxlength'=>30,'TYPE'=>'hidden')); ?>
<?php echo $form->textField($model,'tipoFactura',array('value' =>$tipoFactura,'size'=>30,'maxlength'=>30,'TYPE'=>'hidden')); ?>
<?php echo $form->textField($model,'idCondicionCompra',array('value' =>  CondicionesCompra::model()->getIdCondicionContado(),'size'=>30,'maxlength'=>30,'TYPE'=>'hidden')); ?>
<div class="row">
		<?php echo $form->labelEx($model,'fec   ha'); ?>

		<?php $this->renderPartial('/varios/campoFecha',array('model'=>$model,'campo'=>'fecha'))?>
        <span class='help-block'><b>NOTA: </b>Esta es la fecha propiamente de la factura </span>
		
	</div>

	<div class="row">
		<?php if($tipoFactura!='x')echo $form->labelEx($model,'fechaVencimiento'); ?>

		<?php if($tipoFactura!='x') $this->renderPartial('/varios/campoFecha',array('model'=>$model,'campo'=>'fechaVencimiento'))?>
<?php if($tipoFactura!='x')echo "<span class='help-block'><b>NOTA: </b>Esta es la fecha ligada a los libros de IVA </span>";?>
	
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'idProveedor'); ?>
<?php $this->renderPartial('/proveedores/buscadorProveedores',array('form'=>$form,'model'=>$model,'campo'=>'idProveedor','nombreModelo'=>'FacturasEntrantes'))?>
	
	</div>

        <div class="row">
		<?php echo $form->labelEx($model2,'idConcepto'); ?>
<?php $this->renderPartial('/conceptos/buscadorConceptos',array('model'=>$model2,'campo'=>'idConcepto','class'=>'span5','nombreModelo'=>'FacturasEntrantesConcepto'));?>
IVA 
<?php echo $form->textField($model2,'alicuotaIva',array('class'=>'span1')); ?>
IMPORTE <?php $this->renderPartial('/varios/moneyInput',array('class'=>'span2','form'=>$form,'model'=>$model2,'campo'=>'importe','nombreModelo'=>'FacturasEntrantesConcepto_importe'));?>
</div>
        <div class="row">
		<?php echo $form->labelEx($model2,'detalle'); ?>
<?php echo $form->textArea($model2,'detalle',array('rows'=>6,'class'=>'span7')) ?>

</div>


</div>
<?php $this->renderPartial('/formasDePago/_formaPago',array('model'=>$model,'class'=>'span5'))?>
