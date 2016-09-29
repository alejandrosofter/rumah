<h1>Asignar importes</h1>
Se realiza la asignacion del importe a cuenta a la/s factura/s deseadas:
<?php $form=$this->beginWidget('CActiveForm', array(
'id'=>'formOrdenes',
//'focus'=>array($model,'idCliente')
));
$this->menu=array(
//	array('label'=>'Agregar Vencimiento', 'url'=>array('/facturasSalientesVencimiento/create&idFactura='.isset($idFactura)?$idFactura:0)),
//	
);
?>

<?php
echo CHtml::textField('noValidate','',array('TYPE'=>'hidden'));
$this->widget('ext.bootstrap.widgets.BootAlert',array(
    'id'=>'alert',
    'keys'=>array('success','info','warning','error'),
)); 
?>
<?PHP
$this->renderPartial('/ordenesCobro/_itemsCobroCuenta', array('importeCuenta'=>$importeCuenta,'manager'=>$manager,'model'=>$model,'form'=>$form),false);
    

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
     