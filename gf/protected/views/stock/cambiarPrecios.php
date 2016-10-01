<div style='float:right'>
<h3>Buscador de Productos</h3> 
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'stock-form',
	'focus'=>'#buscador',
	'action'=>Yii::app()->createUrl('stock/cambiarPrecios'),
	'method'=>'get',
	'enableAjaxValidation'=>false,
)); ?>
Por nro Factura  <?php echo CHtml::textField('buscarFactura',isset($_GET['buscarFactura'])?$_GET['buscarFactura']:'',array('style'=>'width:70px')) ?>
	Por nombre <?php echo CHtml::textField('buscador',isset($_GET['buscador'])?$_GET['buscador']:'') ?>
	<?php echo CHtml::linkButton('Buscar', array('class'=>'btn success','submit' => '', 'params' => array() )); ?>
	Limite <?php echo CHtml::textField('limite',isset($_GET['limite'])?$_GET['limite']:'',array('style'=>'width:40px')) ?>

<?php $this->endWidget(); ?>
</div>
<?php
$this->breadcrumbs=array(
	'Centro de Productos'=>array('centroStock'),'Listado de Stock REAL'
);

$this->menu=array(
	array('label'=>'Stock (disponibilidades)'),
        array('label'=>'Listar Productos', 'url'=>array('/stock')),
	array('label'=>'Crear Producto', 'url'=>array('create')),
	array('label'=>'Tipo Productos', 'url'=>array('/stockTipoProducto')),
    array('label'=>'Cambiar Precios', 'url'=>array('cambiarPrecios')),
	array('label'=>'Listar Precios Asignados', 'url'=>array('/stockPrecios')),
);
?>
<script type="text/javascript">
	function cambiarPrecio(idStock)
	{
		$('#fila_'+idStock).css('background-color','#F4FA58');
		$.getJSON( "index.php?r=stock/cambiarPrecioStock",{idStock:idStock,lista:$('#precioLista_'+idStock).val(),min:$('#precioMinimo_'+idStock).val()}, function( data ) {
			alert('EL precio se ha cambiado!');
});
	}
	function cargarPrecios(id)
	{
		$.getJSON( "index.php?r=stock/getPrecios",{idStock:id}, function( data ) {
			$('#precioLista_'+id).val(data.precioLista);
			$('#precioMinimo_'+id).val(data.precioMinimo);
			$('#precioCompra_'+id).val(data.precioCompra);
});
	}
</script>
<table style='width:750px' class='table condensed'>

<tr><th>Producto</th><th>Stock</th><th>$ Comp.</th><th>$ LISTA</th><th>$ MIN</th><th>$ NETO</th><th></th><tr>
<?php foreach ($data as $item){?>
<tr id='fila_<?=$item->idStock?>'>
	<td><?=$item->nombre?></td>
	<td><big><?=$item->cantidadDisponible?></big></td>
	<td><?=number_format($item->importeCompra,2)?></td>
	<td><input value='<?=$item->precioLista?>' id='precioLista_<?=$item->idStock?>' type='text' style='width:50px'></input></td>
	<td><input value='<?=$item->precioMinimo?>' id='precioMinimo_<?=$item->idStock?>' type='text' style='width:50px'></input></td>
	<td><input value='<?=$item->precioCompra?>' id='precioCompra_<?=$item->idStock?>' type='text' disabled style='width:50px'></input></td>
	<td><input type='submit' class='btn primary ' value='Guardar' onclick='cambiarPrecio(<?=$item->idStock?>)'></input></td>
	<script>cargarPrecios(<?=$item->idStock?>)</script>
<tr>

<?php }?>
</table>
