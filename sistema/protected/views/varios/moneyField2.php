<?php
$nombre=isset ($nom)?$nom:'';
$this->widget('ext.moneymask.MMask',array(
    'element'=>'#importeBuscador'.$nombre,
    'currency'=>'PHP',
    'config'=>array(
        'showSymbol'=>false,
        'symbolStay'=>false,
         'thousands'=>'',
    )
));

?>
<?php 
$class=isset ($class)?$class:'span2';
echo CHtml::textField("importeBuscador".$nombre,"",array('class'=>$class)); ?>