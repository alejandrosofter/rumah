
<div class="form">
<?php


?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

<?php echo $form->textField($model,'esCorriente',array('size'=>30,'maxlength'=>30,'TYPE'=>'hidden')); ?>
<?php echo $form->textField($model,'idOrdenTrabajo',array('size'=>30,'maxlength'=>30,'TYPE'=>'hidden')); ?>
<?php echo $form->textField($model,'idFacturaSalienteCte',array('size'=>30,'maxlength'=>30,'TYPE'=>'hidden')); ?>
<?php echo $form->textField($model,'esFacturaCredito',array('size'=>30,'maxlength'=>30,'TYPE'=>'hidden')); ?>
<?php echo $form->textField($model,'idTalonario',array('size'=>30,'maxlength'=>30,'TYPE'=>'hidden')); ?>
<?php //echo CHtml::textField('noValidate', '',array('size'=>30,'maxlength'=>30,'TYPE'=>'hidden')); ?>
	
<div class="row">
		<?php echo $form->labelEx($model,'fecha'); ?>
		<?php 
//$this->widget('ext.bootstrap.widgets.BootPopover',array(
//    'selector'=>'.pop',
//)); ?>
<?php 
//$this->widget('ext.bootstrap.widgets.BootTwipsy',array(
//    'selector'=>'FacturasSalientes[nombrePuntoVenta]',
//));
 ?>
		<?php $this->renderPartial('/varios/campoFecha',array('model'=>$model,'campo'=>'fecha'))?>
		
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'idCliente'); ?>
		<?php $this->renderPartial('/clientes/buscadorClientes',array('extra'=>'if(isset(document.forms["formCrearFactura"].noValidate)) document.forms["formCrearFactura"].noValidate.value= true;
		document.forms["formCrearFactura"].submit();','nombreModelo'=>'FacturasSalientes','form'=>$form, 'model'=>$model,'campo'=>'idCliente'))?>

		
		</div>
		<script>
		function isset(variable_name) {
    try {
         if (typeof(eval(variable_name)) != 'undefined')
         if (eval(variable_name) != null)
         return true;
     } catch(e) { }
    return false;
   }</script>
	<div class="row">
		<?php echo $form->labelEx($model,'talonarioId'); ?>
		<?php echo $form->dropDownList($model,'talonarioId',
		CHtml::listData(Talonario::model()->searchMascara(), 'mascara', 'nombreTalonario')
		
		,		 

array('prompt'=>'Seleccione Talonario',
      'ajax' => array(
 		
        'type'=>'POST', //request type
        'url'=>CController::createUrl('/talonario/consultarNumeroFactura'), //url to call
//        'update'=>'#FacturasSalientes_numeroFactura', //selector to update
//        'data'=>array('FacturasSalientes[tipoTalonario]'=>'FacturasSalientes_tipoTalonario.value'),
        
        //leave out the data key to pass all form values through
        // another option to update or replace (will supersede those):
//         'success'=>' function(data) { $(\'#FacturasSalientes_idTalonario\').val(data) }',
      ), 'onchange' => '
      
      var cadena = document.getElementById("FacturasSalientes_talonarioId").value;
      					cadena = cadena.split(" ");
						var talonarioID = cadena[0];
						document.getElementById("FacturasSalientes_idTalonario").value  = talonarioID;
      					var tipoFactura = cadena[1];
      					var numerosFactura = cadena[2]+" - "+cadena[3];
      					document.getElementById("FacturasSalientes_tipoFactura").value = tipoFactura;
      					document.getElementById("FacturasSalientes_numeroFactura").value = numerosFactura;
      					
      					',
    )
		); ?>

      </div>
     
		<div class="row">


		<?php echo $form->labelEx($model,'numeroFactura'); ?>
		<?php echo $form->textField($model,'tipoFactura',
		array(
//		'style'=>"text-transform: uppercase;",
//		'onBlur'=>'this.value = this.value.toUpperCase(); ',
		'size'=>12,'maxlength'=>12,'class'=>"span1")); ?>
		
		<?php echo $form->textField($model,'numeroFactura',
		array(
//		'style'=>"text-transform: uppercase;",
//		'onBlur'=>'this.value = this.value.toUpperCase(); ',
		'size'=>20,'maxlength'=>20,'class'=>"span3")); ?>
		
		
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idCondicionVenta'); ?>
		<?php $this->renderPartial('/condicionesVenta/buscadorCondicionesVenta',array('extra'=>'if(isset(document.forms["formCrearFactura"].noValidate)) document.forms["formCrearFactura"].noValidate.value= true;
		document.forms["formCrearFactura"].submit();', 'model'=>$model,'form'=>$form)) ?>
                                
<b>Bonificacion </b><?php echo $form->textField($model,'bonificacion',
		array(
                    'onchange'=>'document.forms["formCrearFactura"].noValidate.value= true;
		document.forms["formCrearFactura"].submit();',
//		'style'=>"text-transform: uppercase;",
//		'onBlur'=>'this.value = this.value.toUpperCase(); ',
		'size'=>12,'maxlength'=>12,'class'=>"span1")); ?>
<b> Interes </b><?php echo $form->textField($model,'interes',
		array(
                    'onchange'=>'document.forms["formCrearFactura"].noValidate.value= true;
		document.forms["formCrearFactura"].submit();',
//		'style'=>"text-transform: uppercase;",
//		'onBlur'=>'this.value = this.value.toUpperCase(); ',
		'size'=>12,'maxlength'=>12,'class'=>"span1")); ?>

	

</div>
                <div class="row">
          <?php echo $form->labelEx($model,'idVendedor'); ?>
                          <?php
$this->widget( 'ext.EChosen.EChosen'); 
echo  $form->dropDownList($model,'idVendedor',CHtml::listData(Vendedores::model()->findAll(), 'idVendedor', 'nombre'),array ('style'=>'width:300px','class'=>'chzn-select','prompt'=>'Seleccione...'));?>
</div>
                <?php echo 'Imprime Factura'; ?>
		<?php echo CHtml::checkBox('imprime',$imprime);?> 
                <?php $this->renderPartial('/formasDePago/_formaPago',array('formaPago'=>$formaPago,'tipo'=>2,'extra'=>'if(isset(document.forms["formCrearFactura"].noValidate)) document.forms["formCrearFactura"].noValidate.value= true;
		document.forms["formCrearFactura"].submit();','model'=>$model,'class'=>'span5'))?>
</div>
