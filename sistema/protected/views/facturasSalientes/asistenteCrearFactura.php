<h1>Crear Factura</h1>
<?php
 	$dirOrdenes=isset($_GET['idOrdenTrabajo'])?'idOrdenTrabajo='.$_GET['idOrdenTrabajo']:'';
        $dirOrdenes.=isset($_GET['idPresupuestoFacturar'])?'idPresupuestoFacturar='.$_GET['idPresupuestoFacturar']:'';
 ?>
<h3><?php echo CHtml::link('Factura Rápida (de mostrador):','index.php?r=facturasSalientes/facturaRapida&'.$dirOrdenes) ?> </h3> Le permite crear una factura hacia el <?php echo CHtml::link('CONSUMIDOR FINAL','index.php?r=clientes/update&id='.strip_tags(Yii::app()->settings->getKey( 'IDCLIENTE_CONSUMIDORFINAL'))) ?> , realizando el pago al <?php echo CHtml::link('CONTADO','index.php?r=condicionesVenta/update&id='.strip_tags(Yii::app()->settings->getKey( 'ID_CONTADO'))) ?> (debito, efectivo, cheques etc).
<h3><?php echo CHtml::link('Factura Completa:','index.php?r=facturasSalientes/crearFacturaCompleta&'.$dirOrdenes) ?> </h3> Le permite crear una factura hacia un CLIENTE en particular, realizando el pago CON VENCIMIENTOS (o bien al contado).
