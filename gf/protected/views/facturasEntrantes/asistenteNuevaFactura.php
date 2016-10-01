<h1>Asistente para Neuva Factura</h1>
Compete los datos requeridos y luego acepte.
<?php $form=$this->beginWidget('CActiveForm', array(

	'enableAjaxValidation'=>false,
)); ?>
<?PHP

$this->widget('zii.widgets.jui.CJuiAccordion', array(
    'panels'=>array(
     //'PASO 1: Crear Factura'=>$this->renderPartial('/facturasEntrantes/_form',array('model'=>$model),true),
     'PASO 2: Items'=>$this->renderPartial('/comprasItems/items',array('model'=>$modelItems),true),
    // 'PASO 3: Pago '=>$this->renderPartial('/acciones/verAcciones',array('subTipo'=>'informes','tipo'=>'compras','model'=>Acciones::model()),true),
    ),
    // additional javascript options for the accordion plugin
    'options'=>array(
        'animated'=>'bounceslide',
    ),
));
?>
	<div class="actions">
		<?php echo CHtml::submitButton('Aceptar',array('class'=>'btn primary')); ?>
		<?php echo CHtml::submitButton('Reset',array('class'=>'btn ')); ?>
	</div>
<?php $this->endWidget(); ?>