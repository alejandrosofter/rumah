<?php
$this->breadcrumbs=array(
	'Centro de Stock'=>array('/stock/centroStock'),
	'Consulta de precios'
);

?>
<h1>CONSULTA DE PRECIOS</h1>

<?php $form=$this->beginWidget('CActiveForm', array(
    'enableAjaxValidation'=>false,'id'=>'Reporte-form',
//'action'=>Yii::app()->createUrl('stock/aplicarStockInventario'),
	'method'=>'post',
    'focus'=>'#Stock_idTipoProducto'
)); ?>
<div class="form">
    <div class="row">
        <b>FORMA DE PAGO </b>
<?php $this->renderPartial('/formasDePago/_formaPago2',array('tipo'=>2,'extra'=>'if(isset(document.forms["Reporte-form"].noValidate)) document.forms["Reporte-form"].noValidate.value= true;
		document.forms["Reporte-form"].submit();','model'=>$model,'form'=>$form,'campo'=>'idStock'))?>
  </div>
    <div class="row">
		<?php echo $form->labelEx($model,'nombre'); ?>
		
            <?php echo $this->renderPartial('/stock/buscadorProductos',array('idStock'=>'idTipoProducto','model'=>$model,'class'=>'span6','campo'=>'idTipoProducto','nombreModelo'=>'Stock','extra'=>''));
            echo '<br>'.$nombre
            ?>
        <br/><big><big><big><big><big>
            <?php echo '    $ '. $importe;	
            ?>
</big></big></big></big></big>
    </div>
<div class="actions">
       <br/>
<?php echo CHtml::submitButton('Consultar',array('class'=>'btn primary')); ?>
</div>
</div>
<?php $this->endWidget(); ?> 	