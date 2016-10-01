<?php

/**
 * This is the model class for table "proveedores_rubros".
 *
 * The followings are the available columns in table 'proveedores_rubros':
 * @property integer $idProveedor_rubro
 * @property string $nombre
 * @property integer $idCuenta
 */
class ProveedoresRubros extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ProveedoresRubros the static model class
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
		return 'proveedores_rubros';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre', 'required'),
			array('idCuenta', 'numerical', 'integerOnly'=>true),
			array('nombre', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idProveedor_rubro, nombre, idCuenta', 'safe', 'on'=>'search'),
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
			'idProveedor_rubro' => 'Id Proveedor Rubro',
			'nombre' => 'Nombre',
			'idCuenta' => 'Id Cuenta',
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

		$criteria->compare('idProveedor_rubro',$this->idProveedor_rubro);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('idCuenta',$this->idCuenta);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}