<?php $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
    'id'=>"valorCodigoBarras",
    'name'=>"valorCodigoBarras",
    'sourceUrl'=>$this->createUrl('stock/etiquetas',array('real'=>'')),
    'options'=>array('width'=>250,
    'showAnim'=>'fold',

  'select'=>"js:function(event, ui) {
$('#valorCodigoBarras').val(ui.item.id);
    
    return false;
  }",
),
'htmlOptions'=>array( 'rows'=>50,'size'=>28,"placeholder"=>"Producto..."),

));
?>
