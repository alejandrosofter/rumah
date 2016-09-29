
        <tr>
   
            <td><div class='form'><?php echo $form->textField($model,"[$id]cantidad", array('class'=>'span1')); ?></div></td>
           
            <td><div class='form'><?php $this->renderPartial('/stock/buscadorProductos',array('extra'=>"$('#ComprasItems_".$id."_alicuotaIva').focus();", 
'campo'=>"[$id]nombreStock", 'class'=>'span5','model'=>$model,'nombreModelo'=>"ComprasItems_".$id))?><?php echo $form->errorSummary($model); ?></div></td>
     		 	<?php echo $form->textField($model,"[$id]idStock", array('TYPE'=>'hidden')); ?>
     		 	<?php echo $form->textField($model,"[$id]stockeado", array('TYPE'=>'hidden')); ?>
            <td><div class='form'><?php echo $form->textField($model,"[$id]alicuotaIva",array('class'=>'span1')); ?> </div></td>
    
            <td><div class='form'>
                    <?php echo $form->textField($model,"[$id]importeCompra", array('class'=>'span2')); ?>
          
         </div></td>
             
            <td><?php echo CHtml::link(
        'Quitar', 
        '#', 
        array(
            'submit'=>'', 
            'params'=>array(
                'ComprasItems[command]'=>'delete', 
                'ComprasItems[id]'=>$id, 
                'noValidate'=>true)
            ));?>
    </td>

        </tr>



