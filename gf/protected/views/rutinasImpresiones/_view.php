<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idRutinaImpresion')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idRutinaImpresion), array('view', 'id'=>$data->idRutinaImpresion)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idRutina')); ?>:</b>
	<?php echo CHtml::encode($data->idRutina); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('detalleImpresion')); ?>:</b>
	<?php echo CHtml::encode($data->detalleImpresion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cantidadDefecto')); ?>:</b>
	<?php echo CHtml::encode($data->cantidadDefecto); ?>
	<br />


</div>