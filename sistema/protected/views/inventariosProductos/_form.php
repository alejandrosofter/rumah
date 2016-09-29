<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'inventarios-productos-form',
	'focus'=>'#buscador',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>
<?php echo $form->errorSummary($modelPrecio); ?>
	<div class="row">
		<?php echo $form->labelEx($model,'idInventario'); ?>
		<?php echo  $form->dropDownList($model,'idInventario',CHtml::listData(Inventarios::model()->findAll(), 'idInventario', 'fechaInventario'),array ('prompt'=>'Seleccione el Inventario...'));?>
		<?php echo $form->error($model,'idInventario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fechaProductoInventario'); ?>
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
    'name'=>'InventariosProductos[fechaProductoInventario]',
   'value'=>$model->fechaProductoInventario,
    // additional javascript options for the date picker plugin
    'options'=>array(
        'showAnim'=>'fold',
        'dateFormat' => 'yy-mm-dd',
       
    ),
    'htmlOptions'=>array(
    	
        'style'=>'height:20px;'
    ),
)); ?>
		<?php echo $form->error($model,'fechaProductoInventario'); ?>
	</div>

	<div class="row">
	<?php echo $form->labelEx($model,'idStockInventario'); ?>
	  <?php echo $this->renderPartial('/stock/buscadorProductos',array('model'=>$model,'class'=>'span6','campo'=>'idStockInventario','idStock'=>'idStockInventario','nombreStock'=>'idStockInventario','nombreModelo'=>'InventariosProductos','extra'=>''));?>

	<?php echo $form->error($model,'idStockInventario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cantidadInventario'); ?>
		<?php echo $form->textField($model,'cantidadInventario',array('class'=>'span1')); ?>
		<?php echo $form->error($model,'cantidadInventario'); ?>
	</div>
        <div class="row">
            <?php echo $form->labelEx($modelPrecio,'importePesosStock'); ?>
		<?php echo $this->renderPartial('/varios/moneyInput',array('form'=>$form,'campo'=>'importePesosStock','nombreModelo'=>'stockPreciosItems_importePesosStock','model'=>$modelPrecio)); ?>
	</div>


<div class="actions">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Agregar' : 'Guardar',array('class'=>'btn primary')); ?>
		<?php echo CHtml::resetButton('Reset',array('class'=>'btn ')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->