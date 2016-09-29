<?php

/**
 * This is the model class for table "proveedores".
 *
 * The followings are the available columns in table 'proveedores':
 * @property integer $idProveedor
 * @property string $nombre
 * @property string $rubro
 * @property string $email
 * @property string $direccion
 * @property string $telefono
 * @property string $celular
 * @property string $cuit
 * @property integer $idCuenta
 */
class Proveedores extends CActiveRecord
{
	public $localidad;
	public $nro;
	public $codigoProveedor;
	public $idJuridiccion;
	public $nombreJuridiccion;
	public $letraHabitual;
	public $condicionIva;
	public $idClasificacionAfip;
        public $nombreFantasia;
	
	
	/**
	 * Returns the static model of the specified AR class.
	 * @return Proveedores the static model class
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
		return 'proveedores';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre,telefono,cuit,condicionIva', 'required'),
			array('nro', 'numerical', 'integerOnly'=>true),
			array('nombre,nombreFantasia, email, direccion, telefono, celular, cuit,idClasificacionAfip,condicionIva
			localidad, codigoProveedor, idJuridiccion, letraHabitual ', 'length', 'max'=>180),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idProveedor, nombre, email, direccion, telefono, celular, cuit', 'safe', 'on'=>'search'),
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
		 'juridicciones'=>array(self::HAS_MANY, 'Juridiccion', 'idJuridiccion'),
		 'idClasificacionAfip'=>array(self::HAS_MANY, 'ClasificacionAfip', 'idClasificacionAfip'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idProveedor' => 'Id Proveedor',
			'nombre' => 'Razon Social',
                    'nombreFantasia' => 'Nombre Fantasia',
			'email' => 'Email',
			'direccion' => 'Direccion',
			'telefono' => 'Telefono',
			'celular' => 'Celular',
			'cuit' => 'Cuit',
			'condicionIva' => 'Condicion IVA',
			'idClasificacionAfip'=>'idClasificacion AFIP',
			
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
public function consultarRubros()
	{
		$modeloRubros=new ProveedoresRubros();
		return $modeloRubros->search();
	}
	public function consultarEtiquetas($nombre)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		$this->nombre=ltrim(rtrim($nombre));
		
		$criteria->compare('idProveedor',$this->nombre,true,'OR');
                $criteria->compare('nombreFantasia',$this->nombreFantasia,true,'OR');
		//$criteria->compare('codigoProveedor',$this->nombre,true,'OR');
		$criteria->compare('nombre',$this->nombre,true,'OR');
		$criteria->compare('cuit',$this->nombre,true,'OR');
		$criteria->order='nombre asc';

		return self::model()->findAll($criteria);
	}
	public function consultarProveedores()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idProveedor',$this->idProveedor);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('email',$this->email,true);
                $criteria->compare('nombreFantasia',$this->nombreFantasia,true);
		$criteria->compare('direccion',$this->direccion,true);
		$criteria->compare('telefono',$this->telefono,true);
		$criteria->compare('celular',$this->celular,true);
		$criteria->compare('cuit',$this->cuit,true);
		
		$criteria->order = "nombre asc";

		return self::model()->findAll($criteria);
	
	}
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idProveedor',$this->idProveedor);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('direccion',$this->direccion,true);
                $criteria->compare('nombreFantasia',$this->nombreFantasia,true);
		$criteria->compare('telefono',$this->telefono,true);
		$criteria->compare('celular',$this->celular,true);
		$criteria->compare('cuit',$this->cuit,true);
		
		$criteria->order = "idProveedor desc";

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}