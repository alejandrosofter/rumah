<br>

<div>

<div id='codigoBarra'>
<b>Cantidad </b> <?php echo CHtml::textField('cantidad','1',array('size'=>30,'maxlength'=>30,'TYPE'=>'hidfden','class'=>'span1')); ?>  

<b>Producto </b> 

<?php $this->renderPartial('/stock/_buscarStockFactura', array('model'=>$model,'form'=>$form),false); ?>
<?php 
if(isset($precio)){
    echo "<b>$ </b> ";
    $this->renderPartial('/varios/moneyField2',array('class'=>'span2'));
}

?>

<?php echo CHtml::linkButton('Agregar', array('class'=>'btn small success','submit' => '', 'params' => array('codigoBarras'=> true) )); ?>
</div>

</div>