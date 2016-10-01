<?php

/**
 * This is the model class for table "ordenesPago".
 *
 * The followings are the available columns in table 'ordenesPago':
 * @property integer $idOrdenPago
 * @property string $fechaOrden
 * @property integer $idProveedor
 * @property string $estado
 * @property double $pagoAcuenta
 */
class OrdenesPago extends CActiveRecord
{
	public $proveedor;
	public $pagado;
	public $nombre;
	public $selecciones;
        public $idFormaPago;
        public $formaPago;
	/**
	 * Returns the static model of the specified AR class.
	 * @return OrdenesPago the static model class
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
		return 'ordenesPago';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idProveedor', 'numerical', 'integerOnly'=>true),
			array('pagoAcuenta', 'numerical'),
			array('estado', 'length', 'max'=>255),
			array('fechaOrden', 'safe'),
			array('fechaOrden,idFormaPago,idProveedor', 'required'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idOrdenPago, fechaOrden, idProveedor, estado, pagoAcuenta', 'safe', 'on'=>'search'),
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
			'idOrdenPago' => 'Id Orden Pago',
			'fechaOrden' => 'Fecha de Pago',
			'idProveedor' => 'Proveedor',
			'estado' => 'Estado',
			'pagoAcuenta' => 'Pago a cuenta',
			'pagado' => 'Importe Imputado',
                    'idFormaPago' => 'Forma de Pago',
		);
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

		$criteria->compare('t.idOrdenPago',$this->idOrdenPago);
		$criteria->compare('proveedores.nombre',isset($_GET['proveedor'])?$_GET['proveedor']:'','or');
		
		$criteria->select = "t.*,formasDePago.nombreForma as formaPago,SUM(ordenesPago_vencimientos.importe) as pagado ,proveedores.nombre as proveedor
				";
		$criteria->join = "LEFT JOIN proveedores on proveedores.idProveedor = t.idProveedor ".
		"LEFT JOIN ordenesPago_vencimientos on ordenesPago_vencimientos.idOrdenPago = t.idOrdenPago ".
                        "LEFT JOIN formasDePago on formasDePago.idFormaPago = t.idFormaPago ";
		
		$criteria->group=' t.idOrdenPago ';
		$criteria->order='t.idOrdenPago desc';

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}