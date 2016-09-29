<?php

/**
 * This is the model class for table "usuarios".
 *
 * The followings are the available columns in table 'usuarios':
 * @property integer $idUsuario
 * @property string $nombre
 * @property string $usuario_
 * @property string $clave_
 * @property string $email
 * @property string $rutaImagen
 * @property integer $idTipoUsuario
 * @property integer $idAreaUsuario
 */
class Usuarios extends CActiveRecord
{

	public $panelDeControl;
	public $anotador;
	/**
	 * Returns the static model of the specified AR class.
	 * @return Usuarios the static model class
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
		return 'usuarios';
	}
        

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre,usuario_,clave_, email', 'required'),
			array('mobil,idTipoUsuario, idAreaUsuario', 'numerical', 'integerOnly'=>true),
			array('nombre, usuario_, clave_', 'length', 'max'=>30),
			array('email', 'length', 'max'=>80),
			array('rutaImagen', 'length', 'max'=>5000),
			array('panelDeControl,anotador','safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idUsuario,panelDeControl,anotador, nombre, usuario_, clave_, email, rutaImagen, idTipoUsuario, idAreaUsuario', 'safe', 'on'=>'search'),
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
			'idUsuario' => 'Id Usuario',
			'nombre' => 'Nombre',
			'usuario_' => 'Usuario',
			'clave_' => 'Clave',
			'email' => 'Email',
			'rutaImagen' => 'Ruta Imagen',
			'idTipoUsuario' => 'Tipo',
			'idAreaUsuario' => 'Area',
		);
	}
	public function consultarUsuariosArea($idArea)
	{
		$criteria=new CDbCriteria;
		$criteria->compare('t.idAreaUsuario',$idArea);
		$criteria->select="t.*";
		return self::model()->findAll($criteria);
		
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	private function cambiarBase($nombreBase)
	{
		$dbname = $nombreBase;

        $db = Yii::createComponent(array(
           'class' => 'CDbConnection',
            // other config properties...
             'connectionString'=>"mysql:host=localhost;dbname=$dbname",
                'username'=>'root',
                'password'=> 'vertrigo',
                'charset'=>'utf8',
                'emulatePrepare' => true,
                'enableParamLogging'=>true,
                'enableProfiling' => true,
        ));

        Yii::app()->setComponent('db', $db);
	}
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		
		$criteria=new CDbCriteria;

		$criteria->compare('idUsuario',$this->idUsuario);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('usuario_',$this->usuario_,true);
		$criteria->compare('clave_',$this->clave_,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('rutaImagen',$this->rutaImagen,true);
		$criteria->compare('idTipoUsuario',$this->idTipoUsuario);
		$criteria->compare('idAreaUsuario',$this->idAreaUsuario);
		$criteria->select = "t.*, usuarios_areas.nombreArea";
		$criteria->join = "LEFT JOIN usuarios_areas on usuarios_areas.idUsuarioArea = t.idAreaUsuario ";
				//"LEFT JOIN usuarios_tipoUsuarios on usuarios_tipoUsuarios.idTipoUsuario = t.idTipoUsuario";
			//"INNER JOIN usuarios_tipoUsuarios on usuarios_tipoUsuarios.idTipoUsuarios = t.idTipoUsuario";
		$criteria->group=' t.idUsuario';

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	public function consultarEtiquetasGeneral($nombre)
	{
		$connection=Yii::app()->getDb();
		$sql="(SELECT CONCAT(apellido,' ',nombre,' ',razonSocial) as nombre, 'clientes' as tipo, idCliente as idElemento FROM `clientes` WHERE (apellido like '%$nombre%' OR nombre like '%$nombre%' OR razonSocial like '%$nombre%'  ) ) UNION all
(SELECT nombre as nombre, 'proveedores' as tipo, idProveedor as idElemento FROM `proveedores` WHERE (nombre like '%$nombre%' OR cuit like '%$nombre%'   )) UNION all" .
		"(SELECT nombre,'acciones' as tipo, direccion as idElemento FROM acciones WHERE nombre like '%$nombre%') ";
        $command=$connection->createCommand($sql);
            
            return $command->queryAll();
	}
	public function consultarUsuariosActivos()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('t.idUsuario',Yii::app()->user->idUsuario);
		$criteria->select="t.idSesion,SUBSTRING_INDEX( GROUP_CONCAT(CAST(t.fechaEgresa AS CHAR) ORDER BY t.idSesion desc), ',', 1 ) as fechaEgresa,SUBSTRING_INDEX( GROUP_CONCAT(CAST(t.fechaIngresa AS CHAR) ORDER BY t.idSesion desc), ',', 1 ) as fechaIngresa,usuarios.nombre as nombreUsuario";
		$criteria->join="INNER JOIN usuarios on usuarios.idUsuario = t.idUsuario ";
		$criteria->group="t.idUsuario";
		$criteria->order="t.idSesion desc";
		
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	public function getTextoUsuario()
	{
				$texto=Yii::app()->settings->getKey( 'USUARIO');
				
				$texto = str_replace("%usuario",isset(Yii::app()->user->nombre)?Yii::app()->user->nombre:'',$texto);
				$texto = str_replace("%foto", isset(Yii::app()->user->rutaImagen)?Yii::app()->user->rutaImagen:'',$texto);
				
				return $texto;
	}
}