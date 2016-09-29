<?php $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
    'id'=>'buscador_gral',
    'name'=>'buscador_gral',
    'sourceUrl'=>$this->createUrl('clientes/acciones',array()),
    'options'=>array('width'=>50,
    'showAnim'=>'fold',
    'style'=>'width: 50px;',

  'select'=>"js:function(event, ui) {
     window.location = ui.item.direccion;" .
     		"$('#buscador').val('');
    return false;
  }",
),
'htmlOptions'=>array('width'=>5,'size'=>15,"placeholder"=>"Escriba adonde desea ir"),

));
?>