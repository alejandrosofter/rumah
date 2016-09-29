<div class="form">
<?php echo CHtml::textField('paraCargar','',array('TYPE'=>'hidden'));?>
	<div class="row">
		<?php echo $form->labelEx($model,'fechaOrdenCobro'); ?>
		<?php
                $this->renderPartial('/varios/campoFecha',array('model'=>$model,'campo'=>'fechaOrdenCobro'))?>
		
	</div>

	<div class="row">
	
		<?php echo $form->labelEx($model,'idCliente'); ?>
		
		<?php $this->renderPartial('/clientes/buscadorClientes',
		array('form'=>$form,'extra'=>' document.forms["formOrdenes"].paraCargar.value="no"; 
		document.forms["formOrdenes"].submit();','model'=>$model,'campo'=>'idCliente',
		'nombreModelo'=>'OrdenesCobro'))?>
	
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idFormaPago'); ?>
		<?php $this->renderPartial('/formasDePago/_formaPago2',array('tipo'=>2,'model'=>$model,'campo'=>'idFormaPago','form'=>$form,'class'=>'span5'))?>
		
	</div>
    <div class="row">
		<?php echo $form->labelEx($model,'importeAcuenta'); ?>
		<?php echo $this->renderPartial('/varios/moneyInput',array('form'=>$form,'campo'=>'importeAcuenta','nombreModelo'=>'OrdenesCobro_importeAcuenta','model'=>$model)); ?>
		
	</div>
    



</div><!-- form -->