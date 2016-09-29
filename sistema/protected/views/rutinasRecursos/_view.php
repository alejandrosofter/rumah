<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idRutinaIdRecurso')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idRutinaIdRecurso), array('view', 'id'=>$data->idRutinaIdRecurso)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idRutina')); ?>:</b>
	<?php echo CHtml::encode($data->idRutina); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idRecurso')); ?>:</b>
	<?php echo CHtml::encode($data->idRecurso); ?>
	<br />


</div>