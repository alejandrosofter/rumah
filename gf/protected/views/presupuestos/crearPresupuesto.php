<h1>Nuevo Presupuesto</h1>
<?php $form=$this->beginWidget('CActiveForm', array(

'id'=>'formCrearFactura'
));?>
<?PHP
$pos=0;
if(isset($_POST['PresupuestoItems']))
	$pos=(($_POST['PresupuestoItems']['command']=='add')||$_POST['PresupuestoItems']['command']=='delete')?1:0;
	
$this->widget('zii.widgets.jui.CJuiAccordion', array(
    'panels'=>array(
        '<b>Datos del Presupuesto </b><i>Paso 1</i>'=>$this->renderPartial('/presupuestos/_form', array('model'=>$model,'form'=>$form),true),
        '<b>Productos</b> <i>Paso 2</i>'=>$this->renderPartial('/presupuestos/itemsPresupuesto', array('model'=>$model,'manager'=>$manager,'form'=>$form,'condicionVenta'=>$condicionVenta),true),
      ),
    // additional javascript options for the accordion plugin
    'options'=>array(
        'animated'=>'bounceslide',
        'active'=>$pos
    ),
));
?>

<div class="actions">
<?php echo CHtml::link(
        'Guardar', 
        '#', 
        array(
            'submit'=>'', 'class'=>'btn small primary',
            'params'=>array(
                'noValidate'=>'guardar')
            ));?>
            
		<?php 
//		echo CHtml::submitButton('Guardar',array('class'=>'btn primary')); 
		?>
		<?php echo CHtml::submitButton('Reset',array('class'=>'btn ')); ?>
	</div>


 <?php $this->endWidget(); ?>
     