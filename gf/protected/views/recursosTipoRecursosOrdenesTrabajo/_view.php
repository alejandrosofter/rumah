<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idOrdenTrabajoTipoRecurso')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idOrdenTrabajoTipoRecurso), array('view', 'id'=>$data->idOrdenTrabajoTipoRecurso)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombreTipoRecurso')); ?>:</b>
	<?php echo CHtml::encode($data->nombreTipoRecurso); ?>
	<br />


</div>