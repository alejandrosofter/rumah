<div >

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'items',
	'action'=>Yii::app()->createUrl('itemsFacturaSaliente/create&idFactura='.$model->idFacturaSaliente),
	'method'=>'post',
	'focus'=>array($model,'nombreItem'),
	'enableAjaxValidation'=>false,

)); ?>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textField($model,'idFacturaSaliente',array('size'=>30,'maxlength'=>30,'TYPE'=>'hidden')); ?>
	<?php echo $form->textField($model,'idOrdenTrabajo',array('size'=>30,'maxlength'=>30,'TYPE'=>'hidden')); ?>
	<?php echo $form->textField($model,'idElemento',array('size'=>30,'maxlength'=>30,'TYPE'=>'hidden')); ?>


	<div class="row">
		<?php echo $form->labelEx($model,'nombreItem'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
    'id'=>'ItemsFacturaSaliente_nombreItem',
    'name'=>'ItemsFacturaSaliente[nombreItem]',
    'sourceUrl'=>$this->createUrl('stock/etiquetas',array('real'=>$model->nombreItem)),
    'options'=>array('width'=>250,
    'showAnim'=>'fold',

  'select'=>"js:function(event, ui) {
     $('#ItemsFacturaSaliente_cantidad').val();" .
     "document.getElementById('disponibilidad_').innerHTML=ui.item.disponibles;".
     "$('#ItemsFacturaSaliente_idElemento').val(ui.item.id);
    $('#ItemsFacturaSaliente_porcentajeIva').val(ui.item.porcentajeIva);" .
    //" $('#ItemsFacturaSaliente_nombreItem').val('sdfsdf');" .
    //"$('#buscador').val('');".
    "$('#ItemsFacturaSaliente_cantidad').focus();" .
    "$('#ItemsFacturaSaliente_importeItemLista').val(ui.item.precioLista);".
		"$( '#ItemsFacturaSaliente_slider' ).val(  '7' );" .
		"$( '.selector' ).slider({ min: -7 });". 
		"$( '#ItemsFacturaSaliente_slider.selector' ).slider({ min: -7 });".
		"$( '#ItemsFacturaSaliente_' ).slider({ min: -7 });".
		
		
    "$('#ItemsFacturaSaliente_tipoImporte').val('lista');".
    "$('#ItemsFacturaSaliente_importeItemMinimo').val(ui.item.precioMinimo);".
    "$('#ItemsFacturaSaliente_importeItem').val(ui.item.precioLista);" .
    "document.getElementById('ItemsFacturaSaliente_importeItem').readonly='readonly';" .
    " (document.getElementById('ItemsFacturaSaliente_idOrdenTrabajo').value!='')? $('#ItemsFacturaSaliente_nombreItem').val( document.getElementById('ItemsFacturaSaliente_nombreItem').value + ' - '+ ui.item.valor) : $('#ItemsFacturaSaliente_nombreItem').val(ui.item.valor);
    return false;
  }",
),
'htmlOptions'=>array('rows'=>5,'size'=>20),

));
?>

		<?php echo $form->error($model,'nombreItem'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cantidad'); ?>
		<?php echo $form->textField($model,'cantidad',array('size'=>5)); ?><br>
		<?php echo CHtml::link('','',array('id'=>'disponibilidad_')); ?><br>
		<?php echo $form->error($model,'cantidad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tipoImporte'); ?>
		<?php echo  $form->dropDownList($model,'tipoImporte',$model->getTipoImportes(),array (
		'onchange'=>
				"
				if(document.getElementById('ItemsFacturaSaliente_tipoImporte').value=='bonificado'){
   					document.getElementById('ItemsFacturaSaliente_importeItem').value =  document.getElementById('ItemsFacturaSaliente_importeItemMinimo').value;
   					document.getElementById('ItemsFacturaSaliente_bonificado').removeAttribute('readonly');
   					
   					document.getElementById('ItemsFacturaSaliente_bonificado').value = 
   					round( document.getElementById('ItemsFacturaSaliente_importeItemLista').value -
   					 document.getElementById('ItemsFacturaSaliente_importeItemMinimo').value);
   					}
   					
				if(document.getElementById('ItemsFacturaSaliente_tipoImporte').value=='lista'){
					document.getElementById('ItemsFacturaSaliente_importeItem').value =  document.getElementById('ItemsFacturaSaliente_importeItemLista').value;
					document.getElementById('ItemsFacturaSaliente_bonificado').setAttribute('readonly', true); 
					document.getElementById('ItemsFacturaSaliente_bonificado').value = 0}
			
   				
  ",));?>
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'porcentajeIva'); ?>
		<?php echo $form->textField($model,'porcentajeIva',array('size'=>5,'maxlength'=>5)); ?>
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'importeItem'); ?> 
		<?php echo $form->textField($model,'importeItem',
		array("minValue" => '100','size'=>15,'maxlength'=>20,'readonly'=>'readonly'));?>
		
<?php echo "Bonificacion ";  
echo $form->textField($model,'bonificado',array('class'=>'span2','readonly'=>'readonly',
		'onchange'=>"
		 document.getElementById('ItemsFacturaSaliente_bonificado').value =
		  round( document.getElementById('ItemsFacturaSaliente_bonificado').value);
		
	 	 if (validate())
		{
					document.getElementById('ItemsFacturaSaliente_importeItem').value = 
   					round( document.getElementById('ItemsFacturaSaliente_importeItemLista').value -
   					 document.getElementById('ItemsFacturaSaliente_bonificado').value);
		}else
		{		
					
		}  				
  ",)); ?>
  <script type="text/javascript">
    function validate(){
        
        if ((document.getElementById('ItemsFacturaSaliente_importeItemLista').value-
        		document.getElementById('ItemsFacturaSaliente_importeItemMinimo').value) >= 
        			document.getElementById('ItemsFacturaSaliente_bonificado').value) {
            return true
        }else{
        	document.getElementById('ItemsFacturaSaliente_bonificado').value=0;
            alert("Bonificacion no puede ser mayor a Precio de lista menos Precio Minimo")
            return true;
        }
}

    function round(x) {
    	  return Math.round(x*100)/100;
    	}
</script>
</div>

		
	<div class="row">
		<?php echo "Minimo ";  echo $form->textField($model,'importeItemMinimo',array('class'=>'span2','readonly'=>'readonly')); ?>
		<?php echo "Lista "; echo $form->textField($model,'importeItemLista',array('class'=>'span2','readonly'=>'readonly')); ?>
	
	
	</div>
	
	

	<div class="row buttons">
		<?php $this->widget('zii.widgets.jui.CJuiButton', array(
		'name'=>'importeIva_',
		'caption'=>('Agregar' ),
		'options'=>array(
        ),
));?>

	</div>

	
<!--<table border="1" >
<td>
<th>Precios Producto/Servicio</th>
</td>
<td>
<tr>
<td>Lista</td>
<td><?php echo $form->textField($model,'importeItemLista',array('size'=>10,'maxlength'=>10,'readonly'=>'readonly')); ?></td>
</td>
<td>

<td>Contado</td>
<td><?php echo $form->textField($model,'importeContado',array('size'=>10,'maxlength'=>10,'readonly'=>'readonly')); ?></td>
</td>
<td>
</tr>
<tr>
<td>Minimo</td>
<td><?php echo $form->textField($model,'importeItemMinimo',array('size'=>10,'maxlength'=>10,'readonly'=>'readonly')); ?></td>
</td>
<td>

<td>Neto</td>
<td><?php echo $form->textField($model,'importeItemSinIva',array('size'=>10,'maxlength'=>10,'readonly'=>'readonly')); ?></td>
</td>

		<?php echo $form->error($model,'importeItem'); ?>
</tr>
</table>
	

	

--><?php $this->endWidget(); ?>

</div><!-- form -->