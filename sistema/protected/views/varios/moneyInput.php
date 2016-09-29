<?php
$this->widget('ext.moneymask.MMask',array(
    'element'=>'#'.$nombreModelo,
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
echo $form->textField($model,$campo,array('class'=>$class)); ?>