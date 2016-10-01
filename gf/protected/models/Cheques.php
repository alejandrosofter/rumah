<?php

/**
 * This is the model class for table "cheques".
 *
 * The followings are the available columns in table 'cheques':
 * @property integer $idCheque
 * @property string $fechaEmision
 * @property string $fechaCobro
 * @property integer $idCliente
 * @property string $paguese
 * @property double $importe
 * @property integer $esCruzado
 * @property integer $idCuenta
 * @property integer $numeroCheque
 *
 * The followings are the available model relations:
 * @property ChequesEstados[] $chequesEstadoses
 */
class Cheques extends CActiveRecord
{
	public $nombreCliente;
	public $cuenta;
	public $cliente;
	public $ultimoEstado;
	public $diasCobro;
	/**
	 * Returns the static model of the specified AR class.
	 * @return Cheques the static model class
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
		return 'cheques';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fechaEmision,idCliente, fechaCobro,  paguese, importe, esCruzado, idCuenta, numeroCheque', 'required'),
			array(' esCruzado, idCuenta, numeroCheque', 'numerical', 'integerOnly'=>true),
			array('importe', 'numerical'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idCheque, fechaEmision, fechaCobro, idCliente, paguese, importe, esCruzado, idCuenta, numeroCheque', 'safe', 'on'=>'search'),
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
			'chequesEstadoses' => array(self::HAS_MANY, 'ChequesEstados', 'idCheque'),
		);
	}
	

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idCheque' => 'Id Cheque',
			'fechaEmision' => 'Fecha Emision',
			'fechaCobro' => 'Fecha Cobro',
			'diasCobro' => 'Dias p/cobro',
			'idCliente' => 'Cliente',
			'paguese' => 'Paguese',
			'importe' => 'Importe',
			'esCruzado' => 'Es Cruzado',
			'idCuenta' => 'Cuenta',
			'numeroCheque' => 'Numero Cheque',
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
		
		$this->cliente=isset($_GET['nombre'])?$_GET['nombre']:'';
		
	
		
		$criteria=new CDbCriteria;

		$criteria->compare('idCheque',$this->idCheque);
		$criteria->compare('fechaEmision',$this->fechaEmision,true);
		$criteria->compare('fechaCobro',$this->fechaCobro,true);
		if(isset($_GET['nombre']) && trim($_GET['nombre'])!="")
		{		
			$criteria->compare('clientes.razonSocial',$_GET['nombre'],true);
			$criteria->compare('clientes.apellido',$_GET['nombre'],true,"OR");
			$criteria->compare('clientes.nombre',$_GET['nombre'],true,"OR"); 
		}
		$criteria->compare('paguese',$this->paguese,true);
		$criteria->compare('importe',$this->importe);
		$criteria->compare('esCruzado',$this->esCruzado);
		$criteria->compare('idCuenta',$this->idCuenta);
		$criteria->compare('numeroCheque',$this->numeroCheque);
		
		$criteria->select='t.*, dateDIFF(t.fechaCobro,CURDATE()) as diasCobro,  SUBSTRING_INDEX( GROUP_CONCAT(CAST(cheques_estados.nombreEstado AS CHAR) ORDER BY cheques_estados.idEstadoCheque desc), ",", 1 ) as ultimoEstado, ' .
				"if(clientes.tipoCliente='Empresa',clientes.razonSocial,CONCAT(clientes.apellido,', ',clientes.nombre)) as cliente";
		
		$criteria->join = "LEFT JOIN clientes on clientes.idCliente = t.idCliente" .
			" LEFT JOIN cuentasEfectivo on cuentasEfectivo.idCuentaEfectivo = t.idCuenta " .
			"LEFT JOIN cheques_estados on cheques_estados.idCheque = t.idCheque";
		$criteria->group=' t.idCheque';
		$criteria->order='diasCobro asc';

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}