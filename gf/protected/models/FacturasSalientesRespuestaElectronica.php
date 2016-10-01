<?php

/**
 * This is the model class for table "facturasSalientes_respuestaElectronica".
 *
 * The followings are the available columns in table 'facturasSalientes_respuestaElectronica':
 * @property integer $idFacturaRespuesta
 * @property integer $idFacturaSaliente
 * @property string $estado
 * @property string $cae
 * @property string $fechaVence
 * @property string $eventos
 * @property string $errores
 */
class FacturasSalientesRespuestaElectronica extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return FacturasSalientesRespuestaElectronica the static model class
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
		return 'facturasSalientes_respuestaElectronica';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idFacturaSaliente', 'numerical', 'integerOnly'=>true),
			array('estado, cae, fechaVence, eventos, errores', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idFacturaRespuesta, idFacturaSaliente, estado, cae, fechaVence, eventos, errores', 'safe', 'on'=>'search'),
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
			'idFacturaRespuesta' => 'Id Factura Respuesta',
			'idFacturaSaliente' => 'Id Factura Saliente',
			'estado' => 'Estado',
			'cae' => 'Cae',
			'fechaVence' => 'Fecha Vence',
			'eventos' => 'Eventos',
			'errores' => 'Errores',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function consultar($id)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idFacturaSaliente',$id);
		$criteria->compare('estado','OK',true);
		
                return self::model()->findAll($criteria);
	}
        public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idFacturaRespuesta',$this->idFacturaRespuesta);
		$criteria->compare('idFacturaSaliente',$this->idFacturaSaliente);
		$criteria->compare('estado',$this->estado,true);
		$criteria->compare('cae',$this->cae,true);
		$criteria->compare('fechaVence',$this->fechaVence,true);
		$criteria->compare('eventos',$this->eventos,true);
		$criteria->compare('errores',$this->errores,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}