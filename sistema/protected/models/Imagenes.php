<?php

/**
 * This is the model class for table "imagenes".
 *
 * The followings are the available columns in table 'imagenes':
 * @property integer $idImagen
 * @property string $fecha
 * @property string $tipo
 * @property integer $idTipo
 * @property string $nombreImagen
 * @property string $ext
 * @property string $path
 */
class Imagenes extends CActiveRecord
{
    public $archivo;
	/**
	 * Returns the static model of the specified AR class.
	 * @return Imagenes the static model class
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
		return 'imagenes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
        public function getCantidadArchivos($idTipo,$tipo)
        {
            $criteria=new CDbCriteria;

		$criteria->compare('tipo',$tipo,true);
		$criteria->compare('idTipo',$idTipo);
                
                return count(self::model()->findAll($criteria));
        }
        public function getArchivos($idTipo,$tipo)
        {
            $criteria=new CDbCriteria;

		$criteria->compare('tipo',$tipo,true);
		$criteria->compare('idTipo',$idTipo);
                
                return (self::model()->findAll($criteria));
        }
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idTipo', 'numerical', 'integerOnly'=>true),
			array('tipo, nombreImagen, ext, path', 'length', 'max'=>255),
			array('fecha', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idImagen, fecha, tipo, idTipo, nombreImagen, ext, path', 'safe', 'on'=>'search'),
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
			'idImagen' => 'Id Imagen',
			'fecha' => 'Fecha',
			'tipo' => 'Tipo',
			'idTipo' => 'Id Tipo',
			'nombreImagen' => 'Nombre Imagen',
			'ext' => 'Ext',
			'path' => 'Path',
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

		$criteria->compare('idImagen',$this->idImagen);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('tipo',$this->tipo,true);
		$criteria->compare('idTipo',$this->idTipo);
		$criteria->compare('nombreImagen',$this->nombreImagen,true);
		$criteria->compare('ext',$this->ext,true);
		$criteria->compare('path',$this->path,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}