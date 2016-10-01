<?php

/**
 * This is the model class for table "inventarios_productos".
 *
 * The followings are the available columns in table 'inventarios_productos':
 * @property integer $idInventarioProducto
 * @property integer $idInventario
 * @property string $fechaProductoInventario
 * @property integer $idStockInventario
 * @property integer $cantidadInventario
 */
class InventariosProductos extends CActiveRecord
{
	public $nombreStock;
        public $cantidadInventarioTotal;
	/**
	 * Returns the static model of the specified AR class.
	 * @return InventariosProductos the static model class
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
		return 'inventarios_productos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idInventario, fechaProductoInventario, idStockInventario, cantidadInventario', 'required'),
			array('idInventario, idStockInventario, cantidadInventario', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idInventarioProducto, idInventario, fechaProductoInventario, idStockInventario, cantidadInventario', 'safe', 'on'=>'search'),
		);
	}
        public function consultarCantidadesPorTipos($id)
        {
            $connection=Yii::app()->getDb();
        $command=$connection->createCommand("SELECT sum(t.cantidadInventario) as cantidad,stock_tipoProducto.nombre as nombreTipo
 FROM `inventarios_productos` t
left join stock on stock.idStock=t.idStockInventario
left join stock_tipoProducto on stock_tipoProducto.idStockTipo=stock.idTipoProducto
WHERE t.idInventario=$id group by stock_tipoProducto.idStockTipo");
            
            $res= $command->queryAll();
            $salida="<table class='sinFormato'>";
		$salida.="<tr>" .
		
					"	<td>Tipo de Producto</td>".
					"	<td>Cantidad</td>".
				
					"</tr>";
            foreach ($res as $key => $value) {
                $salida.="<tr>" .
		
					"	<td>".$value['nombreTipo']."</td>".
					"	<td>".$value['cantidad']."</td>".
				
					"</tr>";
            }
            $salida.='</table>';
            return $salida;
        }
        public function consultarCantidades($id)
        {
            $connection=Yii::app()->getDb();
        $command=$connection->createCommand("SELECT sum(cantidadInventario) as cantidad FROM `inventarios_productos` t
left join stock on stock.idStock=t.idStockInventario
WHERE t.idInventario=$id");
            
            $res= $command->queryAll();
            return $res[0]['cantidad'];
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
			'idInventarioProducto' => 'Id Inventario Producto',
			'idInventario' => 'Inventario',
			'fechaProductoInventario' => 'Fecha Producto Inventario',
			'idStockInventario' => 'Producto',
			'cantidadInventario' => 'Cantidad',
		);
	}
	public function consultarStockReal()
	{
		$criteria=new CDbCriteria;
		$sort = new CSort;
        $sort->defaultOrder = 'nombre asc';

		$criteria->compare('inventarios.esPredeterminado','1');
		$criteria->select = "t.*,stock.nombre  as nombreStock,SUM(t.cantidadInventario+compras_items.cantidad) as cantidadReal ";
		$criteria->join = "LEFT JOIN inventarios on inventarios.idInventario = t.idInventario "
		."INNER JOIN stock on stock.idStock = t.idStockInventario "
		."LEFT JOIN compras_items on (compras_items.idStock = t.idStockInventario) "
		;
		$criteria->group='stock.idStock';
		//$criteria->having='esPredeterminado=1';

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,'sort'=>$sort
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

		$criteria->compare('idInventarioProducto',$this->idInventarioProducto);
		$criteria->compare('idInventario',$this->idInventario);
		$criteria->compare('fechaProductoInventario',$this->fechaProductoInventario,true);
		$criteria->compare('idStockInventario',$this->idStockInventario);
		$criteria->compare('cantidadInventario',$this->cantidadInventario);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	public function consultarProductos($idInventario,$paginacion=10,$array=false)
	{
		$criteria=new CDbCriteria;
                if(isset($_GET['idStock']) && trim($_GET['idStock'])!="")
		{ 
			$criteria->compare('stock.nombre',$_GET['idStock'],true,'OR');
                        $criteria->compare('stock.codigoBarra',$_GET['idStock'],true,'OR');
		}
                

		$criteria->compare('idInventario',$idInventario);
		
		$criteria->select = "t.*,stock.nombre as nombreStock ";
		$criteria->join = "LEFT JOIN stock on stock.idStock = t.idStockInventario ";
//		$criteria->group='t.idStockInventario';
                if ($array) return self::model()->findAll($criteria);
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,'pagination'=>array(
        'pageSize'=>$paginacion,
    ),
		));
	}
}