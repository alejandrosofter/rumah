<h1>Nuevo Gasto Rapido </h1>
Crea una factura con un item de forma facil y practica.
<?php $form=$this->beginWidget('CActiveForm', array(
'focus'=>array($model,'idProveedor')
));?>
<div class="row">
<?PHP

$this->renderPartial('/facturasEntrantes/_formRapida', array('model2'=>$model2,'model'=>$model,'tipoFactura'=>$tipoFactura,'form'=>$form),false);
//$this->renderPartial('itemsFacturaConceptos', array('model'=>$model,'manager'=>$manager,'form'=>$form),false);

?>
	</div>
<div class="actions">
		<?php echo CHtml::submitButton('Guardar Factura',array('class'=>'btn primary')); ?>
		
	</div>


 <?php $this->endWidget(); ?>