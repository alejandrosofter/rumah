<?php

/**
 * This is the model class for table "rutinas_impresiones".
 *
 * The followings are the available columns in table 'rutinas_impresiones':
 * @property integer $idRutinaImpresion
 * @property integer $idRutina
 * @property string $detalleImpresion
 * @property integer $cantidadDefecto
 */
class RutinasImpresiones extends CActiveRecord
{
    public $nombreImpresion;
    public $impresora;
	/**
	 * Returns the static model of the specified AR class.
	 * @return RutinasImpresiones the static model class
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
		return 'rutinas_impresiones';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idRutina, cantidadDefecto', 'numerical', 'integerOnly'=>true),
			array('detalleImpresion,nombreImpresion,impresora', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idRutinaImpresion, idRutina, detalleImpresion, cantidadDefecto', 'safe', 'on'=>'search'),
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
			'idRutinaImpresion' => 'Id Rutina Impresion',
			'idRutina' => 'Id Rutina',
			'detalleImpresion' => 'Detalle Impresion',
			'cantidadDefecto' => 'Cantidad de Copias (Defecto)',
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

		$criteria->compare('idRutinaImpresion',$this->idRutinaImpresion);
		$criteria->compare('idRutina',$this->idRutina);
		$criteria->compare('detalleImpresion',$this->detalleImpresion,true);
		$criteria->compare('cantidadDefecto',$this->cantidadDefecto);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
        public function consultarDeRutina($id)
	{
		$criteria=new CDbCriteria;
		$criteria->compare('idRutina',$id);

		return self::model()->findAll($criteria);
	}
}