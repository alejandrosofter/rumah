  <?php echo $form->errorSummary($model); ?>
        <tr>
           
            <td><?php $this->renderPartial('/conceptos/buscadorConceptos',array( 'campo'=>"[$id]nombreConcepto", 'class'=>'span5','model'=>$model,'nombreModelo'=>"FacturasEntrantesConcepto_".$id))?></td>
     		 	<?php echo $form->textField($model,"[$id]idConcepto", array('TYPE'=>'hidden')); ?>
            <td><?php echo $form->textField($model,"[$id]alicuotaIva",array('class'=>'span1')); ?></td>
    
            <td> <?php $this->renderPartial('/varios/moneyInput',array('model'=>$model,'form'=>$form, 
'campo'=>"[$id]importe",'class'=>'span2','nombreModelo'=>"FacturasEntrantesConcepto_".$id."_importe"))?></td>
             
            <td><?php echo CHtml::link(
        'Quitar', 
        '#', 
        array(
            'submit'=>'', 
            'params'=>array(
                'FacturasEntrantesConcepto[command]'=>'delete', 
                'FacturasEntrantesConcepto[id]'=>$id, 
                'noValidate'=>true)
            ));?>
    </td>

        </tr>