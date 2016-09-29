<div class="form">


	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'fechaOrden'); ?>
		<?php $this->renderPartial('/varios/campoFecha',array('model'=>$model,'campo'=>'fechaOrden'))?>
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idProveedor'); ?>
		
		<?php $this->renderPartial('/proveedores/buscadorProveedores',
		array('form'=>$form,'extra'=>' document.forms["formOrdenes"].paraCargar.value="no"; 
		document.forms["formOrdenes"].submit();','model'=>$model,'campo'=>'idProveedor',
		'nombreModelo'=>'OrdenesPago'))?>
</div>
        <div class="row">
		<?php echo $form->labelEx($model,'idFormaPago'); ?>
		<?php $this->renderPartial('/formasDePago/_formaPago2',array('tipo'=>1,'model'=>$model,'campo'=>'idFormaPago','form'=>$form,'class'=>'span5'))?>
		
	</div>


	<br>
<div class="row">
				
</div>



</div><!-- form -->