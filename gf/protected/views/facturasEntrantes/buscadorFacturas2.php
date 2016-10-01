<?php echo  $form->dropDownList($model,$campo,
CHtml::listData(FacturasEntrantes::model()->consultarEtiquetasPendientes('',$idProveedor==''?0:$idProveedor), 
'idFacturaEntrante', 'idFacturaEntrante'),
array(
'prompt'=>'Seleccione...',
'ajax' => array(
'type'=>'POST', //request type
'url'=>CController::createUrl('/facturasEntrantesVencimientos/EtiquetasPendientes2'), //url to call.
//Style: CController::createUrl('currentController/methodToCall')
'update'=>'#'.$llegada.'', //selector to update
//'data'=>'js:javascript statement' 
//leave out the data key to pass all form values through
)));

?>