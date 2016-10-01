<?php

/**
 * This is the model class for table "preVentas_empresas".
 *
 * The followings are the available columns in table 'preVentas_empresas':
 * @property integer $idPreventaEmpresa
 * @property string $fecha
 * @property string $empresa
 * @property string $telefono
 * @property string $email
 * @property string $estado
 * @property integer $idUsuario
 * @property string $interes
 */
class PreVentasEmpresas extends CActiveRecord
{
    public $nombreEstado;
    public $usuario;
    public $contacto;
    public $responsable;
	/**
	 * Returns the static model of the specified AR class.
	 * @return PreVentasEmpresas the static model class
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
		return 'preVentas_empresas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idUsuario', 'numerical', 'integerOnly'=>true),
			array('empresa,contacto,responsable, telefono, email, estado, interes', 'length', 'max'=>255),
			array('fecha', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idPreventaEmpresa, fecha, empresa, telefono, email, estado, idUsuario, interes', 'safe', 'on'=>'search'),
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
			'idPreventaEmpresa' => 'Id Preventa Empresa',
			'fecha' => 'Fecha',
			'empresa' => 'Empresa',
			'telefono' => 'Telefono',
			'email' => 'Email',
			'estado' => 'Estado',
			'idUsuario' => 'Id Usuario',
			'interes' => 'Interes',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
        public function consultarResumen($idUsaurio,$fechaInicio,$fechaFin)
	{
		$criteria=new CDbCriteria;
                
                if(isset($idUsaurio))$criteria->compare('t.idUsuario',$idUsaurio,false);

		$criteria->compare('t.fecha>',$fechaInicio,false);
                $criteria->compare('t.fecha<',$fechaFin,false);
                $criteria->select="t.*,usuarios.nombre as usuario";
                $criteria->join="left join usuarios on usuarios.idUsuario = t.idUsuario";
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

		$criteria->compare('idPreventaEmpresa',$this->idPreventaEmpresa);
		if(isset($_GET['fecha']) && trim($_GET['fecha'])!="")
		{ 
                    $fe=$_GET['fecha'];
			$criteria->compare('t.fecha',$fe,true); 
		}
		$criteria->compare('empresa',$this->empresa,true);
		$criteria->compare('telefono',$this->telefono,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('estado',$this->estado,true);
		$criteria->compare('idUsuario',$this->idUsuario);
		$criteria->compare('interes',$this->interes,true);
                
                if(isset($_GET['nombreEstado']) && trim($_GET['nombreEstado'])!="")
		{ 
			$criteria->compare('ns.nombreEstado',$_GET['nombreEstado'],true); 
		}
                 if(isset($_GET['contacto']) && trim($_GET['contacto'])!="")
		{ 
			$criteria->compare('contacto',$_GET['contacto'],true); 
		}
                if(isset($_GET['responsable']) && trim($_GET['responsable'])!="")
		{ 
			$criteria->compare('responsable',$_GET['responsable'],true); 
		}
                
                $criteria->join="LEFT JOIN preVentas_nombreEstados ns on ns.idPreventaEmpresaNombreEstado =t.estado";
                $criteria->select="t.*,ns.nombreEstado as nombreEstado";
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}