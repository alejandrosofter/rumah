<?php echo $form->errorSummary($model); ?>
 	<?php echo $form->textField($model,"[$id]idOrdenPago",array('TYPE'=>'hidden')); ?>
	<?php echo $form->textField($model,"[$id]idFacturaEntrante",array('TYPE'=>'hidden')); ?>
	<?php echo $form->textField($model,"[$id]idFacturaEntranteVencimiento",array('TYPE'=>'hidden')); ?>
        <tr>

            <td><?php $this->renderPartial('/facturasEntrantes/buscadorFacturas2',array('form'=>$form,'idProveedor'=>$idProveedor,'class'=>'span3','model'=>$model,'llegada'=>$id."_nombreFacturaEntrante",'campo'=>"[$id]nombreFacturaEntrante",'nombreModelo'=>'OrdenesPagoVencimientos'))?></td>
     		
            <td><?php $this->renderPartial('/facturasEntrantes/buscadorFacturasVencimientos2',array('class'=>'span3' ,'model'=>$model,'campo'=>$id."_nombreFacturaEntrante",'nombreModelo'=>'OrdenesPagoVencimientos'))?></td>
    
            <td><?php echo $form->textField($model,"[$id]importe",array('class'=>'span2')); ?></td>
             
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