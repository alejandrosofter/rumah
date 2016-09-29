<?php
$this->breadcrumbs=array(
	'Facturas de Venta'=>array('index'),
	'Generar Facturas',
);

$this->menu=array(
	array('label'=>'Listar Ordenes', 'url'=>array('/ordenesTrabajo/index')),
);

?>

<h1>Facturar Ordenes</h1>

<p>
Tiene 2 formas de facturar una orden de trabajo:
</p>
<h3>
<?php
echo CHtml::link('Desde NUEVA factura',Yii::app()->createUrl("facturasSalientes/crearFactura",array("idOrdenTrabajo"=>$idOrdenTrabajo)));

?>
</h3>
<br>
<h3>
<?php
echo CHtml::link('Desde factura EXISTENTE',Yii::app()->createUrl("facturasOrdenesTrabajo/create",array("idOrdenTrabajo"=>$idOrdenTrabajo)));
?>
</h3>