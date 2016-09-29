<?php

/**
 * This is the model class for table "tareas_destinatarios".
 *
 * The followings are the available columns in table 'tareas_destinatarios':
 * @property integer $idTareaDestinantario
 * @property integer $idTarea
 * @property integer $idUsuario
 * @property integer $notificarArea
 */
class TareasDestinatarios extends CActiveRecord
{
	public $nombreUsuario;
	public $descripcionTarea;
	public $tareaCliente;
        public $idUsuarioEmisor;
	
	/**
	 * Returns the static model of the specified AR class.
	 * @return TareasDestinatarios the static model class
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
		return 'tareas_destinatarios';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idTarea, idUsuario,', 'required'),
			array('idUsuarioEmisor,idTarea, idUsuario, notificarArea', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idTareaDestinantario, idTarea, idUsuario, notificarArea', 'safe', 'on'=>'search'),
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
	public  function afterSave()
	{
		parent::afterSave();
      	$tarea=Tareas::model()->findByPk($this->idTarea);
      	$cliente=Clientes::model()->findByPk($tarea->idClienteTarea);
      	$nombreCliente=$cliente->apellido.' '.$cliente->nombre.' '.$cliente->razonSocial;
      	if($tarea->estadoTarea!='Finalizada')
            if(Settings::model()->getValorSistema('TAREAS_ALERTAS_ACTIVAS')=='Activa')
            {
      		$modelAlerta= new Alertas;
      		$modelAlerta->titulo=$nombreCliente.': '.$tarea->descripcionTarea;
      		$modelAlerta->descripcion=' Tarea Auto generada, para quitar la alerta debe poner la tarea como finalizada';
      		$modelAlerta->nivelAlerta=($tarea->prioridadTarea=='Normal')?'Media':'Alta';
      		$modelAlerta->tipoAlerta='Sistema';
      		$modelAlerta->estadoAlerta='Activa';
      		$modelAlerta->linkSolucion='Activa';
      		$modelAlerta->area='tareas';
      		$modelAlerta->controlador='tareas';
      		$modelAlerta->fechaVencimiento='0000-00-00';
      		$modelAlerta->idElemento=$tarea->idTarea;
      		$modelAlerta->save();
      		
      			
      	
      	$modelAlertaUsuario= new AlertasUsuario;
      			$modelAlertaUsuario->idAlerta=$modelAlerta->idAlerta;
      			$modelAlertaUsuario->idUsuario=$this->idUsuario;
      			$modelAlertaUsuario->save();
      	}
        if(Settings::model()->getValorSistema('GENERALES_MAIL_ACTIVOTAREAS')=='Activa'){
      			$usuario=Usuarios::model()->findByPk($this->idUsuario);
      			$parametros['titulo']='Nueva Tarea '.$nombreCliente;
      			$parametros['mensaje']=$tarea->descripcionTarea;
      			$parametros['fecha']=$tarea->fechaTarea;
      			$parametros['estado']=$tarea->estadoTarea;
      			if($usuario->email!='')
      				Mensajes::model()->enviarMail($usuario->email,Settings::model()->getValorSistema('GENERALES_MAIL_IMPRESION_TAREA',$parametros,'impresiones'),'Nueva Tarea '.$nombreCliente,Settings::model()->getValorSistema('GENERALES_MAIL_REMITENTE_TAREAS'));
      		}
      	
      	
      	return parent::afterSave();
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idTareaDestinantario' => 'Id Tarea Destinantario',
			'idTarea' => 'Tarea',
			'idUsuario' => 'Usuario',
			'notificarArea' => 'Notificar Area',
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

		$criteria->compare('idTareaDestinantario',$this->idTareaDestinantario);
		$criteria->compare('idTarea',$this->idTarea);
		$criteria->compare('idUsuario',$this->idUsuario);
		$criteria->compare('notificarArea',$this->notificarArea);
		
		$criteria->select = "t.*, usuarios.nombre as nombreUsuario";
		$criteria->join = "LEFT JOIN tareas_destinatarios on tareas_destinatarios.idTarea = t.idTarea ".
							"LEFT JOIN usuarios on tareas_destinatarios.idUsuario = usuarios.idUsuario";
		$criteria->group=' t.idTarea';

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
        public function consultarUsuariosTarea2($idTarea)
	{
		$connection=Yii::app()->getDb();
                $sql="SELECT t.*  FROM `tareas_destinatarios` t WHERE t.idTarea='$idTarea'";
                $command=$connection->createCommand($sql);
                return $command->queryAll();
	}
	public function consultarUsuariosTarea($idTarea)
	{
		$criteria=new CDbCriteria;

		$criteria->compare('t.idTarea',$idTarea);
		$criteria->select = "t.*, usuarios.nombre as nombreUsuario";
		$criteria->join = "LEFT JOIN tareas_destinatarios on tareas_destinatarios.idTarea = t.idTarea ".
							"LEFT JOIN usuarios on tareas_destinatarios.idUsuario = usuarios.idUsuario";
		$criteria->group=' usuarios.idUsuario';

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	public function consultarUsuariosTareaArray($idTarea)
	{
		$criteria=new CDbCriteria;

		$criteria->compare('t.idTarea',$idTarea);
		$criteria->select = "t.*, usuarios.nombre as nombreUsuario, tareas.descripcionTarea as descripcionTarea,  
		if(clientes.tipoCliente='Empresa',clientes.razonSocial,CONCAT(clientes.apellido,', ',clientes.nombre)) as tareaCliente ";
		$criteria->join = "LEFT JOIN tareas_destinatarios on tareas_destinatarios.idTarea = t.idTarea ".
							"LEFT JOIN usuarios on tareas_destinatarios.idUsuario = usuarios.idUsuario ".
							"LEFT JOIN tareas on tareas.idTarea = t.idTarea ".
							"LEFT JOIN clientes on clientes.idCliente = tareas.idClienteTarea "
		;
$criteria->group='t.idUsuario';
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	
}