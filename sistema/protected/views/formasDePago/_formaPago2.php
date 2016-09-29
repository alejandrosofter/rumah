<?php
$formaPago=isset($_POST['idFormaPago'])?$_POST['idFormaPago']:'1';
$tipo=isset ($tipo)?$tipo:'1';

echo $form->dropDownList($model,$campo,CHtml::listData(FormasDePago::model()->buscar($tipo), 'idFormaPago', 'nombreForma'));
?>