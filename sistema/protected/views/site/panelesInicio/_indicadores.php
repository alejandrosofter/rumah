<h3>Indicadores</h3>
<h5>PAGOS</h5>
<pre><?PHP $this->renderPartial('/facturasEntrantes/indicadores',array('model'=>FacturasEntrantes::model()));?></pre>
<h5>COBROS</h5>
<pre><?PHP $this->renderPartial('/facturasSalientes/indicadores',array('model'=>FacturasSalientes::model()));?></pre>
<h5>VENTAS</h5>
<pre><?PHP  $this->renderPartial('/facturasSalientes/indicadoresVentas',array('model'=>FacturasSalientes::model()));?></pre>
<h5>COMPRAS</h5>
<pre><?PHP $this->renderPartial('/facturasEntrantes/indicadoresCompras',array('model'=>FacturasEntrantes::model()));?></pre>
<h5>TAREAS & ORDENES </h5>
<pre><?PHP $this->renderPartial('/tareas/indicadores',array('modelOrdenes'=>OrdenesTrabajo::model(),'modelTareas'=>Tareas::model())); ?></pre>
