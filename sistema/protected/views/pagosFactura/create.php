<?php
$this->breadcrumbs=array(
	'Pagos Facturas'=>array('/pagos'),
	'Nueva Asignación',
);
?>






<h1>Asignación de Pago</h1>
Este paso es fundamental ya que se asigna el pago a una determinada factura. Los clientes y pagos son todos los que corresponden al CLIENTE seleccionado en el PAGO.
<br><br>
<?php echo $this->renderPartial('_form', array('model'=>$model,'idCliente'=>$idCliente,'idPago'=>$idPago)); ?>