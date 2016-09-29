<h1>Nueva Orden de Cobro</h1>
Se realiza la imputacion bajo los vencimientos generados en la factura (FORMA DE PAGO):
<?php $form=$this->beginWidget('CActiveForm', array(
'id'=>'formOrdenes',
'focus'=>array($model,'idCliente')
));
$this->menu=array(
//	array('label'=>'Agregar Vencimiento', 'url'=>array('/facturasSalientesVencimiento/create&idFactura='.isset($idFactura)?$idFactura:0)),
//	
);
?>
<?php

$this->widget('ext.bootstrap.widgets.BootAlert',array(
    'id'=>'alert',
    'keys'=>array('success','info','warning','error'),
)); 
?>
<?PHP
$this->renderPartial('/ordenesCobro/_form', array('model'=>$model,'form'=>$form),false);
$this->renderPartial('/ordenesCobro/_itemsCobro', array('manager'=>$manager,'model'=>$model,'form'=>$form),false);
    

?>

<?php 

$btnFinaliza= "<br><br>".CHtml::link(
        'FINALIZAR', 
        '#', 
        array(
            'onclick'=>'enviar()',
            'class'=>'btn primary'
            ));

echo "<script>
    function enviar(){
var input = document.createElement('input'); // Crea un elemento input

with(input) {

setAttribute('name', 'noValidate'); 

setAttribute('type', 'hidden'); 

setAttribute('value', 'false'); 
}
document.forms['formOrdenes'].appendChild(input);
document.forms['formOrdenes'].submit();
}
</script>";
?>

<div class="actions">

		<?php echo $btnFinaliza; ?>
	</div>


 <?php $this->endWidget(); ?>
     