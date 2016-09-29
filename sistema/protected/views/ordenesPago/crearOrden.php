<h1>Nueva Orden de Pago</h1>
Crea un pago con determinados vencimientos.
<?php $form=$this->beginWidget('CActiveForm', array(
'id'=>'formOrdenes',
'focus'=>isset($model->idProveedor)?array($model,'pagoAcuenta'):array($model,'fechaOrden')
));
$vel=($idFactura!=0)?array('label'=>'Agregar Vencimiento', 'url'=>array('/facturasEntrantesVencimientos/create&idFactura='.$idFactura)):array();
$this->menu=array($vel);

?>
<?PHP
$this->renderPartial('/ordenesPago/_form', array('model'=>$model,'form'=>$form),false);
$this->renderPartial('itemsOrdenes', array('idProveedor'=>$model->idProveedor,'model'=>$model,'manager'=>$manager,'form'=>$form),false);
    

?>
Saldo Proveedor
<b id="req_res02">$ 0.00</b>



<div class="actions">
<?php echo CHtml::ajaxSubmitButton(
	'Consultar Saldo',
	array('ordenesPago/consultarSaldoProveedor'),
	array(	'update'=>'#req_res02'	),
	array('class'=>'btn info')
); ?>
		<?php echo CHtml::submitButton('Guardar',array('class'=>'btn primary')); ?>
		<?php echo CHtml::submitButton('Reset',array('class'=>'btn ')); ?>
	</div>


 <?php $this->endWidget(); ?>
     