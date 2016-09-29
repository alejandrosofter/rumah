<h1>Nueva Factura </h1>
Crea una factura los cuales serán subidos como conceptos.
<?php $form=$this->beginWidget('CActiveForm', array(
'focus'=>array($model,'idProveedor')
));?>
<div class="row">
<?PHP

$this->renderPartial('/facturasEntrantes/_form', array('model'=>$model,'form'=>$form),false);
$this->renderPartial('itemsFacturaConceptos', array('model'=>$model,'manager'=>$manager,'form'=>$form),false);

?>
	</div>
<div class="actions">
		<?php echo CHtml::submitButton('Guardar Factura',array('class'=>'btn primary')); ?>
		
	</div>


 <?php $this->endWidget(); ?>
     