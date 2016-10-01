<table>
<?php
echo "             
<th>Nro Factura</th>
            <th>Fecha</th>
            <th>Estado</th>
            <th>Importe</th>
    ";
$final=0;
foreach ($manager->items as $id => $model) {
//   if ($model->estado=='')
//              continue;
$final+=$model->importeF;
$model->procesar=1;
    echo $form->textField($model,"[$id]idFacturaVencimiento",array('TYPE'=>'hidden'));
    echo $form->textField($model,"[$id]factura",array('TYPE'=>'hidden'));
    echo $form->textField($model,"[$id]idFacturaSaliente",array('TYPE'=>'hidden')); 
    echo $form->textField($model,"[$id]fechaVencimiento",array('TYPE'=>'hidden'));  
    echo $form->textField($model,"[$id]estado",array('TYPE'=>'hidden'));  
    echo $form->textField($model,"[$id]pagado",array('TYPE'=>'hidden'));
     echo $form->textField($model,"[$id]procesar",array('TYPE'=>'hidden'));
//    echo CHtml::textField("FacturasSalientesVencimiento[$id]procesar",'1',array('TYPE'=>'hidden'));
    echo $form->textField($model,"[$id]importeFacturaSaliente",array('TYPE'=>'hidden')); 

    echo "<tr>";
    echo "<td>".$model->factura."</td>
    <td>".$model->fechaVencimiento."</td>
    <td>".$model->estado."</td>";
    $saldo=''.Yii::app()->numberFormatter->formatCurrency($model->importeFacturaSaliente-$model->pagado-$model->importeF,"$").'';
    echo "<td>".$form->textField($model,"[$id]importeF",array('class'=>'span2','onchange'=>'document.forms["formOrdenes"].noValidate.value= "ok";
		document.forms["formOrdenes"].submit();'))." <b>de $saldo</b></td>"; 
    echo "</tr>";

}

?>
</table>
<?php //if(count($manager->items)==1)echo '<i>No se encontraron facturas para asignar...</i>';?>
<h3>IMPORTE A CUENTA <?php echo Yii::app()->numberFormatter->formatCurrency($importeCuenta-$final,"$"); ?></h3>
<h3><font color="green">IMPORTE A CUENTA USADO <?php echo Yii::app()->numberFormatter->formatCurrency($final,"$"); ?></font></h3>