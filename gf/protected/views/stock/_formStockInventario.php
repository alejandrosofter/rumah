<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'stock-form',
	'focus'=>array($model,'codigoProducto'),
	'enableAjaxValidation'=>false,
)); 


?>
	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>
<?php echo $form->textField($model,'tipoProducto',array('size'=>30,'maxlength'=>30,'TYPE'=>'hidden','VALUE'=>'STOCK')); ?>
	<?php echo $form->errorSummary($model);
        echo $form->errorSummary($modelInventario);
        echo $form->errorSummary($modelPrecio);
        $this->widget('ext.bootstrap.widgets.BootAlert',array(
    'id'=>'alert',
    'keys'=>array('success','info','warning','error'),
));
        ?>

<div class="row">
		<?php echo $form->labelEx($model,'codigoProducto'); ?>
		<?php echo $form->textField($model,'codigoProducto',array('class'=>'span2')); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'nombre'); ?>
		
            <?php echo $this->renderPartial('/stock/buscadorProductos',array('model'=>$model,'class'=>'span6','campo'=>'nombre','nombreModelo'=>'Stock','extra'=>''));?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'unidadMedida'); ?>
		<?php echo  $form->dropDownList($model,'unidadMedida',$model->getUnidades(),array ('prompt'=>'Seleccione la Unidad...'));?>
	</div>
	

	<div class="row">
		<?php echo $form->labelEx($model,'detalle'); ?>
		<?php echo $form->textArea($model,'detalle',array('rows'=>3, 'class'=>'span5')); ?>
		<span class='help-block'><b>NOTA: </b>Descripcion corta del producto. </span>
	</div>
	
		

	<div class="row compactRadioGroup">
		<?php echo $form->labelEx($model,'estado'); ?>
		<?php echo  $form->dropDownList($model,'estado',$model->getEstados(),array ('prompt'=>'Seleccione ...'));?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'porcentajeIva'); ?>
		<?php echo $form->textField($model,'porcentajeIva',array('class'=>'span1')); ?>
		
		<?php echo $form->error($model,'porcentajeIva'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'min'); ?>
		<?php echo $form->textField($model,'min',array('class'=>'span1')); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'max'); ?>
		<?php echo $form->textField($model,'max',array('class'=>'span1')); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'idTipoProducto'); ?>
		<?php echo  $form->dropDownList($model,'idTipoProducto',CHtml::listData(StockTipoProducto::model()->findAll(array('order'=>'nombre')), 'idStockTipo', 'nombre'),array ('prompt'=>'Seleccione el Tipo de Producto...'));?>

	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idStockMarca'); ?>
	<?php  echo  $form->dropDownList($model,'idStockMarca',CHtml::listData(StockMarcas::model()->findAll(array('order'=>'nombreMarca')), 'idStockMarcas', 'nombreMarca'),array ('prompt'=>'Seleccione Marca del Producto...'));?>

	</div>
        <div class="row">
            <?php echo $form->labelEx($modelInventario,'cantidadInventario'); ?>
		<?php echo $form->textField($modelInventario,'cantidadInventario',array('class'=>'span1')); ?>
          
	</div>
        <div class="row">
            <?php echo $form->labelEx($modelPrecio,'importePesosStock'); ?>
		<?php echo $this->renderPartial('/varios/moneyInput',array('form'=>$form,'campo'=>'importePesosStock','nombreModelo'=>'stockPreciosItems_importePesosStock','model'=>$modelPrecio)); ?>
	</div>
        <?php 
        if($model->isNewRecord) echo 'Volver a Cargar otro Producto '.CHtml::checkBox('vuelve');
        ?>
        <div class="row">
		<?php echo $form->labelEx($model,'codigoBarra'); ?>
		<?php $this->renderPartial('/varios/codigoBarras',array('campoLlegada'=>'Stock_codigoBarra','pais'=>Stock::model()->pais,'empresa'=>Stock::model()->empresa, 'codigoProducto'=>isset($ultimoCargado)?$ultimoCargado:$model->idStock , 'form'=>$form,'model'=>$model,'campo'=>'codigoBarra'))?>
		
		
		<?php //echo CHtml::link(CHtml::image('images/iconos/famfam/printer.png'),'#',array('onclick'=>'$("#dialog_").dialog("open"); return false;'))?>

		<?php
                $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'dialog_',
    // additional javascript options for the dialog plugin
    'options'=>array(
        'title'=>'Dialog box 1',
        'autoOpen'=>false,
        'modal'=>true
    ),
));



$this->endWidget('zii.widgets.jui.CJuiDialog');
                ?>
            <b>Imprime </b><?php echo CHtml::checkBox('imprime');?>
	</div>
<div class="actions">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Aceptar' : 'Guardar',array('class'=>'btn primary')); ?>
		<?php echo CHtml::resetButton('Reset',array('class'=>'btn ')); ?>
	</div>

<?php $this->endWidget(); ?>
<script>
         function pulsado()
         {
            var applet = document.getElementById("appletJava");
            var cont=document.getElementById("content");
            var texto=(cont.innerHTML);
            texto=texto.replace("'", '"');
            applet.print(texto,true,"impre","url",1,false,210,290,0,0);
         }
      </script>
      <applet id='appletJava' code=ImprimirPregunta.java width='0' height='0' archive='scripts/Prueba2_2.jar'>
                    
      
      
</applet>
</div><!-- form -->