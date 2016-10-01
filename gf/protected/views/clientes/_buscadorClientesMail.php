<?php 
$extra=isset($extra)?$extra:'';
$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
    'model'=>$model,
    'attribute'=>$campo,
    'sourceUrl'=>$this->createUrl('clientes/etiquetasMails',array()),
    'options'=>array('width'=>250,
    'showAnim'=>'fold',

  'select'=>'js:function(event, ui) {
     $("#'.$nombreModelo.'_'.$campo.'").val(ui.item.email);
		
    return false;
  }',
),
'htmlOptions'=>array('class'=>'xlarge success span5','size'=>40,"placeholder"=>"Escriba el nombre del cliente"),

));
?>

<b id="req_res08"></b>