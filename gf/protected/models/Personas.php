<?php

/**
 * This is the model class for table "clientes".
 *
 * The followings are the available columns in table 'clientes':
 * @property integer $idCliente
 * @property string $tipoCliente
 * @property string $nombre
 * @property string $apellido
 * @property string $direccion
 * @property string $telefono
 * @property string $celular
 * @property string $nombreFantasia
 * @property string $email
 * @property string $cuit
 * @property string $condicionIva
 * @property string $razonSocial
 */
class Personas extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Personas the static model class
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
		return 'clientes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tipoCliente, direccion, email, condicionIva', 'required'),
			array('tipoCliente, nombre, apellido, telefono, celular, cuit', 'length', 'max'=>30),
			array('direccion', 'length', 'max'=>70),
			array('nombreFantasia, email, condicionIva', 'length', 'max'=>100),
			array('razonSocial', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idCliente, tipoCliente, nombre, apellido, direccion, telefono, celular, nombreFantasia, email, cuit, condicionIva, razonSocial', 'safe', 'on'=>'search'),
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

	public function getCondicionesIva()
	{
    	return array('Inscripto' => 'Inscripto', 'Final' => 'Final', 'No Inscripto' => 'No Inscripto', 'Exento' => 'Exento');
	}
	public function attributeLabels()
	{
		return array(
			'idCliente' => 'Id Cliente',
			'tipoCliente' => 'Tipo Cliente',
			'nombre' => 'Nombre',
			'apellido' => 'Apellido',
			'direccion' => 'Direccion',
			'telefono' => 'Telefono',
			'celular' => 'Celular',
			'nombreFantasia' => 'Nombre Fantasia',
			'email' => 'Email',
			'cuit' => 'Cuit',
			'condicionIva' => 'Condicion Iva',
			'razonSocial' => 'Razon Social',
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

		$criteria->compare('idCliente',$this->idCliente);
		$criteria->compare('tipoCliente','Persona',true);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('apellido',$this->apellido,true);
		$criteria->compare('direccion',$this->direccion,true);
		$criteria->compare('telefono',$this->telefono,true);
		$criteria->compare('celular',$this->celular,true);
		$criteria->compare('nombreFantasia',$this->nombreFantasia,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('cuit',$this->cuit,true);
		$criteria->compare('condicionIva',$this->condicionIva,true);
		$criteria->compare('razonSocial',$this->razonSocial,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}