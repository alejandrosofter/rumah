<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idConcepto')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idConcepto), array('view', 'id'=>$data->idConcepto)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombreConcepto')); ?>:</b>
	<?php echo CHtml::encode($data->nombreConcepto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idCuentaContable')); ?>:</b>
	<?php echo CHtml::encode($data->idCuentaContable); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codigoConcepto')); ?>:</b>
	<?php echo CHtml::encode($data->codigoConcepto); ?>
	<br />


</div>