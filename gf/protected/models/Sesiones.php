<?php

/**
 * This is the model class for table "sesiones".
 *
 * The followings are the available columns in table 'sesiones':
 * @property integer $idSesion
 * @property integer $idUsuario
 * @property integer $fechaIngresa
 * @property integer $fechaEgresa
 */
class Sesiones extends CActiveRecord
{
	public $nombreUsuario;
	/**
	 * Returns the static model of the specified AR class.
	 * @return Sesiones the static model class
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
		return 'sesiones';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('idUsuario, fechaIngresa, fechaEgresa', 'required'),
			array('idUsuario, fechaIngresa, fechaEgresa', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idSesion, idUsuario, fechaIngresa, fechaEgresa', 'safe', 'on'=>'search'),
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
			'idSesion' => 'Id Sesion',
			'idUsuario' => 'Id Usuario',
			'fechaIngresa' => 'Ingreso',
			'fechaEgresa' => 'Estado',
			'nombreUsuario' => 'Usuario',
		);
	}
	public function consultarUsuariosActivos()
	{
		$criteria=new CDbCriteria;

		//$criteria->compare('t.idUsuario',Yii::app()->user->idUsuario);
		$criteria->select="t.idSesion,SUBSTRING_INDEX( GROUP_CONCAT(CAST(t.fechaEgresa AS CHAR) ORDER BY t.idSesion desc), ',', 1 ) as fechaEgresa,SUBSTRING_INDEX( GROUP_CONCAT(CAST(t.fechaIngresa AS CHAR) ORDER BY t.idSesion desc), ',', 1 ) as fechaIngresa,usuarios.nombre as nombreUsuario";
		$criteria->join="INNER JOIN usuarios on usuarios.idUsuario = t.idUsuario ";
		$criteria->group="t.idUsuario";
		$criteria->order="t.idSesion desc";
		
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
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

		$criteria->compare('idSesion',$this->idSesion);
		$criteria->compare('idUsuario',$this->idUsuario);
		$criteria->compare('fechaIngresa',$this->fechaIngresa);
		$criteria->compare('fechaEgresa',$this->fechaEgresa);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}