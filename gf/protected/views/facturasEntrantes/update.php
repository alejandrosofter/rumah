<?php
$this->breadcrumbs=array(
	'Centro de Compras'=>array('/facturasEntrantes/facturas'), 'Actualizar Factura'
);

$this->menu=array(
	array('label'=>'Facturas', 'url'=>array('/facturasEntrantes')),
	array('label'=>'Nueva Factura de Compra', 'url'=>array('create')),
	array('label'=>'Actualizar Factura',),

);
?>

<h1>Actualizar Factura de Compra <?php echo $model->idFacturaEntrante; ?></h1>
<div id='factura'  class="row">
<?php $form=$this->beginWidget('CActiveForm', array());?>
<?php 
echo $this->renderPartial('_form', array('model'=>$model,'form'=>$form)); 
$this->renderPartial('/varios/busquedaPorCodigo', array('model'=>$model,'form'=>$form),false);
$this->widget('ext.bootstrap.widgets.BootAlert',array(
    'id'=>'alert',
    'keys'=>array('success','info','warning','error'),
)); 
     $this->renderPartial('itemsFactura', array('model'=>$model,'manager'=>$manager,'form'=>$form),false);

?>
</div>
<div class="actions">
		<?php echo CHtml::submitButton('Actualizar Factura',array('class'=>'btn primary')); ?>
	</div>
 <?php $this->endWidget(); ?>