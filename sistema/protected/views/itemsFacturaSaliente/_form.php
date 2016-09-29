<tr>
<?php   echo $form->textField($model,"[$id]importeItemMinimo",array('class'=>'span1','readonly'=>'readonly','TYPE'=>'hidden')); ?>
<?php  echo $form->textField($model,"[$id]importeItemLista",array('class'=>'span1','readonly'=>'readonly','TYPE'=>'hidden')); ?>
    <?php  echo $form->textField($model,"[$id]solicitudCambioPrecio",array('class'=>'span5','readonly'=>'readonly','TYPE'=>'hidden')); ?>

<td>
<?php
$descuento=isset ($descuento)?$descuento:0;
 echo $form->errorSummary($model);
?>
	<?php echo $form->textField($model,"[$id]idFacturaSaliente",array('size'=>30,'maxlength'=>30,'TYPE'=>'hidden')); ?>
	<?php echo $form->textField($model,"[$id]idOrdenTrabajo",array('size'=>30,'maxlength'=>30,'TYPE'=>'hidden')); ?>
	<?php echo $form->textField($model,"[$id]idElemento",array('size'=>30,'maxlength'=>30,'TYPE'=>'hidden')); ?>
	
		<?php $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
//    'id'=>"ItemsFacturaSaliente_[$id]nombreItem",
//    'name'=>"ItemsFacturaSaliente[$id][nombreItem]",
		    "model"=>$model,
		"attribute"=>"[$id]nombreItem",
    'sourceUrl'=>$this->createUrl('stock/etiquetas',array('real'=>$model->nombreItem)),
    'options'=>array('width'=>250,
    'showAnim'=>'fold',

  'select'=>"js:function(event, ui) {
     $('#ItemsFacturaSaliente_".$id."_cantidad').val();" .
//     "document.getElementById('disponibilidad_').innerHTML=ui.item.disponibles;".
     "$('#ItemsFacturaSaliente_".$id."_idElemento').val(ui.item.id);
    $('#ItemsFacturaSaliente_".$id."_porcentajeIva').val(ui.item.porcentajeIva);" .
   
    "$('#ItemsFacturaSaliente_".$id."_cantidad').focus();" .
    "$('#ItemsFacturaSaliente_".$id."_importeItemLista').val(ui.item.precioLista);".
    "$('#ItemsFacturaSaliente_".$id."_tipoImporte').val('lista');".
    "$('#ItemsFacturaSaliente_".$id."_importeItemMinimo').val(ui.item.precioMinimo);".
    "$('#ItemsFacturaSaliente_".$id."_importeItem').val(ui.item.precioLista);
    
       
    if(document.getElementById('ItemsFacturaSaliente_".$id."_tipoImporte').value!='lista')
					{
					document.getElementById('ItemsFacturaSaliente_".$id."_bonificado').removeAttribute('readonly');
					}
					else
					{
					document.getElementById('ItemsFacturaSaliente_".$id."_bonificado').readonly='readonly';
					}
    
    " .
//    " (document.getElementById('ItemsFacturaSaliente_[".$id."]idOrdenTrabajo').value!='')? $('#ItemsFacturaSaliente_[".$id."]nombreItem').val( document.getElementById('ItemsFacturaSaliente_[".$id."]nombreItem').value + ' - '+ ui.item.valor) : $('#ItemsFacturaSaliente_[".$id."]nombreItem').val(ui.item.valor);
   " return false;
  }",
),
'htmlOptions'=>array('rows'=>5,'size'=>20,'class'=>'span5'),

));
?>
</td>
<td >

<?php echo $form->textField($model,"[$id]cantidad",array('class'=>'span1','onchange'=>'document.forms["formCrearFactura"].noValidate.value= true;
		document.forms["formCrearFactura"].submit();')); ?>
</td>
<td >
<?php echo $form->textField($model,"[$id]porcentajeIva",array('size'=>5,'maxlength'=>5,'class'=>'span1','onchange'=>'document.forms["formCrearFactura"].noValidate.value= true;
		document.forms["formCrearFactura"].submit();')); ?>

</td>
			 

<td >
<?php echo $form->textField($model,"[$id]importeItem",
		array("minValue" => '100','size'=>15,'maxlength'=>20,'class'=>'span2',
		'onchange'=>"		
		
		
  ",
  ));?>
</td>
<td >
<?php echo $form->textField($model,"[$id]importeItemMasIva",
		array("minValue" => '100','size'=>15,'maxlength'=>20,'class'=>'span2',
		'onchange'=>"		
		validate".$id."();
		
  ",
  ));

?>
    
</td>
<td>
<?php echo CHtml::link(
        'X', 
        '#', 
        array(
            'submit'=>'', 'class'=>'btn small error',
            'params'=>array(
                'ItemsFacturaSaliente[command]'=>'delete', 
                'ItemsFacturaSaliente[id]'=>$id, 
                'noValidate'=>true)
            ));?>
            <?php 
//            echo CHtml::button('Button Text', array('submit' => array('itemsFacturaSaliente/delete'))); 
            ?>
    </td>
</tr>

  <script type="text/javascript">
      var im=document.getElementById("ItemsFacturaSaliente_<?php echo $id ;?>_importeItem").value;
      var importeLista=document.getElementById("ItemsFacturaSaliente_<?php echo $id ;?>_importeItemLista").value;
      var maximo=document.getElementById("ItemsFacturaSaliente_<?php echo $id ;?>_importeItemLista").value - document.getElementById("ItemsFacturaSaliente_<?php echo $id ;?>_importeItemMinimo").value;
      var iva=document.getElementById("ItemsFacturaSaliente_<?php echo $id ;?>_porcentajeIva").value;
      document.getElementById("ItemsFacturaSaliente_<?php echo $id ;?>_importeItemMasIva").value= roundNumber(im*((iva/100)+1),<?php echo Settings::model()->getValorSistema('DECIMALES_FACTURAS');?>);
    function validate<?php echo $id;?>(){
        var importeIva=document.getElementById("ItemsFacturaSaliente_<?php echo $id ;?>_importeItemMasIva").value;
        var iva=document.getElementById("ItemsFacturaSaliente_<?php echo $id ;?>_porcentajeIva").value;
    	document.getElementById("ItemsFacturaSaliente_<?php echo $id ;?>_importeItem").value=round(importeIva/((iva/100)+1),<?php echo Settings::model()->getValorSistema('DECIMALES_FACTURAS');?>);
        
       var item=document.getElementById("ItemsFacturaSaliente_<?php echo $id ;?>_importeItem").value;
       
       var importeLista=document.getElementById("ItemsFacturaSaliente_<?php echo $id ;?>_importeItemLista").value;
      
       var imo=document.getElementById("ItemsFacturaSaliente_<?php echo $id ;?>_importeItem").value;
       
       if (parseInt(imo) < parseInt(importeLista)){
           var id=document.getElementById("ItemsFacturaSaliente_<?php echo $id ;?>_idElemento").value;
           var date = new Date()
           document.getElementById("ItemsFacturaSaliente_<?php echo $id ;?>_solicitudCambioPrecio").value=id+","+importeLista+","+imo+","+date.getTime()+","+<?php echo Yii::app()->user->id;?>;
       }else document.getElementById("ItemsFacturaSaliente_<?php echo $id ;?>_solicitudCambioPrecio").value='no';
        document.forms["formCrearFactura"].noValidate.value= true;
		document.forms["formCrearFactura"].submit();
}

    function round(x) {
    	  return Math.round(x*100)/100;
    	}
        function roundNumber(rnum, rlength) { // Arguments: number to round, number of decimal places
  var newnumber = Math.round(rnum*Math.pow(10,rlength))/Math.pow(10,rlength);
  return  parseFloat(newnumber); // Output the result to the form field (change for your purposes)
}
</script>
	