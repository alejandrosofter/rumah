<br>

<?php 
$ruta=isset($ruta)?$ruta:'presupuestoItems/index&idPresupuesto='.$_GET['idPresupuesto'];
$form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($ruta),
	'method'=>'post',

	
)); ?>
<div class='action-row'>


<b>Cantidad </b> <?php echo CHtml::textField('cantidad','1',array('size'=>30,'maxlength'=>30,'TYPE'=>'hidfden','class'=>'span1')); ?>  
<?php echo CHtml::textField('idStock','1',array('size'=>30,'maxlength'=>30,'TYPE'=>'hidden','class'=>'span1')); ?>  
<b>Producto </b> 

<?php $this->renderPartial('/stock/_buscarStockFactura2', array('model'=>$model,
    'extra'=>"$('#importe').val(roundNumber(ui.item.precioLista*((ui.item.porcentajeIva/100)+1),1));$('#valorCodigoBarras').val(ui.item.nombre);$('#iva').val(ui.item.porcentajeIva);$('#idStock').val(ui.item.idStock);"),false); ?>
<b> IVA </b> <?php echo CHtml::textField('iva','',array('size'=>30,'maxlength'=>30,'TYPE'=>'hidfden','class'=>'span1')); ?>  
<b> $ </b> <?php echo CHtml::textField('importe','',array('size'=>30,'maxlength'=>30,'TYPE'=>'hidfden','class'=>'span2')); ?>  

<?php echo CHtml::linkButton('Agregar', array('class'=>'btn small success','submit' => '', 'params' => array('codigoBarras'=> true) )); ?>
<script>
    function roundNumber(number,decimal_points) {
	if(!decimal_points) return Math.round(number);
	if(number == 0) {
		var decimals = "";
		for(var i=0;i<decimal_points;i++) decimals += "0";
		return "0."+decimals;
	}

	var exponent = Math.pow(10,decimal_points);
	var num = Math.round((number * exponent)).toString();
	return num.slice(0,-1*decimal_points) + "." + num.slice(-1*decimal_points)
}
    </script>

</div>
<?php $this->endWidget(); ?>
