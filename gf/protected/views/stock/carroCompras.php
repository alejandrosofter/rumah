<div class="form">
<h1>Carro de Compras</h1>
Listado de Productos agregados a la canasta!: <br>
<h3>Productos/Servicios </h3>
<table>
<i><?php if(count($items)<=1) echo 'No hay productos en el carro!';?></i>
<?php
$total=0;

foreach($items as $item):?>
<?php  $this->renderPartial('/stock/_productoCarro', array('item'=>$item));

$total+=isset($item->importeItem)?$item->importeItem:'';

?>
<?php endforeach;?>

<div id="derecha">

<h2>TOTAL <?php 
echo Yii::app()->numberFormatter->formatCurrency($total,"$");
?></h2>

</div>

</table>
<h3>Ordenes de Trabajo </h3>
<?php  $this->renderPartial('/ordenesTrabajo/_ordenesCarro', array());?>
<div class="actions">
		<?php echo CHtml::linkButton('Vaciar Carro', array('class'=>'btn error','submit' => '', 'params' => array("accion"=>"vaciar") )); ?>
		<?php echo CHtml::linkButton('Vaciar Ordenes', array('class'=>'btn error','submit' => '', 'params' => array("accion"=>"vaciarOrdenes") )); ?>
		<?php echo CHtml::linkButton('Facturar Carro', array('class'=>'btn success','submit' => '', 'params' => array("accion"=>"facturar",'idOrdenTrabajo'=>isset(Yii::app()->request->cookies['ordenesCarro'])?Yii::app()->request->cookies['ordenesCarro']->value:'') )); ?>

	</div>
</div>
