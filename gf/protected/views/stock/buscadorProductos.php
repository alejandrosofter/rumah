<?php 
if(!isset ($nombreModelo))$nombreModelo='';
if(!isset ($nombreStock))$nombreStock='nombreStock';
if(!isset ($idStock))$idStock='idStock';
if(!isset ($alicuotaIva))$alicuotaIva='alicuotaIva';

$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
    'model'=>$model,
    'attribute'=>$campo,
    'sourceUrl'=>$this->createUrl('stock/etiquetas',array('real'=>'')),
    'options'=>array('width'=>250,
    'showAnim'=>'fold',

  'select'=>"js:function(event, ui) {
$('#".$nombreModelo."_$nombreStock').val(ui.item.value);
    $('#".$nombreModelo."_$idStock').val(ui.item.id);
     $('#".$nombreModelo."_$alicuotaIva').val(ui.item.porcentajeIva);
   $extra 
    return false;
  }",
),
'htmlOptions'=>array('class'=>"xlarge success $class", 'rows'=>50,'size'=>28,"placeholder"=>"Producto..."),

));
?>
<b id="req_res08"></b>