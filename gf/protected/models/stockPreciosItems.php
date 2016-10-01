<?php

/**
 * This is the model class for table "stock_precios_items".
 *
 * The followings are the available columns in table 'stock_precios_items':
 * @property integer $idStockPrecioStock
 * @property integer $idStockPrecio
 * @property integer $idStock
 * @property double $importePesosStock
 * @property double $importeDolarStock
 */
class stockPreciosItems extends CActiveRecord
{
	public $importePesosStockMin;
	public $nombreStock;
	public $cantidadCompras;
        public $porcentajeIva;
	/**
	 * Returns the static model of the specified AR class.
	 * @return stockPreciosItems the static model class
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
		return 'stock_precios_items';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idStockPrecio, idStock, importePesosStock,importePesosStockMin', 'required'),
			array('idStockPrecio, idStock', 'numerical', 'integerOnly'=>true),
			array(' importeDolarStock', 'numerical'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idStockPrecioStock, idStockPrecio, idStock, importePesosStock, importeDolarStock', 'safe', 'on'=>'search'),
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
		'stock_precios'=>array(self::BELONGS_TO, 'stock_precios', 'idStockPrecio','joinType'=>'LEFT JOIN'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	 public function getImportePesosStock()
	 {
     	return CActiveForm::textField($this,"importePesosStock",array("name"=>"StockPreciosItems[importePesosStock][" .$this->importePesosStock . "]"));
	 }
	public function attributeLabels()
	{
		return array(
			'idStockPrecioStock' => 'Id Stock Precio Stock',
			'idStockPrecio' => 'Id Stock Precio',
			'idStock' => 'Producto',
			'nombreStock' => 'Producto',
			'importePesosStockMin'=>'$ Minimo NETO',
			'importePesosStock' => '$ Lista NETO',
			'importeDolarStock' => 'US$',
			'cantidadCompras' => 'Compras',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function asignarInventario($idInventario,$idStockPrecio)
	{
		$stockPrecio=StockPrecios::model()->findByPk((int)$idStockPrecio);
		$productos=InventariosProductos::model()->consultarProductos($idInventario,5000);
		for($i=0;$i<$productos->getTotalItemCount();$i++){
			$modelo = new stockPreciosItems();
			$modelo->idStockPrecio=$idStockPrecio;
			$modelo->idStock=$productos->data[$i]['idStockInventario'];
			$modelo->importePesosStockMin=0;
			$modelo->importePesosStock=0;
			$modelo->importeDolarStock=0;
			$modelo->save();
		}
		
	}
	public function asignarservicios($idTipo,$porcentual,$idStockPrecio)
	{
		
		$stockPrecio=StockPrecios::model()->findByPk((int)$idStockPrecio);
		$modeloServicios=Servicios::model();
		$productos=$modeloServicios->consultarPorTipo($idTipo);
		
		if($porcentual==0)
			$porcentajeCalculado=1;
			else $porcentajeCalculado=(($porcentual/100)+1);
		for($i=0;$i<$productos->getTotalItemCount();$i++){
			
			$modelo = new stockPreciosItems();
			$modelo->idStockPrecio=$idStockPrecio;
			$modelo->idStock=$productos->data[$i]['idStock'];
			$modelo->importePesosStockMin=$productos->data[$i]['precioMinimo']*$porcentajeCalculado;
			$modelo->importeDolarStock=0;
			$modelo->importePesosStock=$productos->data[$i]['precioLista']*$porcentajeCalculado;
			
			$modelo->save();
		}
		
	}
	public function asignarPorTipo($idTipo,$porcentual,$idStockPrecio)
	{
		$stockPrecio=StockPrecios::model()->findByPk((int)$idStockPrecio);
		$modeloStock=Stock::model();
		$productos=$modeloStock->consultarPorTipo($idTipo);
		if($porcentual==0)
			$porcentajeCalculado=1;
			else $porcentajeCalculado=(($porcentual/100)+1);
		for($i=0;$i<$productos->getTotalItemCount();$i++){
			$modelo = new stockPreciosItems();
			$modelo->idStockPrecio=$idStockPrecio;
			$modelo->idStock=$productos->data[$i]['idStock'];
			$modelo->importePesosStockMin=$productos->data[$i]['precioMinimo']*$porcentajeCalculado;
			$modelo->importePesosStock=$productos->data[$i]['precioLista']*$porcentajeCalculado;
			$modelo->importeDolarStock=8;
			$modelo->save();
		}
		
	}
	public function asignarcompra($idCompra,$idStockPrecio,$criterio,$porcentaje,$redondear)
	{
		$stockPrecio=StockPrecios::model()->findByPk((int)$idStockPrecio);
		$productos=ComprasItems::model()->consultarProductos($idCompra);
		for($i=0;$i<$productos->getTotalItemCount();$i++){
			$modelo = new stockPreciosItems();
			$modelo->idStockPrecio=$idStockPrecio;
			$modelo->idStock=$productos->data[$i]['idStock'];
//			$modelo->importePesosStockMin=($productos->data[$i]['importeCompra'])*(($productos->data[$i]['porcentajeIva']/100)+1)*(($productos->data[$i]['porcentajeGananciaMin']/100)+1);
//			$modelo->importePesosStock=$productos->data[$i]['importeCompra']*(($productos->data[$i]['porcentajeIva']/100)+1)*(($productos->data[$i]['porcentajeGananciaLista']/100)+1)*(((int)$porcentajeGeneral/100)+1);
			$modelo->importePesosStock=$this->getPrecio($tipo,$redondea,$porcentaje,$productos->data[$i]['importeCompra'],$productos->data[$i]['porcentajeGananciaLista'],$productos->data[$i]['precioLista']);
                        $modelo->importeDolarStock=0;
			$modelo->save();
		}
		
	}
       
		
	public function consultarProductos($idStockPrecio)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idStockPrecio',$idStockPrecio);
		$criteria->select = "t.*,stock.porcentajeIva, count(compras_items.idStock) as cantidadCompras, stock.nombre as nombreStock ";
		$criteria->join = "LEFT JOIN stock on stock.idStock = t.idStock ".
		"LEFT JOIN compras_items on compras_items.idStock = t.idStock ";
		$criteria->group='t.idStock ';

		$res= new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
		return $res;
	}
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idStockPrecioStock',$this->idStockPrecioStock);
		$criteria->compare('idStockPrecio',$this->idStockPrecio);
		$criteria->compare('idStock',$this->idStock);
		$criteria->compare('importePesosStock',$this->importePesosStock);
		$criteria->compare('importeDolarStock',$this->importeDolarStock);
		
	if(isset($_GET['nombreStock']) && trim($_GET['nombreStock'])!="")
		{		
			$criteria->compare('t.nombreStock',$_GET['nombreStock'],true);
		}
		
		$criteria->select = "t.*,stock.porcentajeIva, stock.nombre as nombreStock";
	$criteria->join = "INNER JOIN stock on stock.idStock = t.idStock ";
	//$criterio->group='t.idStock';

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}