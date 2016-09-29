<?php

/**
 * This is the model class for table "cuentasEfectivo".
 *
 * The followings are the available columns in table 'cuentasEfectivo':
 * @property integer $idCuentaEfectivo
 * @property string $nombre
 * @property string $moneda
 * @property string $tipo
 * @property double $acuerdo
 */
class CuentasEfectivo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return CuentasEfectivo the static model class
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
		return 'cuentasEfectivo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, moneda, tipo, acuerdo', 'required'),
			array('acuerdo', 'numerical'),
			array('nombre, tipo', 'length', 'max'=>100),
			array('moneda', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idCuentaEfectivo, nombre, moneda, tipo, acuerdo', 'safe', 'on'=>'search'),
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
			'idCuentaEfectivo' => 'Id Cuenta Efectivo',
			'nombre' => 'Nombre',
			'moneda' => 'Moneda',
			'tipo' => 'Tipo',
			'acuerdo' => 'Acuerdo',
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

		$criteria->compare('idCuentaEfectivo',$this->idCuentaEfectivo);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('moneda',$this->moneda,true);
		$criteria->compare('tipo',$this->tipo,true);
		$criteria->compare('acuerdo',$this->acuerdo);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}