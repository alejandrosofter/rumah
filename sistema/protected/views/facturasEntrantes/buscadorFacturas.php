<?php $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
	'attribute'=>$campo,
    'model'=>$model,
    'sourceUrl'=>$this->createUrl("facturasEntrantes/etiquetasPendientes&idProveedor='$idProveedor'"),
    'options'=>array('width'=>250,
    'showAnim'=>'fold',

  'select'=>"js:function(event, ui) {
     $('#".$nombreModelo."_idFacturaEntrante').val(ui.item.idFacturaEntrante);
     $( '#".$llegada."' ).autocomplete( 'option', 'source', 'index.php?r=facturasEntrantesVencimientos/etiquetasPendientes&idFacturaEntrante='+ui.item.idFacturaEntrante);
    return false;
  }",
),
'htmlOptions'=>array('class'=>$class),

));
//idFacturaEntranteVencimiento
?>