<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idJuridiccion')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idJuridiccion), array('view', 'id'=>$data->idJuridiccion)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombreJuridiccion')); ?>:</b>
	<?php echo CHtml::encode($data->nombreJuridiccion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codigoJuridiccion')); ?>:</b>
	<?php echo CHtml::encode($data->codigoJuridiccion); ?>
	<br />


</div>