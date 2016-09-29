<?php

/**
 * This is the model class for table "itemsFacturaSaliente".
 *
 * The followings are the available columns in table 'itemsFacturaSaliente':
 * @property integer $idItemsFacturaSaliente
 * @property integer $idElemento
 * @property integer $idFacturaSaliente
 * @property integer $cantidad
 * @property string $nombreItem
 * @property double $importeItem
 * @property string $porcentajeIva
 * @property string $tipoImporte
 */
class ItemsFacturaSaliente extends CActiveRecord
{
	public $importeItemLista;
	public $importeItemMinimo;
	public $importeItemSinIva;
        public $importeItemMasIva;
	public $condicionVenta;
	public $idStock;
	public $nombreFactura;
	public $importeFinal;
	public $importeContado;
	public $idOrdenTrabajo;
	public $total;
	public $discrimina;
	public $subTotal;
	public $bonificado;
	public $intereses;
	public $idCondicionVenta;
	public $idTipoImporte;
	public $cliente;
        public $solicitudCambioPrecio;
//        public $idOrdenTrabajo;
	
	 //lo uso para poder usar la vista de ingreso de items para facturar orden
	/**
	 * Returns the static model of the specified AR class.
	 * @return ItemsFacturaSaliente the static model class
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
		return 'itemsFacturaSaliente';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idElemento,  cantidad, nombreItem, importeItem', 'required'),
			array('idElemento, idOrdenTrabajo,idFacturaSaliente, cantidad,', 'numerical', 'integerOnly'=>true),
			array('importeItem,importeItemLista,importeItemMinimo,importeItemSinIva,bonificado', 'numerical'),
			array('nombreItem,solicitudCambioPrecio', 'length', 'max'=>500),
			array('porcentajeIva', 'length', 'max'=>5),
			array('tipoImporte', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idItemsFacturaSaliente,  idFacturaSaliente, cantidad, nombreItem, importeItem, porcentajeIva, tipoImporte', 'safe', 'on'=>'search'),
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
	public function cargarItems($idFacturaSalienteCte,$idFacturaSaliente)
	{
		$connection=Yii::app()->getDb();
		
//		$command=$connection->createCommand("
//SELECT t.* FROM `facturasSalientesCorriente` t" .
//		" where t.idFacturaSalienteCorriente='$idFacturaSalienteCte'
//");
//
//            $factura= $command->queryAll();
        $command=$connection->createCommand("
SELECT * FROM `itemsFacturaSaliente` where idFacturaSaliente='5'
");
            $items= $command->queryAll();
            foreach($items as $item){
            	$modelo=self::model();
            	 
            	 
            	 
            	$modelo->idFacturaSaliente=$idFacturaSaliente;
            	$modelo->cantidad=$item['cantidad'];
            	$modelo->nombreItem=$item['nombreItem'];
            	$modelo->importeItem=$item['importeItem'];
            	$modelo->porcentajeIva=$item['porcentajeIva'];
            	$modelo->tipoImporte=$item['tipoImporte'];
            	$modelo->idElemento=$item['idElemento'];
            	$modelo->importeItemLista=$item['importeItemLista'];
            	$modelo->importeItemMinimo=$item['importeItemMinimo'];
            	
            	($modelo->save());
            	
//            	echo 'cantidad: '.$modelo->cantidad.'<br>';
//            	 echo 'nombreItem: '.$modelo->nombreItem.'<br>';
//            	 echo 'importeItem: '.$modelo->importeItem.'<br>';
//            	 echo 'porcentajeIva: '.$modelo->porcentajeIva.'<br>';
//            	 echo 'tipoImporte: '.$modelo->tipoImporte.'<br>';
//            	 echo 'idElemento: '.$modelo->idElemento.'<br>';
//            	 echo 'idFacturaSaliente: '.$modelo->idFacturaSaliente.'<br>';
//            	 echo 'importeItemLista: '.$modelo->importeItemLista.'<br>';
//            	 echo 'importeItemMinimo: '.$modelo->importeItemMinimo.'<br><br>';
            	
            }
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function getElementoKey($idStock,$cantidad,$importeAfuera=false,$idOrdenTrabajo=false)
	{
		
						$selec = "SELECT t.*, SUBSTRING_INDEX( GROUP_CONCAT(CAST(stock_disponible.cantidadDisponible AS CHAR) ORDER BY stock_disponible.idStockDisponible desc), ',', 1 ) as cantidadDisponible ," .
"(SELECT importePesosStock - (importePesosStock*((t.porcentajeIva/100))) FROM stock_precios_items WHERE stock_precios_items.idStock = t.idStock ORDER BY stock_precios_items.idStockPrecioStock desc LIMIT 1) as importeSinIva," 

."ROUND((SELECT importePesosStock FROM stock_precios_items WHERE stock_precios_items.idStock = t.idStock ORDER BY stock_precios_items.idStockPrecioStock desc LIMIT 1),2) as precioLista," 
."ROUND((SELECT importePesosStockMin FROM stock_precios_items WHERE stock_precios_items.idStock = t.idStock ORDER BY stock_precios_items.idStockPrecioStock desc LIMIT 1),2) as precioMinimo, " 
."  stock_tipoProducto.nombre as nombreTipoProducto, stock_marcas.nombreMarca as nombreMarca "
				;

		$join = " from stock t LEFT JOIN stock_tipoProducto on stock_tipoProducto.idStockTipo = t.idTipoProducto ".
				" LEFT JOIN stock_marcas on stock_marcas.idStockMarcas = t.idStockMarca 
				LEFT JOIN stock_disponible on stock_disponible.idStock = t.idStock ";
		
		$ultimo = " group by t.idStock order by cantidadDisponible desc, nombre";
		
		

		
		$connection=Yii::app()->getDb();
		$sql=$selec.$join." where t.idStock='$idStock' ".$ultimo;
        $command=$connection->createCommand($sql);
   
        $item=$command->queryAll();
        $salida=null;
            if(count($item)!=0){
            	$salida= new ItemsFacturaSaliente;
            	$salida->idElemento=$item[0]['idStock'];
            	$salida->cantidad=$cantidad;
            	$salida->porcentajeIva=$item[0]['porcentajeIva'];
            	$salida->importeItem=$importeAfuera=false?$item[0]['precioLista']:$importeAfuera;
            	$salida->importeItemLista=$item[0]['precioLista'];
          	$salida->importeItemMinimo=$item[0]['precioMinimo'];
             	$salida->nombreItem=$item[0]['nombre'];
                if($idOrdenTrabajo!=false) $salida->idOrdenTrabajo=$idOrdenTrabajo;
             	
            }else {
            	$link=CHtml::link('Productos',
                    Yii::app()->createUrl("stock"));
            	//Yii::app()->user->setFlash('error',"No se encuentra el Producto, busque el producto en ".$link.'!');
            }
            
            return $salida;
	}
        public function getElementoKeyPresupuesto($itemPresupuesto)
	{
	
            	$salida= new ItemsFacturaSaliente;
            	$salida->idElemento=$itemPresupuesto['idStock'];
            	$salida->cantidad=$itemPresupuesto['cantidadItems'];
            	$salida->porcentajeIva=$itemPresupuesto['porcentajeIva'];
            	$salida->importeItem=$itemPresupuesto['precioVenta'];
            	$salida->importeItemLista=$itemPresupuesto['importeItemSinIva'];
          	$salida->importeItemMinimo=$itemPresupuesto['importeItemMinimo'];
             	$salida->nombreItem=$itemPresupuesto['nombreStock'];
                $salida->tipoImporte='Lista';
             	
            
            
            return $salida;
	}
	public function getElementoCodigo($codigoBarra,$cantidad)
	{
		
						$selec = "SELECT t.*, SUBSTRING_INDEX( GROUP_CONCAT(CAST(stock_disponible.cantidadDisponible AS CHAR) ORDER BY stock_disponible.idStockDisponible desc), ',', 1 ) as cantidadDisponible ," .
"(SELECT importePesosStock - (importePesosStock*((t.porcentajeIva/100))) FROM stock_precios_items WHERE stock_precios_items.idStock = t.idStock ORDER BY stock_precios_items.idStockPrecioStock desc LIMIT 1) as importeSinIva," 

."ROUND((SELECT importePesosStock FROM stock_precios_items WHERE stock_precios_items.idStock = t.idStock ORDER BY stock_precios_items.idStockPrecioStock desc LIMIT 1),2) as precioLista," 
."ROUND((SELECT importePesosStock*((st.porcentajeIva/100)+1) FROM stock_precios_items LEFT JOIN stock st on st.idStock=stock_precios_items.idStock WHERE stock_precios_items.idStock = t.idStock ORDER BY stock_precios_items.idStockPrecioStock desc LIMIT 1),2) as precioListaMasIva," 
."ROUND((SELECT importePesosStockMin FROM stock_precios_items WHERE stock_precios_items.idStock = t.idStock ORDER BY stock_precios_items.idStockPrecioStock desc LIMIT 1),2) as precioMinimo, " 
."  stock_tipoProducto.nombre as nombreTipoProducto, stock_marcas.nombreMarca as nombreMarca "
				;

		$join = " from stock t LEFT JOIN stock_tipoProducto on stock_tipoProducto.idStockTipo = t.idTipoProducto ".
				" LEFT JOIN stock_marcas on stock_marcas.idStockMarcas = t.idStockMarca 
				LEFT JOIN stock_disponible on stock_disponible.idStock = t.idStock ";
		
		$ultimo = " group by t.idStock order by cantidadDisponible desc, nombre";
		
		

		
		$connection=Yii::app()->getDb();
        $command=$connection->createCommand($selec.$join." where codigoBarra='$codigoBarra' or t.idStock='$codigoBarra' ".$ultimo);
        $item=$command->queryAll();
        $salida=null;
            if(count($item)!=0){
            	$salida= new ItemsFacturaSaliente;
            	$salida->idElemento=$item[0]['idStock'];
            	$salida->cantidad=$cantidad;
            	$salida->porcentajeIva=$item[0]['porcentajeIva'];
            	$salida->importeItem=$item[0]['precioLista'];
            	$salida->importeItemLista=$item[0]['precioListaMasIva'];
                $salida->importeItemMasIva=$item[0]['precioListaMasIva'];
          		$salida->importeItemMinimo=$item[0]['precioMinimo'];
             	$salida->nombreItem=$item[0]['nombre'];
            }else {
            	$link=CHtml::link('Productos',
                    Yii::app()->createUrl("stock"));
            	Yii::app()->user->setFlash('error',"No se encuentra el Producto, busque el producto en ".$link.'!');
            }
            if($codigoBarra=="") return null;
            return $salida;
	}
	public function yaExiste($idFactura)
	{
		$connection=Yii::app()->getDb();
            $command=$connection->createCommand("SELECT t.idFacturaSaliente as idFacturaSaliente
            											 " .
		
		" FROM itemsFacturaSaliente t INNER JOIN facturasSalientesVencimiento 
		on facturasSalientesVencimiento.idFacturaSaliente = t.idFacturaSaliente  WHERE t.idFacturaSaliente =" .$idFactura
            ." or t.idItemsFacturaSaliente =" .$idFactura);
        
        return $command->queryAll();
        
		$criteria=new CDbCriteria;
		$criteria->select = " t.* ";
		$criteria->join = "INNER JOIN facturasSalientesVencimiento on facturasSalientesVencimiento.idFacturaSaliente = t.idFacturaSaliente ";
		$criteria->compare('t.idFacturaSaliente',$idFactura);
		$res= new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
		return $res->getData();
	}
	public function consultarFacturaUnicaCliente($idFacturaSaliente)
	{
		$criteria=new CDbCriteria;
			$criteria->compare('t.idFacturaSaliente',$idFacturaSaliente);
//			CONCAT('Importe $ ', ROUND(SUM(itemsFacturaSaliente.importeItem),2),' - ',t.fecha) as nombreFactura, 
			$criteria->select = "CONCAT( 'Importe $ ' ,ROUND(SUM(t.importeItem*t.cantidad),2),' | ',
			facturasSalientes.fecha, '  |  ','Nº Fac: ',facturasSalientes.numeroFactura,
									 '  |  ','Tipo Fac: ',facturasSalientes.tipoFactura ) 
			as nombreFactura, t.*,clientes.* , ROUND(SUM(t.importeItem*t.cantidad),2) as importeFinal ";
			$criteria->join = "LEFT JOIN facturasSalientes on t.idFacturaSaliente = facturasSalientes.idFacturaSaliente ".
		"LEFT JOIN clientes on facturasSalientes.idCliente = clientes.idCliente ";
	
		$res= new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
		return $res->getData();
	}
	
	public function beforeDelete()
	{
		 parent::beforeDelete();
		 
$criteria=new CDbCriteria;
$criteria->select = ' * ';  // only select the 'title' column
$criteria->condition = ' idItemsFacturaSaliente=:idItemsFacturaSaliente ';
$criteria->params=array(':idItemsFacturaSaliente'=>$this->idItemsFacturaSaliente);
$items=ItemsFacturaSaliente::model()->findAll($criteria);


for($i=0;count($items)>$i;$i++)
{
	
$criteria=new CDbCriteria;
$criteria->select = ' * ';  // only select the 'title' column
$criteria->condition = ' idStock=:idStock ';
$criteria->params=array(':idStock'=>$items[$i]->idElemento);
$criteria->order='t.idStockDisponible desc';
$disponibles=StockDisponible::model()->find($criteria);

	$disponibles->cantidadDisponible = $disponibles->cantidadDisponible + $items[$i]->cantidad;
	$disponibles->update();

}		 
		  return parent::beforeDelete();
	}
	
	public  function afterSave()
	{
		  	  parent::afterSave();
      
$criteria=new CDbCriteria;
$criteria->select = ' * ';  // only select the 'title' column
$criteria->condition = ' idStock=:idStock ';
$criteria->params=array(':idStock'=>$this->idElemento);
$criteria->order='t.idStockDisponible desc';
$disponibles=StockDisponible::model()->find($criteria);

$fact=FacturasSalientes::model()->findByPk($this->idFacturaSaliente);
if($fact->esFacturaCredito==1){
    if (isset($disponibles->cantidadDisponible))
        {
                $disponibles->cantidadDisponible = $disponibles->cantidadDisponible + $this->cantidad;
                $disponibles->update();

        }
        else {   
              $modeloDisponible = new StockDisponible;
              $modeloDisponible->idStock =  $this->idStock;
              $modeloDisponible->cantidadDisponible =  $this->cantidad;
              $modeloDisponible->save();
        }
}else{
        if (isset($disponibles->cantidadDisponible))
        {
                $disponibles->cantidadDisponible = $disponibles->cantidadDisponible - $this->cantidad;
                $disponibles->update();

        }
        else {   
              $modeloDisponible = new StockDisponible;
              $modeloDisponible->idStock =  $this->idStock;
              $modeloDisponible->cantidadDisponible =  $this->cantidad;
              $modeloDisponible->save();
        }
}

 

      return parent::afterSave();
	}
	public function attributeLabels()
	{
		return array(
			'idItemsFacturaSaliente' => 'Id Items Factura Saliente',
			'idElemento' => 'Stock/Servicio',
			'idFacturaSaliente' => 'Id Factura Saliente',
			'cantidad' => 'Cantidad',
			'nombreItem' => 'Descripción',
			'importeItem' => '$ FINAL',
			'porcentajeIva' => '% IVA',
			'masIva' => 'Mas Iva',
		);
	}
	public function getTipoImportes()
	{
    	return array('lista' => '$ Lista', 'bonificado' => '$ Bonificado');
	}
	public function ventasStock($idStock)
	{
		$criteria=new CDbCriteria;

		$criteria->condition="t.idElemento='$idStock'";
		
		$criteria->join = "LEFT JOIN stock  on stock.idStock = t.idElemento ".
		"LEFT JOIN facturasSalientes on facturasSalientes.idFacturaSaliente = t.idFacturaSaliente ".
		"LEFT JOIN clientes on clientes.idCliente = facturasSalientes.idCliente ";
		$criteria->select = "t.*,CONCAT(clientes.apellido,' ',clientes.nombre,' ',clientes.razonSocial) as cliente";
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	public function consultarResumenTotal($idFactura)
	{
		$criteria=new CDbCriteria;

		
		$criteria->compare('t.idFacturaSaliente',$idFactura);
		$criteria->select = "t.*";
		
//		$criteria->group='t.alicuotaIva';
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	public function consultarResumen($idFactura)
	{
		$criteria=new CDbCriteria;

		
		$criteria->compare('t.idFacturaSaliente',$idFactura);
		$criteria->select = " t.porcentajeIva as porcentajeIva,SUM(t.importeItem) as importeFinal ";
		
		$criteria->group='t.porcentajeIva';
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idItemsFacturaSaliente',$this->idItemsFacturaSaliente);
		$criteria->compare('idElemento',$this->idElemento);
		$criteria->compare('idFacturaSaliente',$this->idFacturaSaliente);
		$criteria->compare('cantidad',$this->cantidad);
		$criteria->compare('nombreItem',$this->nombreItem,true);
		$criteria->compare('importeItem',$this->importeItem);
		$criteria->compare('porcentajeIva',$this->porcentajeIva,true);
		$criteria->compare('tipoImporte',$this->tipoImporte,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	public function itemsFacturaImpresion($idFactura)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idFacturaSaliente',$idFactura);

		return self::model()->findAll($criteria);
	}
	public function consultarItemsFactura($idFactura)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idFacturaSaliente',$idFactura);

		return self::model()->findAll($criteria);
	}
	public function itemsFactura($idFactura)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idFacturaSaliente',$idFactura);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	
public function itemsFacturaDiscriminadoIVA($idFactura)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		$criteria->select = " ROUND(SUM(t.cantidad * importeItem)-ROUND(SUM((t.cantidad * importeItem)*porcentajeIva/100),2),2) as total,t.porcentajeIva as porcentajeIva, 
		ROUND(SUM((t.cantidad * importeItem)*porcentajeIva/100),2) as discrimina";
		$criteria->compare('idFacturaSaliente',$idFactura);
		$criteria->group='t.idFacturaSaliente,t.porcentajeIva';
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
public function itemsFacturaTotales($idFactura)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		$criteria->select = "
		ROUND(SUM(t.cantidad * importeItem)-ROUND(SUM((t.cantidad * importeItem)*porcentajeIva/100),2),2) as subTotal
		,ROUND(SUM(t.cantidad * importeItem),2) as total ";
		$criteria->compare('idFacturaSaliente',$idFactura);
		$criteria->group='t.idFacturaSaliente';
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}