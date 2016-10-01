<table>
<?php
echo "  
<th></th>            
<th>Nro Factura</th>
            <th>Fecha</th>
            <th>Estado</th>
            <th>Importe</th>
    ";

foreach ($manager->items as $id => $model) {
   if ($model->estado=='')
              continue;
    echo $form->textField($model,"[$id]idFacturaVencimiento",array('TYPE'=>'hidden'));
    echo $form->textField($model,"[$id]factura",array('TYPE'=>'hidden'));
    echo $form->textField($model,"[$id]idFacturaSaliente",array('TYPE'=>'hidden')); 
    echo $form->textField($model,"[$id]fechaVencimiento",array('TYPE'=>'hidden'));  
    echo $form->textField($model,"[$id]estado",array('TYPE'=>'hidden'));  
      echo $form->textField($model,"[$id]importeFacturaSaliente",array('TYPE'=>'hidden')); 
   
    echo "<tr>";
   echo "<td>".$form->checkbox($model,"[$id]procesar",array())."</td>"; 
    echo "<td>".$model->factura."</td>
    <td>".$model->fechaVencimiento."</td>
    <td>".$model->estado."</td>";
    echo "<td>".$form->textField($model,"[$id]importeF",array('class'=>'span2'))." <b>de ".Yii::app()->numberFormatter->formatCurrency($model->importeFacturaSaliente,"$")."</b></td>"; 
    echo "</tr>";

}
?>
</table>
