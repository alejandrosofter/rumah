<?php
$this->breadcrumbs=array(
	'Ordenes de Trabajo'=>array('index'),
	'Generar Orden desde Presupuesto',
);

$this->menu=array(
	array('label'=>'Listar Presupuestos', 'url'=>array('/presupuestos/index')),
	array('label'=>'Listar Ordenes Presupuesto', 'url'=>array('/ordenesTrabajo/index')),
);

?>

<h1>Asignar Orden a Presupuesto</h1>

<p>
Tiene 2 formas de asignar un presupuesto a una orden de trabajo:
</p>
<h3>
<?php
echo CHtml::link('Desde NUEVA Orden de Trabajo',Yii::app()->createUrl("ordenesTrabajo/create",array("idPresupuesto"=>$idPresupuesto)));

?>
</h3>
<br>
<h3>
<?php
echo CHtml::link('Desde Orden de Trabajo EXISTENTE',Yii::app()->createUrl("presupuestosOrdenesTrabajo/create",array("idPresupuesto"=>$idPresupuesto)));
?>
</h3>