<?php
$idRutina=isset($idRutina)?$idRutina:1;
$impresiones=RutinasImpresiones::model()->consultarDeRutina($idRutina);
 if ($esNuevo)echo '<b>Impresiones</b> <br><br>';
$i=0;
if(count($impresiones)==0) echo '<i>No hay impresiones con esta rutina!</i>';
foreach ($impresiones as $key => $value) {
   
     if ($esNuevo)echo CHtml::image('images/iconos/famfam/printer.png').' ';
     if ($esNuevo)echo $value['nombreImpresion'].' ';
     if($esNuevo) echo CHtml::textField("Impresiones[n$i][idRutinaImpresion]", $value['idRutinaImpresion'],array('TYPE'=>'hidden'));
     if($esNuevo) echo CHtml::textField("Impresiones[n$i][impresora]", $value['idRutinaImpresion'],array('TYPE'=>'hidden'));
     if($esNuevo) echo CHtml::textField("Impresiones[n$i][idRutinaImpresion]", $value['idRutinaImpresion'],array('TYPE'=>'hidden'));
     if($esNuevo) echo CHtml::textField("Impresiones[n$i][cantidadDefecto]", $value['cantidadDefecto'],array('class'=>'span1', 'rows'=>4));
     if($esNuevo) echo '<br/>';
     $i++;
}
?>
