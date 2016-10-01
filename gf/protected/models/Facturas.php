<?php

/**
 * This is the model class for table "facturas".
 *
 * The followings are the available columns in table 'facturas':
 * @property integer $id
 * @property string $fecha
 * @property integer $idCliente
 * @property string $nroFactura
 * @property string $estado
 * @property integer $idTalonario
 * @property double $bonificacion
 * @property double $interes
 * @property integer $idVendedor
 * @property double $importe
 * @property double $importeSaldo
 *
 * The followings are the available model relations:
 * @property Clientes $idCliente0
 * @property FacturasItems[] $facturasItems
 * @property Pagos[] $pagoses
 */
class Facturas extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Facturas the static model class
	 */
	 public $buscar;
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'facturas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idCliente, idTalonario, idVendedor', 'numerical', 'integerOnly'=>true),
			array('bonificacion, interes, importe, importeSaldo', 'numerical'),
			array('nroFactura', 'length', 'max'=>100),
			array('estado', 'length', 'max'=>200),
			array('fecha', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('buscar,id, fecha, idCliente,  nroFactura, estado, idTalonario, bonificacion, interes, idVendedor, importe, importeSaldo', 'safe', 'on'=>'search'),
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
			'cliente' => array(self::BELONGS_TO, 'Clientes', 'idCliente'),
			'talonario' => array(self::BELONGS_TO, 'Talonario', 'idTalonario'),
			'facturasItems' => array(self::HAS_MANY, 'FacturasItems', 'idFactura'),
			'pagoses' => array(self::HAS_MANY, 'Pagos', 'idFactura'),
		);
	}
	public function aplicarStock($inverso=false)
	{
		foreach($this->facturasItems as $item){
			$cantidad=$item->cantidad*($this->talonario->esCredito);
			if($inverso)$cantidad=-$cantidad;
			StockDisponible::model()->agregarStock($item->idProducto,$cantidad);
		}
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'fecha' => 'Fecha',
			'idCliente' => 'Id Cliente',
			'nroFactura' => 'Nro Factura',
			'estado' => 'Estado',
			'idTalonario' => 'Id Talonario',
			'bonificacion' => 'Bonificacion',
			'interes' => 'Interes',
			'idVendedor' => 'Id Vendedor',
			'importe' => 'Importe',
			'importeSaldo' => 'Importe Saldo',
		);
	}
	public function cambiarEstado($estado)
	{
		$this->estado=$estado;
		$this->save();
	}
	public function consultarLibro($idTalonario,$fechaInicio,$fechaFin)
	{
		$criteria=new CDbCriteria;
		$criteria->addBetweenCondition('fecha',$fechaInicio,$fechaFin);
		$criteria->compare('idTalonario',$idTalonario,false);
		$criteria->order='CAST(nroFactura AS DECIMAL)';
		return self::model()->findAll($criteria);
	}
	public function getNroHoja($factura)
	{
		return($factura->talonario->ultimoNroPagIva);
	}
	public function aPartir($factura)
	{
		$sql='select count(id) as dato from facturas where idTalonario='.$factura->idTalonario.' and id<='.$factura->id;
		$data = Yii::app()->db2->createCommand($sql)->query();
		foreach($data as $item)
			$cantidadAntes= $item['dato'];
		return $cantidadAntes % 62;
	}
	public function totalHojas($idTalonario)
	{
		$sql='select count(id) as dato from facturas where idTalonario='.$idTalonario;
		$data = Yii::app()->db2->createCommand($sql)->query();
		foreach($data as $item)
			$dato= $item['dato'];
		return $dato;
	}
	public function consultarPorTalonario($idTalonario)
	{
		$criteria=new CDbCriteria;
		$criteria->condition= 'idTalonario='.$idTalonario;
		$criteria->order='t.fecha';
		return self::model()->findAll($criteria);
	}
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		$criteria->with=array('cliente');
		$criteria->compare('cliente.razonSocial',$this->buscar,true,'OR');
		$criteria->compare('nroFactura',$this->buscar,true,'OR');
		$criteria->compare('importe',$this->buscar,true,'OR');
		$criteria->compare('importeSaldo',$this->buscar,true,'OR');
		$criteria->order='id desc';
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}