<?php

/**
 * This is the model class for table "preVentas_estados".
 *
 * The followings are the available columns in table 'preVentas_estados':
 * @property integer $idPreventaEmpresaEstado
 * @property string $fecha
 * @property integer $idUsuario
 * @property string $comentario
 * @property string $estado
 */
class PreVentasEstados extends CActiveRecord
{
    public $idPreVentaEmpresa;
    public $usuario;
    public $nombreEstado;
    public $nombreEmpresa;
    public $cantidadEstados;
	/**
	 * Returns the static model of the specified AR class.
	 * @return PreVentasEstados the static model class
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
		return 'preVentas_estados';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idUsuario,idPreVentaEmpresa', 'numerical', 'integerOnly'=>true),
			array('estado', 'length', 'max'=>255),
			array('fecha, comentario', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idPreventaEmpresaEstado, fecha, idUsuario, comentario, estado', 'safe', 'on'=>'search'),
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
			'idPreventaEmpresaEstado' => 'Id Preventa Empresa Estado',
			'fecha' => 'Fecha',
			'idUsuario' => 'Id Usuario',
			'comentario' => 'Comentario',
			'estado' => 'Estado',
		);
	}
        public  function afterSave()
	{
		parent::afterSave();
                $empresa=PreVentasEmpresas::model()->findByPk($this->idPreVentaEmpresa);
                $empresa->estado=$this->estado;
                $empresa->save();
  		return parent::afterSave();
        }
        public function consultarResumen($idUsuario,$fechaInicio,$fechaFin)
        {
            $datos['cantidadesUsuario']=$this->getCantidad($idUsuario,$fechaInicio,$fechaFin,'idUsuario');
            $datos['cantidadesEstado']=$this->getCantidad($idUsuario,$fechaInicio,$fechaFin,'estado');
            $datos['cantidadesEmpresa']=$this->getCantidad($idUsuario,$fechaInicio,$fechaFin,'idPreVentaEmpresa');
            
            return $datos;
        }
        private function getCantidad($idUsuario,$fechaInicio,$fechaFin,$agrupaPor)
        {
            $criteria=new CDbCriteria;
$criteria->join="LEFT JOIN preVentas_nombreEstados ns on ns.idPreventaEmpresaNombreEstado =t.estado 
                     LEFT JOIN usuarios  on usuarios.idUsuario = t.idUsuario
                     LEFT JOIN preVentas_empresas  on preVentas_empresas.idPreventaEmpresa = t.idPreVentaEmpresa";
                $criteria->select="t.*,COUNT(t.idPreventaEmpresaEstado) as cantidadEstados,preVentas_empresas.empresa as nombreEmpresa,usuarios.nombre as usuario,ns.nombreEstado as nombreEstado";
		$criteria->compare('t.fecha>',$fechaInicio,false);
                $criteria->compare('t.fecha<',$fechaFin,false);
                if($idUsuario!='')
		$criteria->compare('t.idUsuario',$idUsuario);
                $criteria->order="t.fecha desc";
                $criteria->group="t.".$agrupaPor;
                return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
               
        }
	public function consultarPerformance($idUsuario,$fechaInicio,$fechaFin)
        {
            $criteria=new CDbCriteria;
$criteria->join="LEFT JOIN preVentas_nombreEstados ns on ns.idPreventaEmpresaNombreEstado =t.estado 
                     LEFT JOIN usuarios  on usuarios.idUsuario = t.idUsuario
                     LEFT JOIN preVentas_empresas  on preVentas_empresas.idPreventaEmpresa = t.idPreVentaEmpresa";
                $criteria->select="t.*,preVentas_empresas.empresa as nombreEmpresa,usuarios.nombre as usuario,ns.nombreEstado as nombreEstado";
		$criteria->compare('t.fecha>',$fechaInicio,false);
                $criteria->compare('t.fecha<',$fechaFin,false);
                if($idUsuario!='')
		$criteria->compare('t.idUsuario',$idUsuario);
                $criteria->order="t.fecha desc";
                 return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,'pagination' => array ( 
        'PageSize' => 5000, 
    )
		));
        }
        public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idPreventaEmpresaEstado',$this->idPreventaEmpresaEstado);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('idUsuario',$this->idUsuario);
		$criteria->compare('comentario',$this->comentario,true);
		$criteria->compare('estado',$this->estado,true);
                $criteria->compare('idPreVentaEmpresa',$this->idPreVentaEmpresa,false);
                $criteria->order="t.idPreventaEmpresaEstado desc";
                
                if(isset($_GET['nombreEstado']) && trim($_GET['nombreEstado'])!="")
		{ 
			$criteria->compare('ns.nombreEstado',$_GET['nombreEstado'],true); 
		}
                if(isset($_GET['usuario2']) && trim($_GET['usuario2'])!="")
		{ 
			$criteria->compare('usuarios.nombre',$_GET['usuario2'],true); 
		}
                
                 $criteria->join="LEFT JOIN preVentas_nombreEstados ns on ns.idPreventaEmpresaNombreEstado =t.estado 
                     LEFT JOIN usuarios  on usuarios.idUsuario = t.idUsuario";
                $criteria->select="t.*,usuarios.nombre as usuario,ns.nombreEstado as nombreEstado";

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}