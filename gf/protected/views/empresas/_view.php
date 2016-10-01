<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idEmpresa')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idEmpresa), array('view', 'id'=>$data->idEmpresa)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombreEmpresa')); ?>:</b>
	<?php echo CHtml::encode($data->nombreEmpresa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('esDefault')); ?>:</b>
	<?php echo CHtml::encode($data->esDefault); ?>
	<br />


</div>