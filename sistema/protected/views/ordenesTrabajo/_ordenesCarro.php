
<?php
$total=0;
$datos = isset(Yii::app()->request->cookies['ordenesCarro'])?Yii::app()->request->cookies['ordenesCarro']->value:'';
$items=explode(',',$datos);
$i=0;?>
<i><?php

if(count($items)<=1) echo 'No hay ordenes en el carro!';?></i>
<?php
foreach($items as $item):?>
<?php  
if($i>=1){
	$orden=OrdenesTrabajo::model()->findByPk($item);
	$this->renderPartial('/ordenesTrabajo/_ordenesItemCarro', array('item'=>$orden));
}
//echo $i;
$i++;

?>
<?php endforeach;?>