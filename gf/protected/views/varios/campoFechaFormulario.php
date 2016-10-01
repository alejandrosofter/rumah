<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
    'name'=>$nombre,
    'id'=>$nombre,
    'value'=>$valor,
    'options'=>array(
        'showAnim'=>'fold',
        'dateFormat' => 'yy-mm-dd',
    ),
    'htmlOptions'=>array(
    	'class'=>'span2'
    ),
)); ?>