<?php 
$extra=isset($extra)?$extra:'';
//$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
//    'model'=>$model,
//    'attribute'=>$campo,
//   
//    'sourceUrl'=>$this->createUrl('clientes/etiquetas',array()),
//    'options'=>array('width'=>250,
//    'showAnim'=>'fold',
//
//  'select'=>'js:function(event, ui) {
//     $("#'.$nombreModelo.'_'.$campo.'").val(ui.item.idCliente);
//		  $("#'.$nombreModelo.'_tipoFactura").val(ui.item.letraHabitual);
//		  document.getElementById("req_res08").innerHTML=ui.item.value; 
//     		'.$extra.';
//    return false;
//  }',
//),
//'htmlOptions'=>array('class'=>'xlarge success span5','size'=>40,"placeholder"=>"Escriba el nombre del cliente"),
//
//));
?>
<?php
$this->widget( 'ext.EChosen.EChosen'); 
echo  $form->dropDownList($model,$campo,CHtml::listData(Clientes::model()->consultarEtiquetas(''), 'idCliente', 'cliente'),array ('onchange'=>$extra,'style'=>'width:300px','class'=>'chzn-select','prompt'=>'Seleccione...'));?>

<b id="req_res08"></b>