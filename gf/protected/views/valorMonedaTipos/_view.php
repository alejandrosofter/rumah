<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idValorMonedaTipo')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idValorMonedaTipo), array('view', 'id'=>$data->idValorMonedaTipo)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombreMoneda')); ?>:</b>
	<?php echo CHtml::encode($data->nombreMoneda); ?>
	<br />


</div>