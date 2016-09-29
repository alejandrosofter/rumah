<?php

/**
 * This is the model class for table "ordenesTrabajo_view".
 *
 * The followings are the available columns in table 'ordenesTrabajo_view':
 * @property integer $idOrdenTrabajo
 * @property integer $idCliente
 * @property string $descripcionCliente
 * @property string $descripcionEncargado
 * @property integer $idUsuarioEncargado
 * @property string $estadoOrden
 * @property string $fechaIngreso
 * @property string $prioridad
 * @property string $tipoOrden
 * @property string $fechaFinaliza
 * @property string $observaciones
 * @property integer $idUsuarioComision
 * @property string $apellido
 * @property string $nombreReparador
 * @property integer $cantidadDiasFinaliza
 * @property string $cliente
 * @property string $nombre
 * @property string $tipoCliente
 * @property string $tareasRealizadas
 */
class OrdenesTrabajoVista extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return OrdenesTrabajoVista the static model class
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
		return 'ordenesTrabajo_view';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idCliente, descripcionCliente, descripcionEncargado, idUsuarioEncargado, estadoOrden, fechaIngreso, prioridad, tipoOrden, fechaFinaliza, observaciones, idUsuarioComision, tipoCliente', 'required'),
			array('idOrdenTrabajo, idCliente, idUsuarioEncargado, idUsuarioComision, cantidadDiasFinaliza', 'numerical', 'integerOnly'=>true),
			array('estadoOrden, prioridad, tipoOrden', 'length', 'max'=>20),
			array('apellido, nombreReparador, nombre, tipoCliente', 'length', 'max'=>30),
			array('cliente', 'length', 'max'=>255),
			array('tareasRealizadas', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idOrdenTrabajo, idCliente, descripcionCliente, descripcionEncargado, idUsuarioEncargado, estadoOrden, fechaIngreso, prioridad, tipoOrden, fechaFinaliza, observaciones, idUsuarioComision, apellido, nombreReparador, cantidadDiasFinaliza, cliente, nombre, tipoCliente, tareasRealizadas', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idOrdenTrabajo' => 'Id Orden Trabajo',
			'idCliente' => 'Id Cliente',
			'descripcionCliente' => 'Descripcion Cliente',
			'descripcionEncargado' => 'Descripcion Encargado',
			'idUsuarioEncargado' => 'Id Usuario Encargado',
			'estadoOrden' => 'Estado Orden',
			'fechaIngreso' => 'Fecha Ingreso',
			'prioridad' => 'Prioridad',
			'tipoOrden' => 'Tipo Orden',
			'fechaFinaliza' => 'Fecha Finaliza',
			'observaciones' => 'Observaciones',
			'idUsuarioComision' => 'Id Usuario Comision',
			'apellido' => 'Apellido',
			'nombreReparador' => 'Nombre Reparador',
			'cantidadDiasFinaliza' => 'Cantidad Dias Finaliza',
			'cliente' => 'Cliente',
			'nombre' => 'Nombre',
			'tipoCliente' => 'Tipo Cliente',
			'tareasRealizadas' => 'Tareas Realizadas',
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

		$criteria->compare('idOrdenTrabajo',$this->idOrdenTrabajo);
		$criteria->compare('idCliente',$this->idCliente);
		$criteria->compare('descripcionCliente',$this->descripcionCliente,true);
		$criteria->compare('descripcionEncargado',$this->descripcionEncargado,true);
		$criteria->compare('idUsuarioEncargado',$this->idUsuarioEncargado);
		$criteria->compare('estadoOrden',$this->estadoOrden,true);
		$criteria->compare('fechaIngreso',$this->fechaIngreso,true);
		$criteria->compare('prioridad',$this->prioridad,true);
		$criteria->compare('tipoOrden',$this->tipoOrden,true);
		$criteria->compare('fechaFinaliza',$this->fechaFinaliza,true);
		$criteria->compare('observaciones',$this->observaciones,true);
		$criteria->compare('idUsuarioComision',$this->idUsuarioComision);
		$criteria->compare('apellido',$this->apellido,true);
		$criteria->compare('nombreReparador',$this->nombreReparador,true);
		$criteria->compare('cantidadDiasFinaliza',$this->cantidadDiasFinaliza);
		$criteria->compare('cliente',$this->cliente,true);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('tipoCliente',$this->tipoCliente,true);
		$criteria->compare('tareasRealizadas',$this->tareasRealizadas,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}