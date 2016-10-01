<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/css-dock-menu/js/interface.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css-dock-menu/style.css" />
<script type="text/javascript">
   $(document).ready(
   function()
   {
   $('#dock').Fisheye(
   {
   maxWidth: 60,
   items: 'a',
   itemsText: 'span',
   container: '.dock-container',
   itemWidth: 30,
   proximity: 80,
   alignment : 'right',
   valign: 'bottom',
   halign : 'right'
   }
   )
   }
   );
</script>
<?php 

function getElemento($elemento)
{
	$salida='';
	$elemento=rtrim(ltrim($elemento));
switch ($elemento){
	case 'clientes':{
		$salida= '<a class="dock-item" href="index.php?r=clientes" style="width: 40px; left: 200px; "><img src="'.Yii::app()->request->baseUrl.'/css-dock-menu/images/clientes.png" alt="cliente"><span style="display: none; ">Clientes</span></a>';
		break;
	}
	case 'nuevaFactura':{
		$salida= '<a class="dock-item" href="index.php?r=facturasSalientes/crearFactura" style="width: 40px; left: 0px; "><img src="'.Yii::app()->request->baseUrl.'/css-dock-menu/images/invoice-icon.png" alt="Facturar"><span>Nueva Factura</span></a> 
	  ';
		break;
	}
	case 'nuevoCobro':{
		$salida= '<a class="dock-item" href="index.php?r=ordenesCobro/crearCobro" style="width: 40px; left: 40px; "><img src="'.Yii::app()->request->baseUrl.'/css-dock-menu/images/cash-register-icon.png" alt="cobros"><span style="display: none; ">Nuevo Cobro</span></a> 
	  ';
		break;
	}
	case 'mantenimientos':{
		$salida= '<a class="dock-item" href="index.php?r=mantenimientosEmpresas" style="width: 40px; left: 160px; "><img src="'.Yii::app()->request->baseUrl.'/css-dock-menu/images/servicios.png" alt="Mantenimientos"><span style="display: none; ">Manteniminentos</span></a> 
	   
	  ';
		break;
	}
	case 'nuevaTarea':{
		$salida= '<a class="dock-item" href="index.php?r=tareas/create" style="width: 40px; left: 80px; "><img src="'.Yii::app()->request->baseUrl.'/css-dock-menu/images/tareas.png" alt="tareas"><span style="display: none; ">Nueva Tarea</span></a> 

	  ';
		break;
	}
	case 'stock':{
		$salida= '<a class="dock-item" href="index.php?r=stock/stockReal" style="width: 40px; left: 120px; "><img src="'.Yii::app()->request->baseUrl.'/css-dock-menu/images/stock.png" alt="stock"><span style="display: none; ">Stock (disponibilidades)</span></a> 

	  ';
		break;
	}
	case 'ordenesTrabajo':{
		$salida= '<a class="dock-item" href="index.php?r=ordenesTrabajo/porEstado&estado=" style="width: 40px; left: 200px; "><img src="'.Yii::app()->request->baseUrl.'/css-dock-menu/images/ordenTrabajo.png" alt="ordenes"><span style="display: none; ">Ordenes de Trabajo</span></a>
	  ';
		break;
	}
	case 'nuevaOrden':{
		$salida= '<a class="dock-item" href="index.php?r=ordenesTrabajo/create" style="width: 40px; left: 200px; "><img src="'.Yii::app()->request->baseUrl.'/css-dock-menu/images/nuevaOrden.png" alt="nueva orden"><span style="display: none; ">Nueva Orden</span></a>
	 
	  ';
		break;
	}
	case 'configuraciones':{
		$salida= ' <a class="dock-item" href="index.php?r=settings/variablesSistema" style="width: 40px; left: 200px; "><img src="'.Yii::app()->request->baseUrl.'/css-dock-menu/images/settings.png" alt="configuraciones"><span style="display: none; ">Configuraciones</span></a>
	  
	 
	  ';
		break;
	}
	case 'proveedores':{
		$salida= ' <a class="dock-item" href="index.php?r=proveedores" style="width: 40px; left: 200px; "><img src="'.Yii::app()->request->baseUrl.'/css-dock-menu/images/proveedores.png" alt="cliente"><span style="display: none; ">Proveedores</span></a>
	  
	 
	  ';
		break;
	}
	case 'precios':{
		$salida= ' <a class="dock-item" href="index.php?r=stockPrecios" style="width: 40px; left: 200px; "><img src="'.Yii::app()->request->baseUrl.'/css-dock-menu/images/label.png" alt="precios"><span style="display: none; ">Precios Asignados</span></a>
	  
	 
	  ';
		break;
	}
	
}
return $salida;
}
$itemsSalida='';
 if($items==null){
 	$itemsSalida.= getTodos();
 }else{
 	foreach($items as $item)
		$itemsSalida.= getElemento($item);
 }


	


?>

<div class="dock" id="dock">
  <div class="dock-container" style="left: 400px; width: 200px; ">
	  <?php echo $itemsSalida;?>
  </div> 
</div>