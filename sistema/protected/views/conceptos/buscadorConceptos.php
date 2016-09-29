<?php $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
    'model'=>$model,
    'attribute'=>$campo,
    'sourceUrl'=>$this->createUrl('conceptos/etiquetas',array()),
    'options'=>array('width'=>250,
    'showAnim'=>'fold',

  'select'=>"js:function(event, ui) {
 
     $('#".$nombreModelo."_idConcepto').val(ui.item.idConcepto);
     $('#".$nombreModelo."_alicuotaIva').val(ui.item.alicuotaIva);
    return false;
  }",
),
'htmlOptions'=>array('class'=>$class,"placeholder"=>"Escriba el Concepto Asociado"),

));
?>
<b id="req_res08"></b>