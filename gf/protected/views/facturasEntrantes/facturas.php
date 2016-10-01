<?php
$this->breadcrumbs=array(
	'Centro de Compras',
);

?>
<div id="columna_izquierda">
<?php
echo CHtml::image('images/iconos/financieros/shopping-cart-icon.png');
?>
</div>
<div id="columna_derecha">
<h1>COMPRAS</h1>
<i> A continuación tiene a disposición el menú para ejectar funciones sobre las compras. Dentro de COMPRAS puede encontrar PROVEEDORES, CONDICIONES DE COMPRA etc etc. </i><br><br>
</div>
 
<div id="abajo">

<?PHP

$this->renderPartial('/facturasEntrantes/odometroComparacion', array(),false);
//$this->renderPartial('/facturasEntrantes/odometroComprasConceptos', array(),false);
?>
</div>
