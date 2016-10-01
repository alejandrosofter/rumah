<?php

/**
 * This is the model class for table "solicitudesCambioPrecioFacturacion".
 *
 * The followings are the available columns in table 'solicitudesCambioPrecioFacturacion':
 * @property integer $idSolicitudPrecio
 * @property integer $idStock
 * @property double $importeLista
 * @property double $importeDescontado
 * @property integer $idUsuario
 * @property string $fecha
 * @property integer $nroInterno
 */
class SolicitudesCambioPrecioFacturacion extends CActiveRecord
{
    public $usuario;
    public $producto;
	/**
	 * Returns the static model of the specified AR class.
	 * @return SolicitudesCambioPrecioFacturacion the static model class
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
		return 'solicitudesCambioPrecioFacturacion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idStock, idUsuario, nroInterno', 'numerical', 'integerOnly'=>true),
			array('importeLista, importeDescontado', 'numerical'),
			array('fecha', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idSolicitudPrecio, idStock, importeLista, importeDescontado, idUsuario, fecha, nroInterno', 'safe', 'on'=>'search'),
		);
	}
        public function getSolicitud($nro)
        {
            return $this->getSoliciutd($nro);
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
        public function existe($nroInterno)
        {
            $s=new SolicitudesCambioPrecioFacturacion;
            $s->nroInterno=$nroInterno;
            $res=$s->search(true);
            if(count($res)>0) return true;
            return false;
        }

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idSolicitudPrecio' => 'Id Solicitud Precio',
			'idStock' => 'Id Stock',
			'importeLista' => 'Importe Lista',
			'importeDescontado' => 'Importe Descontado',
			'idUsuario' => 'Id Usuario',
			'fecha' => 'Fecha',
			'nroInterno' => 'Nro Interno',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function getSoliciutd($nro)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('nroInterno',$nro);
                $res=self::model()->findAll($criteria);
                return isset ($res[0])?$res[0]:false;

	}
        public function search($array=false)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idSolicitudPrecio',$this->idSolicitudPrecio);
		$criteria->compare('idStock',$this->idStock);
		$criteria->compare('importeLista',$this->importeLista);
		$criteria->compare('importeDescontado',$this->importeDescontado);
		$criteria->compare('idUsuario',$this->idUsuario);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('nroInterno',$this->nroInterno);
                $criteria->join="LEFT JOIN usuarios on usuarios.idUsuario = t.idUsuario 
                    LEFT JOIN stock on stock.idStock = t.idStock";
                $criteria->select="t.*,usuarios.nombre as usuario,stock.nombre as producto";
                if($array) return self::model()->findAll($criteria);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}