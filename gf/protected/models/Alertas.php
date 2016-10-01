<?php

/**
 * This is the model class for table "alertas".
 *
 * The followings are the available columns in table 'alertas':
 * @property integer $idAlerta
 * @property string $titulo
 * @property string $descripcion
 * @property string $nivelAlerta
 * @property string $tipoAlerta
 * @property string $estadoAlerta
 * @property string $fechaVencimiento
 * @property string $linkSolucion
 */
class Alertas extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Alertas the static model class
	 */
	 public $idUsuario;
	 public $diasVencidos;
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'alertas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('titulo,area,controlador,fechaInicioAlerta, nivelAlerta, tipoAlerta, estadoAlerta', 'length', 'max'=>255),
			array('descripcion, fechaVencimiento, linkSolucion', 'safe'),
			array('titulo', 'required'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idAlerta,tipoAlerta,idElemento, titulo, descripcion, nivelAlerta, tipoAlerta, estadoAlerta, fechaVencimiento, linkSolucion', 'safe', 'on'=>'search'),
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
      	if($this->tipoAlerta=='Usuario')
      	{
      		$modelAlertaUsuario= new AlertasUsuario;
      		$modelAlertaUsuario->idAlerta=$this->idAlerta;
      		$modelAlertaUsuario->idUsuario=Yii::app()->user->id;
      		$modelAlertaUsuario->save();
      	}
      

      	return parent::afterSave();
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idAlerta' => 'Id Alerta',
			'titulo' => 'Titulo',
			'descripcion' => 'Descripcion',
			'nivelAlerta' => 'Nivel Alerta',
			'tipoAlerta' => 'Tipo Alerta',
			'estadoAlerta' => 'Estado Alerta',
			'fechaVencimiento' => 'Fecha Vencimiento',
			'linkSolucion' => 'Link Solucion',
		);
	}
	public function getNivelAlertas()
	{
    	return array( 'Media' => 'Media', 'Alta' => 'Alta', 'Baja' => 'Baja');
	}
	public function getTipoAlertas()
	{
    	return array('A' => 'A', 'B' => 'B', 'C' => 'C', 'X' => 'X');
	}
	public function finalizar($id)
	{
		$alerta=self::model()->findByPk($id);
		$alerta->estadoAlerta='Finalizada';
		$alerta->save();
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	 public function cambiarEstado($idAlerta,$estado,$mensaje='')
	{
		$alerta=self::model()->findByPk($idAlerta);
                if($alerta!=null){
                    $alerta->estadoAlerta=$estado;
                    if($mensaje!='')
			$alerta->titulo=$alerta->titulo.'('.$mensaje.')';
                    $alerta->save();
                }
		
	}
	public function buscarElemento($idElemento)
	{
		$connection=Yii::app()->getDb();
        $command=$connection->createCommand("
SELECT * from alertas WHERE idElemento='$idElemento'");
            
            $res= $command->queryAll();
            if(count($res)==0) return false;
            return $res[0];
	}
	public function cambiarEstadoUsuarioTarea($elementos,$estado)
	{
		foreach($elementos as $item)
		$this->cambiarEstado($item['idAlerta'],'Activa',$estado);
	}
	public function bajarAlertasUsuarioTarea($elementos)
	{
		foreach($elementos as $item)
		$this->cambiarEstado($item['idAlerta'],'Finalizado');
	}
	public function existeAlerta($idElemento)
	{
		$connection=Yii::app()->getDb();
		$sql="SELECT * from alertas where idElemento='$idElemento'";
		
        $command=$connection->createCommand($sql);
            
        $res= $command->queryAll();
        return count($res)>0?true:false;
	}
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
	$criteria->condition='(t.fechaInicioAlerta<=CURDATE() OR t.fechaInicioAlerta is NULL) AND (alertas_usuario.idUsuario is NULL OR alertas_usuario.idUsuario like '.Yii::app()->user->id.') AND
 (t.estadoAlerta = "Activa")';
		
		$criteria->select = "DATEDIFF(t.fechaInicioAlerta, CURDATE()) as diasVencidos,t.*,alertas_usuario.idUsuario";
		$criteria->join = "LEFT JOIN alertas_usuario on alertas_usuario.idAlerta = t.idAlerta ";
		$criteria->order='diasVencidos desc';
	

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}