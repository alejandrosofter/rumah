<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'stock-precios-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'fechaStock'); ?>
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
    'name'=>'StockPrecios[fechaStock]',
    'value'=>$model->fechaStock,
    // additional javascript options for the date picker plugin
    'options'=>array(
        'showAnim'=>'fold',
        'dateFormat' => 'yy-mm-dd',
    ),
    'htmlOptions'=>array(
    	
        'style'=>'height:20px;'
    ),
)); ?>
		<?php echo $form->error($model,'fechaStock'); ?>
	</div>

		<?php echo $form->textField($model,'enServicios',array('size'=>30,'maxlength'=>30,'TYPE'=>'hidden','VALUE'=>'0')); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'tipo'); ?>
		<?php echo  $form->dropDownList($model,'tipo',$model->getTipos(),array ('prompt'=>'Seleccione el tipo de Carga...','READONLY'=>'READONLY'));?>
		<?php echo $form->error($model,'tipo'); ?>
		</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idTipo'); ?>
		<?php switch ($model->tipo) {
    			case 'compra':
        			echo  $form->dropDownList($model,'idTipo',CHtml::listData(Compras::model()->findAll(), 'idCompra', 'fechaCompra'),array ('prompt'=>'Seleccione la compra...'));
        		break;
    			case 'inventario':
        			echo  $form->dropDownList($model,'idTipo',CHtml::listData(Inventarios::model()->findAll(), 'idInventario', 'fechaInventario'),array ('prompt'=>'Seleccione el Inventario...'));
        		break;
    			case 'porTipo':
       			 echo  $form->dropDownList($model,'idTipo',CHtml::listData(StockTipoProducto::model()->findAll(), 'idStockTipo', 'nombre'),array ('prompt'=>'Seleccione el Tipo...'));
        		break;
        		case 'servicios':
       			 echo  $form->dropDownList($model,'idTipo',CHtml::listData(Cuentas::model()->findAll(), 'idCuenta', 'nombre'),array ('prompt'=>'Seleccione la Cuenta...'));
        		break;
};
?>
		<?php echo $form->error($model,'idTipo'); ?>
	</div>
	<div class="row">
		<?php if($model->tipo=='porTipo') echo $form->labelEx($model,'porcentajeVariacion'); ?>
		<?php if($model->tipo=='porTipo') echo $form->textField($model,'porcentajeVariacion'); ?>
		<?php if($model->tipo=='porTipo') echo $form->error($model,'porcentajeVariacion'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Aceptar' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->