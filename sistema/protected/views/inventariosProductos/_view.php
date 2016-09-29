<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idInventarioProducto')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idInventarioProducto), array('view', 'id'=>$data->idInventarioProducto)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idInventario')); ?>:</b>
	<?php echo CHtml::encode($data->idInventario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechaProductoInventario')); ?>:</b>
	<?php echo CHtml::encode($data->fechaProductoInventario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idStockInventario')); ?>:</b>
	<?php echo CHtml::encode($data->idStockInventario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cantidadInventario')); ?>:</b>
	<?php echo CHtml::encode($data->cantidadInventario); ?>
	<br />


</div>