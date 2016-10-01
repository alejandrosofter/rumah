<b>
<?php
$datos = isset(Yii::app()->request->cookies['ordenes'])?Yii::app()->request->cookies['ordenes']->value:'ok';

if($datos=='ok')
{
	echo CHtml::linkButton('Agregar a la Factura los items de la orden', array('class'=>'btn success','submit' => '', 'params' => array("accion"=>"agregarProductosCarro") ));
}
?>
</b>
<br>