<?php

/**
 * This is the model class for table "reloj_Sucursales".
 *
 * The followings are the available columns in table 'reloj_Sucursales':
 * @property integer $idSucursal
 * @property string $nombreSucursal
 * @property string $direccionSucursal
 * @property string $telefonoSucursal
 */
class RelojSucursales extends CActiveRecord
{
	public $idReloj;
	public $idsucursal;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return RelojSucursales the static model class
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
		return 'reloj_Sucursales';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombreSucursal, direccionSucursal, telefonoSucursal', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idReloj', 'numerical', 'integerOnly'=>true),
			array ('idReloj', 'required'),
			array('idSucursal, nombreSucursal, direccionSucursal, telefonoSucursal', 'safe', 'on'=>'search'),
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
			'idSucursal' => 'Sucursal',
			'nombreSucursal' => 'Nombre Sucursal',
			'direccionSucursal' => 'Direccion Sucursal',
			'telefonoSucursal' => 'Telefono Sucursal',
			'idReloj' => 'Reloj',
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

		$criteria->compare('idSucursal',$this->idSucursal);
		$criteria->compare('nombreSucursal',$this->nombreSucursal,true);
		$criteria->compare('direccionSucursal',$this->direccionSucursal,true);
		$criteria->compare('telefonoSucursal',$this->telefonoSucursal,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	

}