<?php

/**
 * This is the model class for table "compras_items".
 *
 * The followings are the available columns in table 'compras_items':
 * @property integer $idCompraItem
 * @property integer $idCompra
 * @property integer $idStock
 * @property integer $cantidad
 * @property double $alicuotaIva
 */
class ComprasItems extends CActiveRecord
{
	public $nombreStock;
	public $importeCompra;
	public $importeSub;
	public $nombreProveedor;
	public $fechaCompra;
	public $cantidadCompras;
	public $porcentajeGananciaLista;
	public $porcentajeGananciaMin;
	public $porcentajeIva;
	public $stockeado;
	public $idFacturaEntrante;
	public $importeTotal;
        public $codigoBarra;
        public $precioLista;
        public $precioMinimo;
        public $importeSinIva;
	/**
	 * Returns the static model of the specified AR class.
	 * @return ComprasItems the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	public function behaviors()
	{
    	return array(
        	'LoggableBehavior'=>
            	'application.modules.auditTrail.behaviors.LoggableBehavior',
    	);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'compras_items';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idStock, cantidad, alicuotaIva ,importeCompra', 'required'),
			array('idFacturaEntrante, idStock, cantidad', 'numerical', 'integerOnly'=>true),
			array('nombreStock', 'length', 'max'=>250),
			array('alicuotaIva', 'numerical'),
//			 The following rule is used by search().
//			 Please remove those attributes that should not be searched.
			array('idCompraItem,nombreStock,  idStock, cantidad, alicuotaIva', 'safe', 'on'=>'search'),
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
			'idCompraItem' => 'Id Compra Item',
			
			'idStock' => 'Producto',
			'cantidad' => 'Cantidad',
			'alicuotaIva' => '% Iva',
			'importeCompra' => '$ Compra',
			'importeDolarCompra' => 'US$ Compra',
			'importeTotal' => '$ Total',
		);
	}
	public function getElementoCodigo($codigoBarra)
	{
		$connection=Yii::app()->getDb();
        $command=$connection->createCommand("SELECT * from stock where codigoBarra='$codigoBarra' or idStock='$codigoBarra'");
            $item=$command->queryAll();
             $salida=null;
            if(count($item)>0){
            	$salida= new ComprasItems;
            $salida->idStock=$item[0]['idStock'];
            $salida->cantidad=1;
            $salida->alicuotaIva=$item[0]['porcentajeIva'];
            $salida->nombreStock=$item[0]['nombre'];
            }else {
            	$link=CHtml::link('Productos',
                    Yii::app()->createUrl("stock"));
            	Yii::app()->user->setFlash('error',"No se encuentra el Producto, busque el producto en ".$link.'!');
            }
            
            
            return $salida;
	}
	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function consultarProductos($idFactura,$devuelveArray=false)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idFacturaEntrante',$idFactura);
		
		$criteria->select = "t.*, (t.importeCompra*t.cantidad) as importeTotal,stock.codigoBarra, stock.nombre as nombreStock, porcentajeIva, porcentajeGananciaLista,porcentajeGananciaMin,+ "
		 ."(SELECT importeCompra FROM compras_items WHERE compras_items.idStock = t.idStock ORDER BY compras_items.idCompraItem desc LIMIT 1) as precioCompra, "
		."(SELECT importePesosStock*((stock.porcentajeIva/100)+1) FROM stock_precios_items WHERE stock_precios_items.idStock = t.idStock ORDER BY stock_precios_items.idStockPrecioStock desc LIMIT 1) as precioLista," 
                        ."(SELECT importePesosStock FROM stock_precios_items WHERE stock_precios_items.idStock = t.idStock ORDER BY stock_precios_items.idStockPrecioStock desc LIMIT 1) as importeSinIva," 
                ."(SELECT importePesosStockMin*((stock.porcentajeIva/100)+1) FROM stock_precios_items WHERE stock_precios_items.idStock = t.idStock ORDER BY stock_precios_items.idStockPrecioStock desc LIMIT 1) as precioMinimo ";
                
                $criteria->join =  "LEFT JOIN stock on stock.idStock = t.idStock " .
				"LEFT JOIN stock_tipoProducto on stock.idTipoProducto = stock_tipoProducto.idStockTipo";
		$criteria->group='t.idCompraItem';
		$criteria->order='t.idCompraItem desc';
                if($devuelveArray) return self::model()->findAll($criteria);
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria, 'pagination'=>array(
        'pageSize'=>2000,
    ),
		//paginacion!
		));
	}
	public function consultarResumenTotal($idFactura)
	{
		$criteria=new CDbCriteria;

		
		$criteria->compare('t.idFacturaEntrante',$idFactura);
		$criteria->select = " SUM((t.importeCompra+(t.importeCompra*(t.alicuotaIva/100)))*t.cantidad)+(facturasEntrantes.importeFlete*1.21)+facturasEntrantes.importeRecargos+facturasEntrantes.importeImpuestos-facturasEntrantes.importeDescuentos  as importeCompra,SUM(t.importeCompra*t.cantidad)+(facturasEntrantes.importeFlete*1.21)+facturasEntrantes.importeRecargos+facturasEntrantes.importeImpuestos-facturasEntrantes.importeDescuentos as importeSub ";
		$criteria->join = "LEFT JOIN facturasEntrantes on t.idFacturaEntrante = facturasEntrantes.idFacturaEntrante ";
		//$criteria->group='t.alicuotaIva';
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
        public function consultarResumen2($idFactura)
	{
		$criteria=new CDbCriteria;

		
		$criteria->compare('t.idFacturaEntrante',$idFactura);
		$criteria->select = "t.*, t.alicuotaIva  as porcentajeIva,(t.importeCompra*t.cantidad) as importeCompra ";
		
		return self::model()->findAll($criteria);
		
	}
	public function consultarResumen($idFactura)
	{
		$criteria=new CDbCriteria;

		
		$criteria->compare('t.idFacturaEntrante',$idFactura);
		$criteria->select = " t.alicuotaIva as porcentajeIva,SUM(t.importeCompra*t.cantidad) as importeCompra ";
		
		$criteria->group='t.alicuotaIva';
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	public function comprasProducto($idStock)
	{
		$criteria=new CDbCriteria;

		
		$criteria->compare('t.idStock',$idStock);
		$criteria->select = "t.*, facturasEntrantes.fecha as fechaCompra,stock.nombre as nombreStock,proveedores.nombre as nombreProveedor ";
		$criteria->join =  "LEFT JOIN stock on stock.idStock = t.idStock ".
	
		"INNER JOIN facturasEntrantes on facturasEntrantes.idFacturaEntrante = t.idFacturaEntrante ".
		"INNER JOIN proveedores on proveedores.idProveedor = facturasEntrantes.idProveedor ";
		$creiteria->group='compras_items.idStock';
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	public function beforeDelete()
	{
		parent::beforeDelete();
		Stock::model()->decrementarStock($this->idStock,$this->cantidad); 
		return parent::beforeDelete();
	}
	public  function afterSave()
	{
		parent::afterSave();
		
//		$prod=self::model()->findByPk($this->idCompraItem);
//		$prod->stockeado=1;
//		$prod->save();
		Stock::model()->incrementarStock($this->idStock,$this->cantidad); 

      	return parent::afterSave();
	}

	public function search()
	{
		$criteria=new CDbCriteria;
		$criteria->select = "t.*, (t.importeCompra*t.cantidad) as importeTotal,"
                ."(SELECT importeCompra FROM compras_items WHERE compras_items.idStock = t.idStock ORDER BY compras_items.idCompraItem desc LIMIT 1) as precioCompra, "
		."(SELECT importePesosStock*((t.porcentajeIva/100)+1) FROM stock_precios_items WHERE stock_precios_items.idStock = t.idStock ORDER BY stock_precios_items.idStockPrecioStock desc LIMIT 1) as precioLista," 
                ."(SELECT importePesosStockMin*((t.porcentajeIva/100)+1) FROM stock_precios_items WHERE stock_precios_items.idStock = t.idStock ORDER BY stock_precios_items.idStockPrecioStock desc LIMIT 1) as precioMinimo ";
                $criteria->compare('idCompraItem',$this->idCompraItem);
	
		$criteria->compare('idStock',$this->idStock);
		$criteria->compare('cantidad',$this->cantidad);
		$criteria->compare('alicuotaIva',$this->alicuotaIva);
		

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}