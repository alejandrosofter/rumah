<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idGastoFijo')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idGastoFijo), array('view', 'id'=>$data->idGastoFijo)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('importe')); ?>:</b>
	<?php echo CHtml::encode($data->importe); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('detalle')); ?>:</b>
	<?php echo CHtml::encode($data->detalle); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idProveedor')); ?>:</b>
	<?php echo CHtml::encode($data->idProveedor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('periodicidadMeses')); ?>:</b>
	<?php echo CHtml::encode($data->periodicidadMeses); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('esVariable')); ?>:</b>
	<?php echo CHtml::encode($data->esVariable); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('numeroDiaVence')); ?>:</b>
	<?php echo CHtml::encode($data->numeroDiaVence); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('fechaComienzo')); ?>:</b>
	<?php echo CHtml::encode($data->fechaComienzo); ?>
	<br />

	*/ ?>

</div>