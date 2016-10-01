<div>

	<tr>
		<td>


	<?php echo CHtml::encode(Yii::app()->dateFormatter->format("dd-M-y",$data->fecha)); ?>
</td><td>
	<?php echo CHtml::encode($data->tipoMovimiento); ?>
</td><td>
	<?php echo CHtml::encode($data->tabla); ?>
</td>
<td>
	<?php echo CHtml::link('Ver',
                    Yii::app()->createUrl($data->tabla."/update",array("id"=>$data->idElemento))); ?>
</td>
<td>
	<?php echo CHtml::link('Ir al módulo',
                    Yii::app()->createUrl($data->tabla."")); ?>
</td>


</div>