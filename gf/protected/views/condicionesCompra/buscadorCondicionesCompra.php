		<?php 
                
//                $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
//    'model'=>$model,
//    'attribute'=>$campo,
//    'model'=>$model,
//    'sourceUrl'=>$this->createUrl('condicionesCompra/etiquetas',array('real'=>'')),
//    'options'=>array('width'=>250,
//    'showAnim'=>'fold',
//
//  'select'=>'js:function(event, ui) {
//$("#'.$nombreModelo.'_idCondicionCompra").val(ui.item.idCondicionCompra);
//
//    return false;
//  }',
//),
//'htmlOptions'=>array('class'=>'xlarge success span2','size'=>10),
//
//));
                $this->widget( 'ext.EChosen.EChosen'); 
echo  $form->dropDownList($model,$campo,CHtml::listData(CondicionesCompra::model()->findAll(''), 'idCondicionCompra', 'descripcion'),array ('class'=>'chzn-select','prompt'=>'Seleccione...'));

?>