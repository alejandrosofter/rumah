<?php echo $form->errorSummary($model); ?>
 	<?php echo $form->textField($model,"[$id]idOrdenPago",array('TYPE'=>'hidden')); ?>
	<?php echo $form->textField($model,"[$id]idFacturaEntrante",array('TYPE'=>'hidden')); ?>
	<?php echo $form->textField($model,"[$id]idFacturaEntranteVencimiento",array('TYPE'=>'hidden')); ?>
        <tr>
			<td><?php echo CHtml::resolveValue($model,"[$id]nombreFacturaEntrante"); ?></td>
    		<td><?php echo CHtml::resolveValue($model,"[$id]nombreFacturaEntranteVencimiento"); ?></td>
            <td><?php echo CHtml::resolveValue($model,"[$id]importe"); ?></td>
             
            <td><?php echo CHtml::link(
        'Quitar', 
        '#', 
        array(
            'submit'=>'', 
            'params'=>array(
                'OrdenesPagoVencimientos[command]'=>'delete', 
                'OrdenesPagoVencimientos[id]'=>$id, 
                'noValidate'=>true)
            ));?>
    </td>

        </tr>

