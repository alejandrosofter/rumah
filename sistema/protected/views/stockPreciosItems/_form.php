<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'stock-precios-items-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textField($model,'idStockPrecio',array('size'=>30,'maxlength'=>30,'TYPE'=>'hidden')); ?>


	<div class="row">
		<?php echo $form->labelEx($model,'idStock'); ?>
		<?php echo  $form->dropDownList($model,'idStock',CHtml::listData(Stock::model()->findAll(), 'idStock', 'nombre'),array ('prompt'=>'Seleccione el Producto...'));?>
		<?php echo $form->error($model,'idStock'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'importePesosStock'); ?>
		<?php echo $form->textField($model,'importePesosStock',array('class'=>'span2','onchange'=>'cambiarImporteLista()')); ?>
            $ LISTA FINAL
            <?php echo CHtml::textField('listaFinal','',array('class'=>'span2','onchange'=>'cambiarImporteLista2()')) ?>
		<?php echo $form->error($model,'importePesosStock'); ?>

	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'importePesosStockMin'); ?>
		<?php echo $form->textField($model,'importePesosStockMin',array('class'=>'span2','onchange'=>'cambiarImporteMin()')); ?>
            $ MINIMO FINAL
            <?php echo CHtml::textField('minFinal','',array('class'=>'span2','onchange'=>'cambiarImporteMin2()')) ?>
	
	</div>

	<div class="actions">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Aceptar' : 'Guardar',array('class'=>'btn primary')); ?>
	
	</div>

                <?php $this->endWidget(); ?>
        
        <script>
            cambiarImporteMin();
            cambiarImporteLista();
            cambiarImporteMin2();
            cambiarImporteLista2();
            
            
         
            function cambiarImporteMin(){
                document.getElementById('minFinal').value= round( document.getElementById('stockPreciosItems_importePesosStockMin').value*<?php echo ($_GET['porcentajeIva']/100)+1;?> );
            }
            function cambiarImporteMin2(){
                document.getElementById('stockPreciosItems_importePesosStockMin').value= round( document.getElementById('minFinal').value/<?php echo ($_GET['porcentajeIva']/100)+1;?>);
            }
            function cambiarImporteLista(){
                document.getElementById('listaFinal').value= round( document.getElementById('stockPreciosItems_importePesosStock').value*<?php echo ($_GET['porcentajeIva']/100)+1;?>);
            }
            function cambiarImporteLista2(){
                document.getElementById('stockPreciosItems_importePesosStock').value= round( document.getElementById('listaFinal').value/<?php echo ($_GET['porcentajeIva']/100)+1;?> );
            }
            function round(x) {
    	  return Math.round(x*100)/100;
    	}
        </script>
            
</div><!-- form -->