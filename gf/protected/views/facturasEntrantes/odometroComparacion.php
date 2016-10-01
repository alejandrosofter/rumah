    <script src="<?php echo Yii::app()->request->baseUrl; ?>/RGraph/libraries/RGraph.common.core.js" ></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/RGraph/libraries/RGraph.common.effects.js" ></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/RGraph/libraries/RGraph.odo.js" ></script>
<?php
$obj=FacturasEntrantes::model()->consultarImporteComprasMes('Stock');
if(!$obj) echo 'No se registran COMPRAS DE STOCK EN EL MES!';
if($obj['importe']==null) echo 'No se registran COMPRAS DE STOCK EN EL MES!';

?>
 <?php
$objInsumos=FacturasEntrantes::model()->consultarImporteComprasMes('Servicios/Insumos');
if(!$objInsumos) echo 'No se registran COMPRAS DE Insumos y Conceptos EN EL MES!';
if($objInsumos['importe']==null) echo 'No se registran COMPRAS DE Insumos y Conceptos EN EL MES!';

$objComp=FacturasEntrantes::model()->comparacionMesAnterior();
//if(!$objComp) echo 'No se registran COMPRAS DE en algun mes';
//if($objComp==null) echo 'No se registran COMPRAS DE en algun mes!';
?>


    <script>
        window.onload = function ()
        {
            
            var odo3 = new RGraph.Odometer('odo3',0, <?php echo Settings::model()->getValorSistema('MAX_STOCK'); ?>, <?php echo $obj['importe']; ?>);
            odo3.Set('chart.green.max', <?php echo Settings::model()->getValorSistema('MAX_VERDE_COMPRAS_STOCK'); ?>);
            odo3.Set('chart.red.min', <?php echo Settings::model()->getValorSistema('MIN_ROJO_COMPRAS_STOCK'); ?>);
            odo3.Set('chart.shadow.inner', true);
            odo3.Set('chart.value.text', true);
            odo3.Set('chart.value.units.post', ' Pesos');
            odo3.Draw();
            
            var odo4 = new RGraph.Odometer('odo4',0, <?php echo Settings::model()->getValorSistema('MAX_STOCK_CONCEPTOS'); ?>, <?php echo $objInsumos['importe']; ?>);
            odo4.Set('chart.green.max', <?php echo Settings::model()->getValorSistema('MAX_VERDE_COMPRAS_CONCEPTOS'); ?>);
            odo4.Set('chart.red.min', <?php echo Settings::model()->getValorSistema('MIN_ROJO_COMPRAS_CONCEPTOS'); ?>);
            odo4.Set('chart.shadow.inner', true);
            odo4.Set('chart.value.text', true);
            odo4.Set('chart.value.units.post', ' Pesos');
            odo4.Draw();
            
             var odo5 = new RGraph.Odometer('odo5',0, <?php echo Settings::model()->getValorSistema('MAX_STOCK_TOTALES'); ?>, <?php echo $objComp['total']; ?>);
            odo5.Set('chart.green.max', <?php echo Settings::model()->getValorSistema('MAX_STOCK_TOTALES_VERDE'); ?>);
            odo5.Set('chart.red.min', <?php echo Settings::model()->getValorSistema('MAX_STOCK_TOTALES_ROJO'); ?>);
            odo5.Set('chart.shadow.inner', true);
            odo5.Set('chart.value.text', true);
            odo5.Set('chart.value.units.post', ' Pesos');
            odo5.Draw();

        }
    </script>
<table width="100%" border="0" cellpadding="4" cellspacing="0">
    <colgroup><col width="85*" /> 	<col width="85*" /> 	<col width="85*" /> 	</colgroup>
    <tbody>
    <tr valign="TOP">
            <td width="33%">
            <h5>... DE STOCK </h5>
            </td>
            <td width="33%">
            <h5>... DE CONCEPTOS</h5>
            </td>
            <td width="33%">
            <h5>COMPARACION MES ANTERIOR </h5>
            </td>
        </tr>
        <tr valign="TOP">
            <td width="33%">
            <canvas id="odo3" width="230" height="230">[No canvas support]</canvas>
            </td>
            <td width="33%">
            <canvas id="odo4" width="230" height="230">[No canvas support]</canvas>
            </td>
            <td width="33%">
           	<canvas id="odo5" width="230" height="230">[No canvas support]</canvas>
            </td>
        </tr>
        <tr valign="TOP">
            <td width="33%">
            <i><?php echo Yii::app()->numberFormatter->formatCurrency( $obj['importe'],"$"); ?></i>
            </td>
            <td width="33%"><i>
             <?php echo Yii::app()->numberFormatter->formatCurrency( $objInsumos['importe'],"$"); ?>
            </i></td>
            <td width="33%"><i>
           	 RESTO: <?php echo Yii::app()->numberFormatter->formatCurrency( $objComp['total'],"$"); ?> <br> ACTUAL: <?php echo Yii::app()->numberFormatter->formatCurrency( $objComp['mesActual'],"$"); ?> <br> ANTERIOR: <?php echo Yii::app()->numberFormatter->formatCurrency( $objComp['mesAnterior'],"$"); ?>
            </i></td>
        </tr>
    </tbody>
</table>

    		

    		
			
			
