PAGADO: 
<?php

$pagado=isset ($formaPago)?$formaPago:false;
$formaPago=isset($_POST['idFormaPago'])?$_POST['idFormaPago']:'1';
$tipo=isset ($tipo)?$tipo:'1';
$extra=isset($extra)?$extra:"";
echo CHtml::checkBox('pagado',$pagado,array('onclick'=>'visible() '));
echo ' '. CHtml::dropDownList('idFormaPago',$formaPago,CHtml::listData(FormasDePago::model()->buscar($tipo), 'idFormaPago', 'nombreForma'),array('onchange'=>$extra));
?>
<script>
    visible();
function visible() 
{
 var control = document.getElementById('idFormaPago');
var check = document.getElementById('pagado');
if(check.checked==0) 
{ 
control.style.visibility='hidden';

} 
else 
{ 
control.style.visibility='';
} 
} 
</script>