<?php $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
	
    'sourceUrl'=>$this->createUrl('facturasEntrantesVencimientos/etiquetasPendientes&idFacturaEntrante='.$idFacturaEntrante),
    'options'=>array('width'=>250,
    'showAnim'=>'fold',
    'name'=>$campo,

  'select'=>"js:function(event, ui) {
     $('#".$nombreModelo."_idFacturaEntranteVencimiento').val(ui.item.idFacturaVencimiento);
    $('#".$nombreModelo."_importe').val(ui.item.importe);
    return false;
  }",
),
'htmlOptions'=>array('class'=>$class,'name'=>$campo),

));
?>