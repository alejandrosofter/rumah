<h1>Nueva Factura</h1>
Crea una factura los cuales serán subidos a stock.
<?php $form=$this->beginWidget('CActiveForm', array(
'focus'=>$focus
));?>
<div id='factura'  class="row">
<?PHP

	
$this->renderPartial('/facturasEntrantes/_form', array('model'=>$model,'form'=>$form),false);

$this->renderPartial('/varios/busquedaPorCodigo', array('model'=>$model,'form'=>$form,'precio'=>1),false);
//$this->widget('ext.bootstrap.widgets.BootAlert',array(
//    'id'=>'alert',
//    'keys'=>array('success','info','warning','error'),
//)); 
     $this->renderPartial('itemsFactura', array('model'=>$model,'manager'=>$manager,'form'=>$form),false);

?>
</div>
<div class="actions">
		<?php echo CHtml::submitButton('Guardar Factura',array('class'=>'btn primary')); ?>
		<?php echo CHtml::submitButton('Reset',array('class'=>'btn ')); ?>
	</div>


 <?php $this->endWidget(); ?>
     