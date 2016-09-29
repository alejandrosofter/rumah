<?php

/**
 * This is the model class for table "puntoVenta".
 *
 * The followings are the available columns in table 'puntoVenta':
 * @property integer $idPuntoVenta
 * @property string $nombrePuntaVenta
 * @property integer $descripcionPuntoVenta
 * @property string $electronica
 */
class PuntoVenta extends CActiveRecord
{
	public $tipoTalonario;
	public $idTalonario; 
	/**
	 * Returns the static model of the specified AR class.
	 * @return PuntoVenta the static model class
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
		return 'puntoVenta';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombrePuntoVenta', 'required'),
			array('nombrePuntoVenta, descripcionPuntoVenta,electronica', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idPuntoVenta, nombrePuntoVenta, descripcionPuntoVenta, electronica', 'safe', 'on'=>'search'),
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
			'idPuntoVenta' => 'Id Punto Venta',
			'nombrePuntoVenta' => 'Nombre Punto Venta',
			'descripcionPuntoVenta' => 'Descripcion Punto Venta',
			'electronica' => 'Electronica',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function getPuntoVenta()
	{
		return array('Unidad' => 'Unidad', 'Metro' => 'Metro', 'Litro' => 'Litro', 'Kilo' => 'Kilo');
	}
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idPuntoVenta',$this->idPuntoVenta,true);
		$criteria->compare('nombrePuntoVenta',$this->nombrePuntoVenta,true);
		$criteria->compare('descripcionPuntoVenta',$this->descripcionPuntoVenta,true);
		$criteria->compare('electronica',$this->electronica,true);
		$criteria->order =' t.idPuntoVenta desc ';
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}