<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idOrdenTrabajoRecurso')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idOrdenTrabajoRecurso), array('view', 'id'=>$data->idOrdenTrabajoRecurso)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idTipoRecurso')); ?>:</b>
	<?php echo CHtml::encode($data->idTipoRecurso); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />


</div>