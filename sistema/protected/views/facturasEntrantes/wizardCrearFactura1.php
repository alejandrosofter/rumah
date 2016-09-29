<?php
$this->breadcrumbs=array(
	'Facturas'=>array('/facturasEntrantes/facturas'),'Facturas de Compra'=>array('/facturasEntrantes'),'Nueva Factura de Compra'
);

?>

<h1>Asistente Carga de Factura</h1>

<?php
echo $event->sender->menu->run();
echo '<div>Step '.$event->sender->currentStep.' of '.$event->sender->stepCount;
echo '<h3>'.$event->sender->getStepLabel($event->step).'</h3>';
echo CHtml::tag('div',array('class'=>'form'),$form);
 ?>