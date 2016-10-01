<?php
$this->breadcrumbs=array(
	'Pagos'=>array('/gastos'),'Nuevo Pago',
	'Asignar Facturas',
);

$this->menu=array(
	array('label'=>'Listar Asginaciones', 'url'=>array('index')),
);
?>

<h1>Asignar Facturas</h1>

Este paso es fundamental ya que aqui se setea y se cambia de estado a la factura relacionada al pago. En caso de no tener ninguna factura asociada haga click en FINALIZAR: <br><br>
<?php echo $this->renderPartial('_form', array('model'=>$model,'idGasto'=>$idGasto,'idProveedor'=>$idProveedor)); ?>