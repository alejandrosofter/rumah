<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idStockMarcas')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idStockMarcas), array('view', 'id'=>$data->idStockMarcas)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombreMarca')); ?>:</b>
	<?php echo CHtml::encode($data->nombreMarca); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('adicionalNumeroMarca')); ?>:</b>
	<?php echo CHtml::encode($data->adicionalNumeroMarca); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('adicionalCadenaMarca')); ?>:</b>
	<?php echo CHtml::encode($data->adicionalCadenaMarca); ?>
	<br />


</div>