<?php

/**
 * This is the model class for table "tareas_estados".
 *
 * The followings are the available columns in table 'tareas_estados':
 * @property integer $idTareaEstado
 * @property integer $idTarea
 * @property string $fechaEstadoTarea
 * @property string $detalleEstadoTarea
 * @property string $nombreEstado
 */
class TareasEstados extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return TareasEstados the static model class
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
		return 'tareas_estados';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idTarea, fechaEstadoTarea, detalleEstadoTarea, nombreEstado', 'required'),
			array('idTarea', 'numerical', 'integerOnly'=>true),
			array('nombreEstado', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idTareaEstado, idTarea, fechaEstadoTarea, detalleEstadoTarea, nombreEstado', 'safe', 'on'=>'search'),
		);
	}

	public  function afterSave()
	{
		parent::afterSave();
		$modeloAlerta=new Alertas;
		
      	$alertas=Alertas::model()->buscarElemento($this->idTarea);
      	if($this->nombreEstado=='Finalizada'){
      		Tareas::model()->finalizarTarea($this->idTarea);
      		if($alertas!=false){
      			Alertas::model()->bajarAlertasUsuarioTarea($alertas);
      			//tengo que bajarla de todos los usuarios!
      		}
      	}else{
      		if($alertas!=false){
      			Alertas::model()->cambiarEstadoUsuarioTarea($alertas,$this->nombreEstado);
      			
      		}
      	}
      		
      	
      	return parent::afterSave();
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
	public function getEstados()
	{
    	return array('En Proceso' => 'En Proceso', 'Finalizada' => 'Finalizada', 'Stand-By' => 'Stand-By');
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idTareaEstado' => 'Id Tarea Estado',
			'idTarea' => 'Id Tarea',
			'fechaEstadoTarea' => 'Fecha Estado Tarea',
			'detalleEstadoTarea' => 'Detalle Estado Tarea',
			'nombreEstado' => 'Nombre Estado',
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

		$criteria->compare('idTareaEstado',$this->idTareaEstado);
		$criteria->compare('idTarea',$this->idTarea);
		$criteria->compare('fechaEstadoTarea',$this->fechaEstadoTarea,true);
		$criteria->compare('detalleEstadoTarea',$this->detalleEstadoTarea,true);
		$criteria->compare('nombreEstado',$this->nombreEstado,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	public function consultarEstadosTarea($idTarea)
	{
		$criteria=new CDbCriteria;

		$criteria->compare('idTarea',$idTarea);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}