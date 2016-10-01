<?php $extra=isset($extra)?$extra:'';
// $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
//    'attribute'=>$campo,
//    'model'=>$model,
//    'sourceUrl'=>$this->createUrl('proveedores/etiquetas',array()),
//    'options'=>array('width'=>250,
//    'showAnim'=>'fold',
//	
//  'select'=>'js:function(event, ui) {
//     $("#'.$nombreModelo.'_idProveedor").val(ui.item.idProveedor);
//		 $("#'.$nombreModelo.'_nombre").val(ui.item.value); 
//		 document.getElementById("req_res08").innerHTML=ui.item.value; 
//     		$("#buscador").val();'.$extra.'
//     		
//     		
//    return false;
//  }',
//),
//'htmlOptions'=>array('class'=>'xlarge success span3', 'rows'=>50,'size'=>28,"placeholder"=>"Busqueda de Proveedor"),
//
//));
$this->widget( 'ext.EChosen.EChosen'); 
echo  $form->dropDownList($model,$campo,CHtml::listData(Proveedores::model()->consultarEtiquetas(''), 'idProveedor', 'nombre'),array ('style'=>'width:300px','class'=>'chzn-select','prompt'=>'Seleccione...'));

?>

<b id="req_res08"></b>