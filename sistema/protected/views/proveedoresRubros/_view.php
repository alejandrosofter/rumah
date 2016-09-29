<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idProveedor_rubro')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idProveedor_rubro), array('view', 'id'=>$data->idProveedor_rubro)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />



</div>