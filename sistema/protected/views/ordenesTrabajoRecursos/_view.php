<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idOrdenIdRecurso')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idOrdenIdRecurso), array('view', 'id'=>$data->idOrdenIdRecurso)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idOrdenTrabajo')); ?>:</b>
	<?php echo CHtml::encode($data->idOrdenTrabajo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idRecurso')); ?>:</b>
	<?php echo CHtml::encode($data->idRecurso); ?>
	<br />


</div>