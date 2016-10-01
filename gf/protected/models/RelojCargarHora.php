<?php

/**
 * This is the model class for table "Reloj_cargarHora".
 *
 * The followings are the available columns in table 'Reloj_cargarHora':
 * @property integer $id
 * @property string $fecha
 * @property string $archivo
 * @property integer $idUsuario
 * @property integer $idSucursal
 * @property string $nombreArchivo
 */
class RelojCargarHora extends CActiveRecord
{
	public $fechaInicio;
	public $fechaFin;
	public $nombreSucursal;
	public $fechaDesde;
	public $fechaHasta;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return RelojCargarHora the static model class
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
		return 'Reloj_cargarHora';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idUsuario, idSucursal', 'numerical', 'integerOnly'=>true),
			array('nombreArchivo, fechaDesde, fechaHasta', 'length', 'max'=>255),
			array('fecha, archivo', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, fecha, archivo,idUsuario, idSucursal, nombreArchivo,', 'safe', 'on'=>'search'),
			array('archivo', 'file', 'types'=>'dat'),
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
			'id' => 'ID',
			'fecha' => 'Fecha subida',
			'archivo' => 'Archivo',
			'idUsuario' => 'Usuario',
			'idSucursal' => 'Sucursal',
			'nombreArchivo' => 'Nombre Archivo',
			'fechaDesde' => 'Fecha desde',
			'fechaHasta' => 'Fecha hasta',
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

		$criteria->order='id desc'; //ordenar por ID de forma decendiente, para acendiente seria asc
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('archivo',$this->archivo,true);
		$criteria->compare('idUsuario',$this->idUsuario);
		$criteria->compare('idSucursal',$this->idSucursal);
		$criteria->compare('nombreArchivo',$this->nombreArchivo,true);
		$criteria->join='left join reloj_Sucursales on reloj_Sucursales.idSucursal=t.idSucursal';
		$criteria->select='t.*,reloj_Sucursales.nombreSucursal';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}