<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pagos-factura-form',
	'enableAjaxValidation'=>false,
)); ?>
	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'idFacturaSaliente'); ?>
		<?php echo  $form->dropDownList($model,'idFacturaSaliente',
		CHtml::listData(ItemsFacturaSaliente::model()->consultarFacturaUnicaCliente($model->idFacturaSaliente), 
		'idFacturaSaliente', 'nombreFactura'),array ('prompt'=>'Seleccione la Factura...'));?>
		<?php echo $form->error($model,'idFacturaSaliente'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idPago'); ?>
		<?php echo  $form->dropDownList($model,'idPago',CHtml::listData(Pagos::model()->consultarPagosCliente($idCliente), 'idPago', 'nombrePago'),array ('prompt'=>'Seleccione el Pago...'));?>
		<?php echo $form->error($model,'idPago'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'estadoPagoFactura'); ?>
		<?php echo  $form->dropDownList($model,'estadoPagoFactura',FacturasSalientes::model()->getEstados(),array ('prompt'=>'Seleccione el estado...'));?>
		<?php echo $form->error($model,'estadoPagoFactura'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Aceptar' : 'Guardar'); ?>
    <?php $this->widget('ext.popup.JPopupWindow', array(
        
//    windowURL:'http://192.168.1.205:5555/index.php?r=tareas/centroTareas', 
    )); ?>
<p><button class="example4demo">Imprimir Pago</button></p> 
<script type="text/javascript"> 
$('.example4demo').popupWindow({ 
windowURL:'<?PHP echo 'http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT']; ?>/index.php?r=impresiones/create&tipoImpresion=recibopago&nombreFactura=recibopago&idCliente=<?php echo $idCliente;?>&idPago=<?php echo $idPago;?>', 
windowName:'swip' 
}); 
</script>

	</div>
	
	
<?php $this->endWidget(); ?>




</div><!-- form -->