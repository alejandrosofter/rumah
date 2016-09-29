<?php

/**
 * This is the model class for table "ordenesTrabajo_estados".
 *
 * The followings are the available columns in table 'ordenesTrabajo_estados':
 * @property integer $idEstadoOrden
 * @property string $fechaEstado
 * @property integer $idUsuario
 * @property integer $idOrdenTrabajo
 * @property string $estado
 * @property string $detalleEstado
 */
class OrdenesTrabajoEstados extends CActiveRecord
{
    public $usuario;
    public $enviaMail;
	/**
	 * Returns the static model of the specified AR class.
	 * @return OrdenesTrabajoEstados the static model class
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
		return 'ordenesTrabajo_estados';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fechaEstado, idOrdenTrabajo, estado, detalleEstado', 'required'),
			array('idUsuario,enviaMail, idOrdenTrabajo', 'numerical', 'integerOnly'=>true),
			array('estado', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idEstadoOrden, fechaEstado, idUsuario, idOrdenTrabajo, estado, detalleEstado', 'safe', 'on'=>'search'),
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
			'idEstadoOrden' => 'Id Estado Orden',
			'fechaEstado' => 'Fecha Estado',
			'idUsuario' => 'Id Usuario',
			'idOrdenTrabajo' => 'Id Orden Trabajo',
			'estado' => 'Estado',
			'detalleEstado' => 'Detalle Estado',
		);
	}
	public function consultarEstadosOrden($idOrden)
	{
		$criteria=new CDbCriteria;

		$criteria->compare('idEstadoOrden',$this->idEstadoOrden);
		$criteria->compare('fechaEstado',$this->fechaEstado,true);
		$criteria->compare('idUsuario',$this->idUsuario);
		$criteria->compare('idOrdenTrabajo',$idOrden);
		$criteria->compare('estado',$this->estado,true);
		$criteria->compare('detalleEstado',$this->detalleEstado,true);
                $criteria->select="t.*, usuarios.nombre as usuario";
                $criteria->join="LEFT JOIN usuarios on usuarios.idUsuario = t.idUsuario";

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
        private function ingresarCambio($estado,$idOrden)
        {
            $ce=new OrdenesTrabajoCambioEstado;
            $ce->idOrdenTrabajo=$idOrden;
            $ce->estado=$estado;
            $ce->fecha=Date('Y-m-d');
            $ce->save();
        }
	public  function afterSave()
	{
		parent::afterSave();
		$modeloAlerta=new Alertas;
                $this->ingresarCambio($this->estado,$this->idOrdenTrabajo);
                if($this->estado=="Realizada") $this->envioMailAutomatico($this->idEstadoOrden);
                if($this->totalmenteRealizada($this->idOrdenTrabajo)){
                    //ACTUALIZO ORDEN
                    $orden=  OrdenesTrabajo::model()->findByPk($this->idOrdenTrabajo);
                    $orden->estadoOrden=$this->estado;
                    $orden->save();
                    //ACTUALIZO ORDEN
                    $alertas=Alertas::model()->buscarElemento($this->idOrdenTrabajo);
                    if($alertas!=false){
      			Alertas::model()->bajarAlertasUsuarioTarea($alertas);
                    $this->redirect(array('ordenesTrabajoStock/index&id='.$this->idOrdenTrabajo));
                }
      	}else if($this->estado!="Realizada"){
                //ACTUALIZO ORDEN
                $orden=  OrdenesTrabajo::model()->findByPk($this->idOrdenTrabajo);
                $orden->estadoOrden=$this->estado;
                $orden->save();
                //ACTUALIZO ORDEN
        }else{
            //ACTUALIZO ORDEN
                $orden=  OrdenesTrabajo::model()->findByPk($this->idOrdenTrabajo);
                $orden->estadoOrden='Trabajando';
                $orden->save();
                //ACTUALIZO ORDEN
        }
      		
      	
      	return parent::afterSave();
	}
        private function envioMailAutomatico($id)
        {
            $estado=self::model()->findByPk($id);
            $orden=  OrdenesTrabajo::model()->findByPk($estado->idOrdenTrabajo);
            $cliente=  Clientes::model()->findByPk($orden->idCliente);
            $parametros['mensaje']=$estado->detalleEstado;
            $parametros['fecha']=Date('d-m-Y');
            $mensaje=Settings::model()->getValorSistema("MAIL_BASE", $parametros, 'impresiones');
            Mensajes::model()->enviarMail($cliente->email, $mensaje, '', Settings::model()->getValorSistema("GENERALES_MAIL_REMITENTE_FINANZAS"));
        }
        public function totalmenteRealizada($idOrden)
        {
            if(count($this->consultarNoFinalizados($idOrden,true))>0) return false;
            return true;
        }
        public function consultarNoFinalizados($id,$arr=false)
	{
		$criteria=new CDbCriteria;

		$criteria->compare('idOrdenTrabajo',$id,true);
                $criteria->compare('estado','<>Realizada',true);
		if($arr)return self::model ()->findAll($criteria);
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idEstadoOrden',$this->idEstadoOrden);
		$criteria->compare('fechaEstado',$this->fechaEstado,true);
		$criteria->compare('idUsuario',$this->idUsuario);
		$criteria->compare('idOrdenTrabajo',$this->idOrdenTrabajo);
		$criteria->compare('estado',$this->estado,true);
		$criteria->compare('detalleEstado',$this->detalleEstado,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}