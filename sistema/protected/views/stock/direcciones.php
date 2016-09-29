<div class="form">
<h1>Historial</h1>


<?php
$datos = isset(Yii::app()->request->cookies['direccionesNavegadas'])?Yii::app()->request->cookies['direccionesNavegadas']->value:'';
$items=explode(',',$datos);
$items=array_reverse($items);
foreach($items as $item):?>
<?php  

$rutaArr=explode('/',$item);
$cantidad=count($rutaArr);
$modulo='';
$subModulo='';

if($cantidad==5){
	$modulo=explode('=',isset($rutaArr[$cantidad])?$rutaArr[$cantidad]:"?");
	$modulo='Módulo: '.isset($modulo[0])?$modulo[0]:'?';
	$subModulo='';
}
	 else{
	
	 	$modulo=explode('=',isset($rutaArr[$cantidad-1])?$rutaArr[$cantidad-1]:'?');
	 	$modulo='Módulo: '.isset($modulo[0])?$modulo[0]:'?';
		$subModulo='Accedió: '.isset($rutaArr[$cantidad])?$rutaArr[$cantidad]:'?';
	
	 }
	
echo CHtml::link($modulo.' '.$subModulo,$item);

 
?><br>
<?php endforeach;?>


</div>
