<?php

/**
 * This is the model class for table "facturasEntrantes_concepto".
 *
 * The followings are the available columns in table 'facturasEntrantes_concepto':
 * @property integer $idFacturaConcepto
 * @property integer $idFacturaEntrante
 * @property integer $idConcepto
 */
class FacturasEntrantesConcepto extends CActiveRecord
{
	public $importe;
	public $importeSub;
	public $alicuotaIva;
	public $nombreConcepto;
        public $detalle;
	/**
	 * Returns the static model of the specified AR class.
	 * @return FacturasEntrantesConcepto the static model class
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
		return 'facturasEntrantes_concepto';
	}
	public function consultarResumenTotal($idFactura)
	{
		$criteria=new CDbCriteria;

		
		$criteria->compare('t.idFacturaEntrante',$idFactura);
		$criteria->select = "SUM(t.importe+(t.importe*(t.alicuotaIva/100)))  as importe,SUM(t.importe) as importeSub ";
		$criteria->join = "LEFT JOIN facturasEntrantes on t.idFacturaEntrante = facturasEntrantes.idFacturaEntrante ";
		//$criteria->group='t.alicuotaIva';
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	public function consultarResumen($idFactura)
	{
		$criteria=new CDbCriteria;

		
		$criteria->compare('t.idFacturaEntrante',$idFactura);
		$criteria->select = " t.alicuotaIva ,SUM(t.importe) as importe ";
		
		$criteria->group='t.alicuotaIva';
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
public function consultarPorFactura($idFactura,$array=false)
	{
		$criteria=new CDbCriteria;

		$criteria->compare('t.idFacturaEntrante',$idFactura);
		$criteria->compare('nombreConcepto',$this->nombreConcepto,true);
		
		$criteria->join="INNER JOIN conceptos on conceptos.idConcepto = t.idConcepto";
		$criteria->select="t.*,conceptos.nombreConcepto";
                if($array) return self::model ()->findAll($criteria);
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('alicuotaIva,importe, idConcepto', 'required'),
			array('idFacturaEntrante, idConcepto', 'numerical', 'integerOnly'=>true),
			array('nombreConcepto', 'length', 'max'=>150),
                    array('detalle', 'length', 'max'=>1500),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idFacturaConcepto, idFacturaEntrante, idConcepto', 'safe', 'on'=>'search'),
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
			'idFacturaConcepto' => 'Id Factura Concepto',
			'idFacturaEntrante' => 'Id Factura Entrante',
			'idConcepto' => 'Concepto',
			'importe' => '$ Importe',
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

		$criteria->compare('idFacturaConcepto',$this->idFacturaConcepto);
		$criteria->compare('idFacturaEntrante',$this->idFacturaEntrante);
		$criteria->compare('idConcepto',$this->idConcepto);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}