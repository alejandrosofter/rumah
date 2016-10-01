<h1>Nueva Factura Rapida</h1>
<?php $form=$this->beginWidget('CActiveForm', array(
'focus'=>$focus,
'id'=>'formCrearFactura'
	   
));?>
<div class="row" >

    
<?PHP

$this->renderPartial('/facturasSalientes/_formFactRapida', array('model'=>$model,'form'=>$form,'formaPago'=>$formaPago,'imprime'=>$imprime),false);
?>
<?php

//$this->widget('ext.bootstrap.widgets.BootAlert',array(
//    'id'=>'alert',
//    'keys'=>array('success','info','warning','error'),
//)); 
?>

<?php

$this->renderPartial('itemsFactura', array('interes'=>$interes,'bonificacion'=>$bonificacion,'model'=>$model,'manager'=>$manager,'form'=>$form,'condicionVenta'=>$condicionVenta,'formaPago'=>$formaPago),false);


?>
</div>
<?php 
$this->rutaFormulario="facturasSalientes/facturaRapida";
$this->formularioContenido=true;
$this->extra.= "<br><br>".CHtml::link(
        'FINALIZAR FACTURA', 
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
document.forms['formCrearFactura'].appendChild(input);
document.forms['formCrearFactura'].submit();
}
</script>";
?>
		



 <?php $this->endWidget(); ?>
     