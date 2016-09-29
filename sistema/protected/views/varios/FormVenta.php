<tr>

<td>
	<?php echo $form->textField($model,"[$id]$idKey",array('size'=>30,'maxlength'=>30,'TYPE'=>'hidden')); ?>
	<?php echo $form->textField($model,"[$id]$idOrden",array('size'=>30,'maxlength'=>30,'TYPE'=>'hidden')); ?>
	<?php echo $form->textField($model,"[$id]$idTabla",array('size'=>30,'maxlength'=>30,'TYPE'=>'hidden')); ?>
	
		<?php $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
//    'id'=>"'.$nombreModelo.'_[$id]nombreItem",
//    'name'=>"'.$nombreModelo.'[$id][nombreItem]",
		    "model"=>$model,
		"attribute"=>"[$id]$nombreModelo",
    'sourceUrl'=>$this->createUrl('stock/etiquetas',array('real'=>$model->$nombreModelo)),
    'options'=>array('width'=>250,
    'showAnim'=>'fold',

  'select'=>"js:function(event, ui) {
     $('#'.$nombreModelo.'_".$id."_cantidad').val();" .
//     "document.getElementById('disponibilidad_').innerHTML=ui.item.disponibles;".
     "$('#'.$nombreModelo.'_".$id."_idElemento').val(ui.item.id);
    $('#'.$nombreModelo.'_".$id."_porcentajeIva').val(ui.item.porcentajeIva);" .
   
    "$('#'.$nombreModelo.'_".$id."_cantidad').focus();" .
    "$('#'.$nombreModelo.'_".$id."_importeItemLista').val(ui.item.precioLista);".
    "$('#'.$nombreModelo.'_".$id."_tipoImporte').val('lista');".
    "$('#'.$nombreModelo.'_".$id."_importeItemMinimo').val(ui.item.precioMinimo);".
    "$('#'.$nombreModelo.'_".$id."_importeItem').val(ui.item.precioLista);
    
       
    if(document.getElementById(''.$nombreModelo.'_".$id."_tipoImporte').value!='lista')
					{
					document.getElementById(''.$nombreModelo.'_".$id."_bonificado').removeAttribute('readonly');
					}
					else
					{
					document.getElementById(''.$nombreModelo.'_".$id."_bonificado').readonly='readonly';
					}
    
    " .
//    " (document.getElementById(''.$nombreModelo.'_[".$id."]idOrdenTrabajo').value!='')? $('#'.$nombreModelo.'_[".$id."]nombreItem').val( document.getElementById(''.$nombreModelo.'_[".$id."]nombreItem').value + ' - '+ ui.item.valor) : $('#'.$nombreModelo.'_[".$id."]nombreItem').val(ui.item.valor);
   " return false;
  }",
),
'htmlOptions'=>array('rows'=>5,'size'=>20,'class'=>'span5'),

));
?>
</td>
<td >

<?php echo $form->textField($model,"[$id]cantidad",array('class'=>'span1',
'onchange'=>"	
"
,)); ?>
</td>
<td >
<?php echo $form->textField($model,"[$id]porcentajeIva",array('size'=>5,'maxlength'=>5,'class'=>'span1')); ?>

</td>
<td >
		<?php echo  $form->dropDownList($model,"[$id]tipoImporte",$model->getTipoImportes()
		,array ('class'=>'span2',
		'onchange'=>
				"
				
				if(document.getElementById(''.$nombreModelo.'_".$id."_bonificado').value!='lista')
					{
						
   					document.getElementById(''.$nombreModelo.'_".$id."_importeItem').value = round( document.getElementById(''.$nombreModelo.'_".$id."_importeItemMinimo').value);
   					document.getElementById(''.$nombreModelo.'_".$id."_bonificado').value = round( document.getElementById(''.$nombreModelo.'_".$id."_importeItemLista').value - document.getElementById(''.$nombreModelo.'_".$id."_importeItemMinimo').value);
   					
   					document.getElementById(''.$nombreModelo.'_".$id."_bonificado').removeAttribute('readonly');
   					
   					}
   					
				if(document.getElementById(''.$nombreModelo.'_".$id."_tipoImporte').value=='lista'){
				document.getElementById(''.$nombreModelo.'_".$id."_bonificado').setAttribute('readonly', true);
					document.getElementById(''.$nombreModelo.'_".$id."_importeItem').value = round( document.getElementById(''.$nombreModelo.'_".$id."_importeItemLista').value);
				 
					document.getElementById(''.$nombreModelo.'_".$id."_bonificado').value = 0}
	

					"
		 ,));?>
		
		
	</td>
	<td>	
<?php  
//							id="'.$nombreModelo.'_n0_bonificado"
echo $form->textField($model,"[$id]bonificado",array('readonly'=>'readonly','class'=>'span1_1',
		'onchange'=>"

		 document.getElementById(''.$nombreModelo.'_".$id."_bonificado').value =	 round(  document.getElementById(''.$nombreModelo.'_".$id."_bonificado').value);
		
	 	 if (validate())
		{
					document.getElementById(''.$nombreModelo.'_".$id."_importeItem').value =  
					round (document.getElementById(''.$nombreModelo.'_".$id."_importeItemLista').value
					 - document.getElementById(''.$nombreModelo.'_".$id."_bonificado').value);
		 
					 	
		}else
		{		

		}  		
		

		
  ",)); ?>
  <script type="text/javascript">
    function validate(){
    	
        if ((document.getElementById("'.$nombreModelo.'_<?php echo $id ;?>_importeItemLista").value-	document.getElementById("'.$nombreModelo.'_<?php echo $id ;?>_importeItemMinimo").value) >= document.getElementById("'.$nombreModelo.'_<?php echo $id ;?>_bonificado").value)
            {
        	
            return true;
        	}
        else
        {
        	document.getElementById("'.$nombreModelo.'_<?php echo $id ;?>_bonificado").value=0;
            alert("Bonificacion no puede ser mayor a Precio de lista menos Precio Minimo")
            return true;
        }
}

    function round(x) {
    	  return Math.round(x*100)/100;
    	}
</script>
				 
<?php   echo $form->textField($model,"[$id]importeItemMinimo",array('class'=>'span1','readonly'=>'readonly','TYPE'=>'hidden')); ?>
<?php  echo $form->textField($model,"[$id]importeItemLista",array('class'=>'span1','readonly'=>'readonly','TYPE'=>'hidden')); ?>
  
  
</td>
<td >
<?php echo $form->textField($model,"[$id]importeItem",
		array("minValue" => '100','size'=>15,'maxlength'=>20,'readonly'=>'readonly','class'=>'span2',
		'onchange'=>"		
		document.forms['formCrearFactura'].noValidate.value = true;
		document.forms['formCrearFactura'].submit();
		
  ",));?>
</td>
<td><?php echo CHtml::link(
        'X', 
        '#', 
        array(
            'submit'=>'', 'class'=>'btn small error',
            'params'=>array(
                ''.$nombreModelo.'[command]'=>'delete', 
                ''.$nombreModelo.'[id]'=>$id, 
                'noValidate'=>true)
            ));?>
            <?php 
//            echo CHtml::button('Button Text', array('submit' => array(''.$nombreModelo.'/delete'))); 
            ?>
    </td>
</tr>