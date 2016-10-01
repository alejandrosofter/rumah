<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idItemComponente')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idItemComponente), array('view', 'id'=>$data->idItemComponente)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idStock')); ?>:</b>
	<?php echo CHtml::encode($data->idStock); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idComponente')); ?>:</b>
	<?php echo CHtml::encode($data->idComponente); ?>
	<br />


</div>