<?php

/**
 * This is the model class for table "acciones".
 *
 * The followings are the available columns in table 'acciones':
 * @property integer $idAccion
 * @property string $nombre
 * @property string $direccion
 * @property string $tipo
 * @property string $descripcion
 * @property string $imagen
 */
class Acciones extends CActiveRecord
{
	public $subTipo;
	/**
	 * Returns the static model of the specified AR class.
	 * @return Acciones the static model class
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
		return 'acciones';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, direccion', 'required'),
			array('nombre', 'length', 'max'=>100),
			array('direccion', 'length', 'max'=>200),
			array('tipo,subTipo, imagen', 'length', 'max'=>255),
			array('descripcion', 'safe'),
			array('padre', 'numerical'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idAccion, nombre, direccion, tipo, descripcion, imagen', 'safe', 'on'=>'search'),
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
			'idAccion' => 'Id Accion',
			'nombre' => 'Nombre',
			'direccion' => 'Direccion',
			'tipo' => 'Tipo',
			'descripcion' => 'Descripcion',
			'imagen' => 'Imagen',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function consultarHijos($idAccionPadre)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('padre',$idAccionPadre,true);
		$criteria->order="nombre asc";

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,'pagination'=>array(
        'pageSize'=>100,
    ),
		));
	}
	public function consultar()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('nombre',$this->nombre,true,'OR');
		$criteria->compare('tipo',$this->tipo,true,'OR');
		$criteria->order="nombre asc";
		

		return self::model()->findAll($criteria);
	}
	public function consultarAcciones()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		
		$criteria->compare('subTipo',$this->subTipo,true);
		$criteria->compare('tipo',$this->tipo,true);
		$criteria->order="nombre asc";
		$criteria->condition=("padre is null AND subTipo='".$this->subTipo."' AND tipo = '".$this->tipo."'");
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,'pagination'=>array(
        'pageSize'=>100,
    ),
		));
	}
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('subTipo',$this->subTipo,true);
		$criteria->compare('tipo',$this->tipo,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->order="nombre asc";

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,'pagination'=>array(
        'pageSize'=>100,
    ),
		));
	}
}