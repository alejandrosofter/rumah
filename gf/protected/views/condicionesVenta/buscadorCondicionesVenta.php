<?php echo  $form->dropDownList($model,'idCondicionVenta',  CHtml::listData(CondicionesVenta::model()->findAll(),'idCondicionVenta','descripcionVenta'),array('onchange'=>"ejecuta()"));?>

<script>
    
    function ejecuta()
    {
        <?php echo $extra; ?>
    }
    </script>
<!--	
// $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
//    'model'=>$model,
//    'attribute'=>'idCondicionVenta',
//  
////    'sourceUrl'=>$this->createUrl('condicionesCompra/etiquetas',array('real'=>'')),
//'sourceUrl'=>$this->createUrl('condicionesVenta/etiquetas',array('real'=>'')),
//    'options'=>array('width'=>250,
//    'showAnim'=>'fold',
//
//  'select'=>'js:function(event, ui) {
//
//    $("#'.$nombreModelo.'_idCondicionVenta").val(ui.item.idCondicionVenta);
//	'.$extra.';
//    return false;
//  }',
//),
//'htmlOptions'=>array('class'=>'span2','size'=>10),
//
//));
//?>-->