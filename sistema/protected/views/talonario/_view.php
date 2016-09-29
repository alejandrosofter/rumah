<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idTalonario')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idTalonario), array('view', 'id'=>$data->idTalonario)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idPuntoVenta')); ?>:</b>
	<?php echo CHtml::encode($data->idPuntoVenta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('desdeNumero')); ?>:</b>
	<?php echo CHtml::encode($data->desdeNumero); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hastaNumero')); ?>:</b>
	<?php echo CHtml::encode($data->hastaNumero); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('proximo')); ?>:</b>
	<?php echo CHtml::encode($data->proximo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('letraTalonario')); ?>:</b>
	<?php echo CHtml::encode($data->letraTalonario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipoTalonario')); ?>:</b>
	<?php echo CHtml::encode($data->tipoTalonario); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('numeroSerie')); ?>:</b>
	<?php echo CHtml::encode($data->numeroSerie); ?>
	<br />

	*/ ?>

</div>