<?php

/**
 * This is the model class for table "ordenesTrabajo_stock".
 *
 * The followings are the available columns in table 'ordenesTrabajo_stock':
 * @property integer $idStockOrden
 * @property integer $idStock
 * @property integer $idOrdenTrabajo
 * @property string $nombreStock
 * @property double $porcentajeIva
 * @property double $importe
 * @property double $cantidad
 */
class OrdenesTrabajoStock extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return OrdenesTrabajoStock the static model class
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
		return 'ordenesTrabajo_stock';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idStock, idOrdenTrabajo', 'numerical', 'integerOnly'=>true),
			array('porcentajeIva, importe, cantidad', 'numerical'),
			array('nombreStock', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idStockOrden, idStock, idOrdenTrabajo, nombreStock, porcentajeIva, importe, cantidad', 'safe', 'on'=>'search'),
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
			'idStockOrden' => 'Id Stock Orden',
			'idStock' => 'Id Stock',
			'idOrdenTrabajo' => 'Id Orden Trabajo',
			'nombreStock' => 'Nombre Stock',
			'porcentajeIva' => 'Porcentaje Iva',
			'importe' => 'Importe',
			'cantidad' => 'Cantidad',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search($id,$arr=false)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idStockOrden',$this->idStockOrden);
		$criteria->compare('idStock',$this->idStock);
		$criteria->compare('idOrdenTrabajo',$id);
		$criteria->compare('nombreStock',$this->nombreStock,true);
		$criteria->compare('porcentajeIva',$this->porcentajeIva);
		$criteria->compare('importe',$this->importe);
		$criteria->compare('cantidad',$this->cantidad);
                if($arr) return self::model()->findAll($criteria);
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}