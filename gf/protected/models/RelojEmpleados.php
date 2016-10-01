<?php

/**
 * This is the model class for table "Reloj_empleados".
 *
 * The followings are the available columns in table 'Reloj_empleados':
 * @property integer $idEmpleado
 * @property string $idLegajo
 * @property string $nombreEmpleado
 * @property string $idCuil
 * @property string $FechaNacimiento
 * @property string $domicilio
 * @property string $telefono
 * @property string $fechaIngreso
 * @property string $regl
 * @property string $notifEmergencia
 * @property string $suaf
 * @property string $afectacion
 * @property string $presentacion
 * @property string $obrasocial
 * @property string $altaFirmada
 * @property string $preocup
 * @property string $copiaDNI
 * @property string $cuil
 * @property integer $idsucursal
 * @property string $dni
 * @property integer $idCategoria
 */
class RelojEmpleados extends CActiveRecord
{
	public $fechaInicio;
	public $fechaFin;
	public $horasPactadas;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return RelojEmpleados the static model class
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
		return 'Reloj_empleados';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idsucursal, idCategoria', 'numerical', 'integerOnly'=>true),
			array('idLegajo, nombreEmpleado, idCuil, domicilio, telefono, regl, notifEmergencia, suaf, afectacion, presentacion, obrasocial, altaFirmada, preocup, copiaDNI, cuil, dni', 'length', 'max'=>255),
			array('FechaNacimiento, fechaIngreso', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idEmpleado, idLegajo, nombreEmpleado, idCuil, FechaNacimiento, domicilio, telefono, fechaIngreso,
				   regl, notifEmergencia, suaf, afectacion, presentacion, obrasocial, altaFirmada, preocup, copiaDNI,
				   cuil, idsucursal, dni, idCategoria, horasPactadas', 'safe', 'on'=>'search'),
			array('horasPactadas', 'numerical', 'integerOnly'=>true),
			array ('nombreEmpleado, FechaNacimiento, domicilio, fechaIngreso, idLegajo, cuil, dni, idsucursal, idCategoria, idCuil, domicilio', 'required'),
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
			'idEmpleado' => 'Empleado',
			'idLegajo' => 'Legajo',
			'nombreEmpleado' => 'Nombre Empleado',
			'idCuil' => 'Cuil',
			'FechaNacimiento' => 'Fecha Nacimiento',
			'domicilio' => 'Domicilio',
			'telefono' => 'Telefono',
			'fechaIngreso' => 'Fecha Ingreso',
			'regl' => 'Regl',
			'notifEmergencia' => 'Notificacion emergencia',
			'suaf' => 'Suaf',
			'afectacion' => 'Afectacion',
			'presentacion' => 'Presentacion',
			'obrasocial' => 'Obra social',
			'altaFirmada' => 'Alta Firmada',
			'preocup' => 'Preocup',
			'copiaDNI' => 'Copia DNI',
			'cuil' => 'Cuil',
			'idsucursal' => 'Sucursal',
			'dni' => 'DNI',
			'idCategoria' => 'Categoria',
			'horasPactadas' => 'Horas pactadas',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search($retArray=false)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idEmpleado',$this->idEmpleado);
		$criteria->compare('idLegajo',$this->idLegajo,true);
		$criteria->compare('nombreEmpleado',$this->nombreEmpleado,true);
		$criteria->compare('idCuil',$this->idCuil,true);
		$criteria->compare('FechaNacimiento',$this->FechaNacimiento,true);
		$criteria->compare('domicilio',$this->domicilio,true);
		$criteria->compare('telefono',$this->telefono,true);
		$criteria->compare('fechaIngreso',$this->fechaIngreso,true);
		$criteria->compare('regl',$this->regl,true);
		$criteria->compare('notifEmergencia',$this->notifEmergencia,true);
		$criteria->compare('suaf',$this->suaf,true);
		$criteria->compare('afectacion',$this->afectacion,true);
		$criteria->compare('presentacion',$this->presentacion,true);
		$criteria->compare('obrasocial',$this->obrasocial,true);
		$criteria->compare('altaFirmada',$this->altaFirmada,true);
		$criteria->compare('preocup',$this->preocup,true);
		$criteria->compare('copiaDNI',$this->copiaDNI,true);
		$criteria->compare('cuil',$this->cuil,true);
		$criteria->compare('idsucursal',$this->idsucursal);
		$criteria->compare('dni',$this->dni,true);
		$criteria->compare('idCategoria',$this->idCategoria);
                if($retArray)return self::model ()->findAll($criteria);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function consultarMarcos()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('nombreEmpleado','Marcos');
		return self::model()->findAll($criteria);
		
	}
	
public function buscarEmpleado($idsucursal)
	{
		// Esta funcion filtra a los empleados por sucursal

		$criteria=new CDbCriteria;
		if ($idsucursal != 0)
		$criteria->compare('idsucursal',$idsucursal,true);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
}