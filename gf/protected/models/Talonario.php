<?php

/**
 * This is the model class for table "talonario".
 *
 * The followings are the available columns in table 'talonario':
 * @property integer $idTalonario
 * @property integer $idPuntoVenta
 * @property integer $desdeNumero
 * @property integer $hastaNumero
 * @property integer $proximo
 * @property string $letraTalonario
 * @property string $tipoTalonario
 * @property integer $numeroSerie
 */
class Talonario extends CActiveRecord
{
	public $mascara;
        public $certificado;
        public $esElectronica;
        public $predeterminado;
        public $csr;
        public $key;
        public $codigoPuntoVenta;
        public $descripcion;
	/**
	 * Returns the static model of the specified AR class.
	 * @return Talonario the static model class
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
		return 'talonario';
	}
        public function getTalonarios()
	{
    	return array('Factura' => 'Factura', 'Nota Credito' => 'Nota Credito');
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idPuntoVenta,esElectronica, hastaNumero, proximo, numeroSerie', 'required'),
			array('idPuntoVenta, ultimoNroPagIva,predeterminado,desdeNumero, hastaNumero, proximo, numeroSerie', 'numerical', 'integerOnly'=>true),
			array('descripcion,letraTalonario, ultimoNroPagIva,codigoPuntoVenta, tipoTalonario', 'length', 'max'=>255),
                     //array('certificado', 'file', 'types'=>'crt'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idTalonario,certificado,key,csr,ultimoNroPagIva, idPuntoVenta, desdeNumero, hastaNumero, proximo, letraTalonario, tipoTalonario, numeroSerie', 'safe', 'on'=>'search'),
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
			'idTalonario' => 'Id Talonario',
			'idPuntoVenta' => 'Id Punto Venta',
			'desdeNumero' => 'Desde Numero',
			'hastaNumero' => 'Hasta Numero',
			'proximo' => 'Proximo',
			'letraTalonario' => 'Letra Talonario',
			'tipoTalonario' => 'Tipo Talonario',
			'numeroSerie' => 'Numero Serie',
			'ultimoNroPagIva' => 'Ultima pag. Iva',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	
	public function searchMascara()
	{
//		$criteria=new CDbCriteria;
//
//		$criteria->select =' t.*, Concat(t.letraTalonario,t.numeroSerie,t.proximo) ';
//		return new CActiveDataProvider(get_class($this), array(
//			'criteria'=>$criteria,
//		));	
$connection=Yii::app()->getDb();
        $command=$connection->createCommand("
SELECT t.*,CONCAT(t.tipoTalonario,' ',t.letraTalonario,IF(t.esElectronica,'(Electronica)',''),'(',IF(t.descripcion=NULL,'',t.descripcion),')') as nombreTalonario, CONCAT(t.idTalonario,' ',t.letraTalonario,' ',
t.numeroSerie,' ',t.proximo) as mascara from talonario t");
            $res=$command->queryAll();
        
            return $res;
	}
        public function getPorDefecto()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('predeterminado',1,true);
		$tal=Talonario::model()->findAll($criteria);
                if(count($tal)==0) return null;
                return $tal[0];
	}
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idTalonario',$this->idTalonario);
		$criteria->compare('idPuntoVenta',$this->idPuntoVenta);
		$criteria->compare('desdeNumero',$this->desdeNumero);
		$criteria->compare('hastaNumero',$this->hastaNumero);
		$criteria->compare('proximo',$this->proximo);
		$criteria->compare('letraTalonario',$this->letraTalonario,true);
		$criteria->compare('tipoTalonario',$this->tipoTalonario,true);
		$criteria->compare('numeroSerie',$this->numeroSerie);
		$criteria->order =' t.idTalonario desc ';
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}