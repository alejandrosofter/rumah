<?php

/**
 * This is the model class for table "mantenimientosEmpresas".
 *
 * The followings are the available columns in table 'mantenimientosEmpresas':
 * @property integer $idMantenimientoEmpresa
 * @property integer $idClienteEmpresa
 * @property string $fechaInicioEmpresa
 * @property string $estadoMatenimiento
 * @property integer $cantidadVisitasMensuales
 * @property string $datosRelevantes
 * @property string $tipoMantenimiento
 */
class MantenimientosEmpresas extends CActiveRecord
{
	public $cliente;
	public $cantidadVisitasRealizadas;
        public $cantidadDiasFacturar;
        public $fechaFin;
        public $idRutinaEscucha;
        public $cantidadEscucha;
        public $idRutinaEscucha2;
        public $cantidadEscucha2;
        public $idRutinaEscucha3;
        public $cantidadEscucha3;
        public $diasProximaFacturacion;
        public $finContrato;
	/**
	 * Returns the static model of the specified AR class.
	 * @return MantenimientosEmpresas the static model class
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
		return 'mantenimientosEmpresas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idClienteEmpresa,cantidadDiasFacturar, fechaInicioEmpresa, estadoMatenimiento, fechaFin', 'required'),
			array('idClienteEmpresa,idRutinaEscucha,cantidadDiasFacturar,cantidadEscucha,idRutinaEscucha2,cantidadEscucha2,idRutinaEscucha3,cantidadEscucha3', 'numerical', 'integerOnly'=>true),
			array('estadoMatenimiento, tipoMantenimiento', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idMantenimientoEmpresa, idClienteEmpresa, fechaInicioEmpresa, estadoMatenimiento, cantidadVisitasMensuales, datosRelevantes, tipoMantenimiento', 'safe', 'on'=>'search'),
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
			'idMantenimientoEmpresa' => 'Id Mantenimiento',
			'idClienteEmpresa' => 'Cliente',
			'fechaInicioEmpresa' => 'Fecha Inicio',
			'estadoMatenimiento' => 'Estado',
			'cantidadVisitasMensuales' => 'Visitas Mensuales',
			'cantidadVisitasRealizadas' => 'Visitas Realizadas',
			'datosRelevantes' => 'Datos Relevantes',
			'tipoMantenimiento' => 'Tipo Mantenimiento',
			'cliente' => 'Cliente',
                    'idRutinaEscucha' => 'Rutina Escucha 1',
                    'idRutinaEscucha2' => 'Rutina Escucha 2',
                    'idRutinaEscucha3' => 'Rutina Escucha 3',
                    
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.

	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function getTipos()
	{
    	return array('Mensual' => 'Mensual', 'Ocasional' => 'Ocasional');
	}
	public function getEstados()
	{
    	return array('Activo' => 'Activo', 'Baja' => 'Baja');
	}
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idMantenimientoEmpresa',$this->idMantenimientoEmpresa);
		$criteria->compare('idClienteEmpresa',$this->idClienteEmpresa);
		$criteria->compare('fechaInicioEmpresa',$this->fechaInicioEmpresa,true);
		$criteria->compare('estadoMatenimiento',$this->estadoMatenimiento,true);
		$criteria->compare('cantidadVisitasMensuales',$this->cantidadVisitasMensuales);
		$criteria->compare('datosRelevantes',$this->datosRelevantes,true);
		$criteria->compare('tipoMantenimiento',$this->tipoMantenimiento,true);
		
		$mesActual=Date('m');
		$anoActual=Date('Y');
		
		$criteria->select = "t.*,datediff(now(),t.fechaFin) as finContrato,DATEDIFF(now(),t.fechaFin) as diasProximaFacturacion, CONCAT(clientes.apellido,' ',clientes.nombre,' ',clientes.razonSocial) as cliente," .
				"(SELECT sum(IF(tareas.visitaRutina=1 AND tareas.estadoTarea='Finalizada',1,0)) FROM tareas WHERE idClienteTarea=t.idClienteEmpresa and fechaTarea>'$anoActual-$mesActual-01' AND fechaTarea<'$anoActual-$mesActual-31') as cantidadVisitasRealizadas";
		$criteria->join = "LEFT JOIN clientes on clientes.idCliente  = t.idClienteEmpresa";
		$criteria->order='cliente asc';

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,'pagination'=>array(
        'pageSize'=>100,
    ),
		));
	}
}