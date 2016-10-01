
<?php
$obj=FacturasEntrantes::model()->consultarImporteComprasMes('Servicios/Insumos');
if(!$obj) echo 'No se registran COMPRAS DE Insumos y Conceptos EN EL MES!';
if($obj['importe']==null) echo 'No se registran COMPRAS DE Insumos y Conceptos EN EL MES!';

?>
    <script>
        window.onload = function ()
        {
            
            
            var odo4 = new RGraph.Odometer('odo4',0, <?php echo Settings::model()->getValorSistema('MAX_STOCK_CONCEPTOS'); ?>, <?php echo $obj['importe']; ?>);
            odo4.Set('chart.green.max', <?php echo Settings::model()->getValorSistema('MAX_VERDE_COMPRAS_CONCEPTOS'); ?>);
            odo4.Set('chart.red.min', <?php echo Settings::model()->getValorSistema('MIN_ROJO_COMPRAS_CONCEPTOS'); ?>);
            odo4.Set('chart.shadow.inner', true);
            odo4.Set('chart.value.text', true);
            odo4.Set('chart.value.units.post', ' Pesos');
            odo4.Draw();

        }
    </script>

    <canvas id="odo4" width="260" height="260">[No canvas support]</canvas>

    <h6> Compras de Conceptos  (IMPORTE $<?php echo  $obj['importe'];?>) </h6>
    <span class='help-block'><b>NOTA: </b>Indica las compras efectuadas en el mes ACTUAL de Conceptos.</span>