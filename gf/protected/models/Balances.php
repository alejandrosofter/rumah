<?php

/**
 * This is the model class for table "centrosCosto".
 *
 * The followings are the available columns in table 'centrosCosto':
 * @property integer $idCentroCosto
 * @property string $nombre
 */
class Balances extends CActiveRecord
{
	public $fechaInicio;
	public $fechaFin;
	public $idCliente;
	public $idProveedor;
	/**
	 * Returns the static model of the specified AR class.
	 * @return CentrosCosto the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'clientes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			//array('nombre', 'required'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			
		);
	}
	public function consultarInformeFinanciero($fechaInicio,$fechaFin)
	{
		
$auxIni = explode("-",$fechaInicio);
		$auxFin = explode("-",$fechaFin);
		
		$auxIni = $auxIni[2].'-'.$auxIni[1].'-'.$auxIni[0];
		$auxFin = $auxFin[2].'-'.$auxFin[1].'-'.$auxFin[0];
		
		$connection=Yii::app()->getDb();
        $command=$connection->createCommand(
"SELECT COUNT(t.idOrdenTrabajo) as cantidadOrdenes,ROUND(AVG(DATEDIFF((SELECT max(ordenesTrabajo_estados.fechaEstado) from ordenesTrabajo_estados where idOrdenTrabajo = t.idOrdenTrabajo),t.fechaIngreso)),2) as promedioDias

FROM `ordenesTrabajo` t

WHERE t.fechaIngreso
BETWEEN '$auxIni'
AND '$auxFin'
");
            
            return $command->queryAll();
	}
	public function consultarInformeOrdenes($fechaInicio,$fechaFin)
	{
		
$auxIni = explode("-",$fechaInicio);
		$auxFin = explode("-",$fechaFin);
		
		$auxIni = $auxIni[2].'-'.$auxIni[1].'-'.$auxIni[0];
		$auxFin = $auxFin[2].'-'.$auxFin[1].'-'.$auxFin[0];
		
		$connection=Yii::app()->getDb();
        $command=$connection->createCommand("SELECT COUNT(t.idOrdenTrabajo) as cantidadOrdenes,ROUND(AVG(DATEDIFF((SELECT max(ordenesTrabajo_estados.fechaEstado) from ordenesTrabajo_estados where idOrdenTrabajo = t.idOrdenTrabajo),t.fechaIngreso)),2) as promedioDias

FROM `ordenesTrabajo` t

WHERE t.fechaIngreso
BETWEEN '$auxIni'
AND '$auxFin'
");
            
            return $command->queryAll();
	}
	public function consultarDetalleOrdenes($fechaInicio,$fechaFin)
	{
		
$auxIni = explode("-",$fechaInicio);
		$auxFin = explode("-",$fechaFin);
		
		$auxIni = $auxIni[2].'-'.$auxIni[1].'-'.$auxIni[0];
		$auxFin = $auxFin[2].'-'.$auxFin[1].'-'.$auxFin[0];
		
		$connection=Yii::app()->getDb();
        $command=$connection->createCommand("
SELECT DATEDIFF(MAX(ordenesTrabajo_estados.fechaEstado),t.fechaIngreso) as dias, MAX(ordenesTrabajo_estados.fechaEstado) as fechaUltima,IF(clientes.tipoCliente='Empresa',clientes.razonSocial,CONCAT(clientes.apellido,', ',clientes.nombre)) as cliente,t.*, MAX(ordenesTrabajo_estados.estado) as ultimoEstado FROM `ordenesTrabajo` t
INNER JOIN clientes on clientes.idCliente = t.idCliente
LEFT JOIN ordenesTrabajo_estados on ordenesTrabajo_estados.idOrdenTrabajo = t.idOrdenTrabajo

WHERE t.fechaIngreso
BETWEEN '$auxIni'
AND '$auxFin'
GROUP BY t.idOrdenTrabajo ORDER BY t.fechaIngreso, cliente");
            
            return $command->queryAll();
	}
	public function consultarDetalleVentas($fechaInicio,$fechaFin)
	{
		
$auxIni = explode("-",$fechaInicio);
		$auxFin = explode("-",$fechaFin);
		
		$auxIni = $fechaInicio;
		$auxFin = $fechaFin;
		
		$connection=Yii::app()->getDb();
        $command=$connection->createCommand("
SELECT SUM(t.cantidad*(-talonario.esCredito) ) as cantidadTotal,t.interes,t.descuentos,t.detalle as nombreItem, (t.importe*(-talonario.esCredito)) as importeTotal, t.importe
FROM  `facturas_items` t
LEFT JOIN facturas ON facturas.id = t.idFactura
LEFT JOIN talonario on talonario.idTalonario = facturas.idTalonario
WHERE facturas.fecha
BETWEEN  '$auxIni'
AND  '$auxFin' AND facturas.estado<>'ANULADA'
GROUP BY t.idProducto,talonario.idTalonario,importeTotal");
            
            return $command->queryAll();
	}
	public function consultarDeudores()
	{
		$connection=Yii::app()->getDb();
        $command=$connection->createCommand("
SELECT proveedores.nombre as proveedor, proveedores.*, facturasEntrantes.*,SUM(gastos.importe) as importePagado FROM `facturasEntrantes`
LEFT JOIN gastos_factura on gastos_factura.idFacturaSaliente = facturasEntrantes.idFacturaEntrante
LEFT JOIN gastos on gastos.idGasto = gastos_factura.idGasto
LEFT JOIN proveedores on proveedores.idProveedor = facturasEntrantes.idProveedor
 WHERE (facturasEntrantes.estado<>'Pagada' AND facturasEntrantes.estado<>'Debiendo' AND facturasEntrantes.estado<>'Pagado')

GROUP BY facturasEntrantes.idFacturaEntrante");
            
            return $command->queryAll();
	}
	
	public function consultarProveedores()
	{
		$connection=Yii::app()->getDb();
        $command=$connection->createCommand("
SELECT * FROM `proveedores` 
 LEFT JOIN juridicciones on (proveedores.idJuridiccion = juridicciones.idJuridiccion)
ORDER BY proveedores.nombre
"
//"BETWEEN '2011-07-01' AND '2011-07-31' " .
//		"AND (estado<>'Pagada' AND estado<>'Pagado') ORDER BY fecha desc,cliente"
        );
            
            return $command->queryAll();
	}
	public function consultarClientes()
	{
		$connection=Yii::app()->getDb();
        $command=$connection->createCommand("
SELECT *, CONCAT(apellido,' ',nombre) as cliente, juridicciones.nombreJuridiccion as nombreJuridiccion FROM `clientes` 
 LEFT JOIN juridicciones on (clientes.idJuridiccion = juridicciones.idJuridiccion)
ORDER BY cliente
"
//"BETWEEN '2011-07-01' AND '2011-07-31' " .
//		"AND (estado<>'Pagada' AND estado<>'Pagado') ORDER BY fecha desc,cliente"
        );
            
            return $command->queryAll();
	}
	
	

public function consultarStockServicio($tipoImpresion)
	{
		$connection=Yii::app()->getDb();
        $command=$connection->createCommand(
        
 "SELECT t.*,stock_tipoProducto.porcentajeGananciaLista as porcentajeGananciaLista,
 stock_tipoProducto.porcentajeGananciaMin as porcentajeGananciaMin,
 t.nombre as nombreStock,stock_tipoProducto.nombre as nombreTipoProducto, 
 SUBSTRING_INDEX( GROUP_CONCAT(CAST(stock_disponible.cantidadDisponible AS CHAR) ORDER BY stock_disponible.idStockDisponible desc), ',', 1 ) as cantidadDisponible ,

 (SELECT importePesosStock - (importePesosStock*((t.porcentajeIva/100))) 
FROM stock_precios_items WHERE stock_precios_items.idStock = t.idStock ORDER BY stock_precios_items.idStockPrecioStock desc LIMIT 1) as importeSinIva,

 (SELECT importePesosStock FROM stock_precios_items 
WHERE stock_precios_items.idStock = t.idStock 
ORDER BY stock_precios_items.idStockPrecioStock desc LIMIT 1) as precioLista,  

 (SELECT importePesosStockMin FROM stock_precios_items 
WHERE (stock_precios_items.idStock = t.idStock) 
ORDER BY stock_precios_items.idStockPrecioStock desc LIMIT 1) as precioMinimo, 

  stock_tipoProducto.nombre as nombreTipoProducto, stock_marcas.nombreMarca as nombreMarca 
 FROM stock t 
				 LEFT JOIN stock_tipoProducto on stock_tipoProducto.idStockTipo = t.idTipoProducto 
				 LEFT JOIN stock_marcas on stock_marcas.idStockMarcas = t.idStockMarca 
				LEFT JOIN stock_disponible on stock_disponible.idStock = t.idStock 
				WHERE  (t.tipoProducto = '$tipoImpresion')
				GROUP BY t.idStock 
				ORDER BY nombre,cantidadDisponible desc ");
    
   
        
        
        
            
            return $command->queryAll();
	}
	
	public function consultarMorosos()
	{
		$connection=Yii::app()->getDb();
        $command=$connection->createCommand("
SELECT * FROM `facturasSalientes_view` WHERE fecha ".
//"BETWEEN '2011-07-01' AND '2011-07-31' " .
		"AND (estado='PEND') ORDER BY fecha desc,cliente");
            
            return $command->queryAll();
	}
	public function consultarTipoProductoVentas($fechaInicio,$fechaFin)
	{
		
$auxIni = explode("-",$fechaInicio);
		$auxFin = explode("-",$fechaFin);
		
		$auxIni = $auxIni[2].'-'.$auxIni[1].'-'.$auxIni[0];
		$auxFin = $auxFin[2].'-'.$auxFin[1].'-'.$auxFin[0];
		
		$connection=Yii::app()->getDb();
        $command=$connection->createCommand("
SELECT stock_tipoProducto.nombre as cuenta, SUM( itemsFacturaSaliente.importeItem ) AS importe, (( SUM( itemsFacturaSaliente.importeItem )*100)/(SELECT SUM(itemsFacturaSaliente.importeItem) as importe FROM `facturasSalientes` t
INNER JOIN itemsFacturaSaliente on itemsFacturaSaliente.idFacturaSaliente = t.idFacturaSaliente

WHERE t.fecha BETWEEN '$auxIni' AND '$auxFin') )AS porcentaje
FROM `facturasSalientes` t
INNER JOIN itemsFacturaSaliente ON itemsFacturaSaliente.idFacturaSaliente = t.idFacturaSaliente
LEFT JOIN stock ON stock.idStock = itemsFacturaSaliente.idElemento
LEFT JOIN stock_tipoProducto ON stock.idTipoProducto = stock_tipoProducto.idStockTipo
LEFT JOIN cuentasVenta ON cuentasVenta.idCuentaVenta = stock.idCuenta
WHERE t.fecha
BETWEEN '$auxIni'
AND '$auxFin'
GROUP BY stock.idTipoProducto ORDER BY porcentaje desc");
            
            return $command->queryAll();
	}
        public function consultarInformeVentas($fechaInicio,$fechaFin)
	{
		
$auxIni = explode("-",$fechaInicio);
		$auxFin = explode("-",$fechaFin);
		
		$auxIni = $fechaInicio;
		$auxFin = $fechaFin;
		
		$connection=Yii::app()->getDb();
        $command=$connection->createCommand("
SELECT round(sum(importe) * -talonario.esCredito,2) as importe,concat(talonario.tipoTalonario,' ',talonario.letraTalonario) as tipo
FROM  `facturas` t
LEFT JOIN talonario ON talonario.idTalonario = t.idTalonario
WHERE t.fecha BETWEEN CAST('$auxIni' AS DATETIME)
AND CAST('$auxFin' AS DATETIME) 
                AND t.estado<>'ANULADA' GROUP BY t.idTalonario");
            
            return $command->queryAll();
	}
	public function consultarInformePagos($fechaInicio,$fechaFin)
	{
		
		$auxIni = explode("-",$fechaInicio);
		$auxFin = explode("-",$fechaFin);
		
		$auxIni = $fechaInicio;
		$auxFin = $fechaFin;
		
		$connection=Yii::app()->getDb();
        $command=$connection->createCommand("
SELECT ROUND(SUM(t.importe* -talonario.esCredito),2) AS importe,formasDePago.nombreForma
FROM  `pagos` t
LEFT JOIN formasDePago ON formasDePago.idFormaPago = t.idFormaPago
LEFT JOIN facturas ON facturas.id = t.idFactura
LEFT JOIN talonario ON talonario.idTalonario =facturas.idTalonario
WHERE facturas.fecha BETWEEN '$auxIni' 
AND '$auxFin' AND facturas.estado<>'ANULADA' group by t.idFormaPago");
            
            return $command->queryAll();
	}
	public function consultarFacturacion($auxIni,$auxFin)
	{
		
		$connection=Yii::app()->getDb();
        $command=$connection->createCommand("SELECT 'debito' as tipo, COUNT(idFacturaSaliente) as cantidadFacturas, SUM(importeFactura)as importe,SUM(iva105)*0.105 as importe105,SUM(iva21)*0.21 as importe21,tipoFactura FROM `facturasSalientes_view` WHERE estado<>'ANULADA' AND fecha BETWEEN '$auxIni' AND '$auxFin' GROUP BY tipoFactura
UNION(
SELECT 'credito' as tipo, COUNT(idFacturaEntrante) as cantidadFacturas, ROUND(SUM(importe),2) as importeTotal, ROUND(SUM(importe21)*0.21,2) as importe21,ROUND(SUM(importe105)*0.105,2) as importe105, tipoFactura FROM `facturasEntrantes_view` where fecha BETWEEN '$auxIni' AND '$auxFin' GROUP BY tipoFactura) order by tipoFactura
	");
            
            return $command->queryAll();
	}
	public function consultarFacturacionSalienteContable($auxIni,$auxFin)
	{
		$connection=Yii::app()->getDb();
		$sql="SELECT COUNT(idFacturaSaliente) as cantidadFacturas,SUM(importeFactura)as importe,SUM(iva105)*0.105 as importe105,SUM(iva21)*0.21 as importe21,tipoFactura FROM `facturasSalientes_view` WHERE estado<>'ANULADA' AND fecha BETWEEN '$auxIni' AND '$auxFin' GROUP BY tipoFactura";
		
        $command=$connection->createCommand($sql);
            return $command->queryAll();
	}
	public function consultarFacturacionEntranteContable($auxIni,$auxFin)
	{
		$connection=Yii::app()->getDb();
        $command=$connection->createCommand(" SELECT COUNT(idFacturaEntrante) as cantidadFacturas, ROUND(SUM(importe),2) as importe, ROUND(SUM(importe21)*0.21,2) as importe21,ROUND(SUM(importe105)*0.105,2) as importe105, tipoFactura FROM `facturasEntrantes_view` where fecha BETWEEN '$auxIni' AND '$auxFin' GROUP BY tipoFactura");
            
            return $command->queryAll();
	}
	

	
	
}