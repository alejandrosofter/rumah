<?php

/**
 * This is the model class for table "clasificacionAfip".
 *
 * The followings are the available columns in table 'clasificacionAfip':
 * @property integer $idClasificacionAfip
 * @property string $nombreClasificacionAfip
 * @property string $codigoClasificacion
 * @property string $detalle
 */
class ClasificacionAfip extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ClasificacionAfip the static model class
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
		return 'clasificacionAfip';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombreClasificacionAfip, codigoClasificacion, detalle', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idClasificacionAfip, nombreClasificacionAfip, codigoClasificacion, detalle', 'safe', 'on'=>'search'),
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
			'idClasificacionAfip' => 'Id Clasificacion Afip',
			'nombreClasificacionAfip' => 'Nombre Clasificacion',
			'codigoClasificacion' => 'Codigo',
			'detalle' => 'Detalle',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function consultasClasif()
	{
				$connection=Yii::app()->getDb();
        $command=$connection->createCommand(
"SELECT t.*, CONCAT(t.codigoClasificacion,' - ',t.nombreClasificacionAfip) as afipClasificacion

FROM clasificacionAfip t



");
            
            return $command->queryAll();
	}
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idClasificacionAfip',$this->idClasificacionAfip);
		$criteria->compare('nombreClasificacionAfip',$this->nombreClasificacionAfip,true);
		$criteria->compare('codigoClasificacion',$this->codigoClasificacion,true);
		$criteria->compare('detalle',$this->detalle,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	
}