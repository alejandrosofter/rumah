<?php

/**
 * This is the model class for table "ordenesTrabajoItems".
 *
 * The followings are the available columns in table 'ordenesTrabajoItems':
 * @property integer $idOrdenTrabajoItem
 * @property integer $cantidad
 * @property string $item
 * @property double $importe
 * @property double $porcentajeIva
 * @property integer $idStock
 * @property string $estadoItem
 * @property integer $idOrdenTrabajo
 */
class OrdenesTrabajoItems extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return OrdenesTrabajoItems the static model class
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
		return 'ordenesTrabajoItems';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cantidad, item, importe, porcentajeIva, idStock, estadoItem, idOrdenTrabajo', 'required'),
			array('cantidad, idStock, idOrdenTrabajo', 'numerical', 'integerOnly'=>true),
			array('importe, porcentajeIva', 'numerical'),
			array('item', 'length', 'max'=>255),
			array('estadoItem', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idOrdenTrabajoItem, cantidad, item, importe, porcentajeIva, idStock, estadoItem, idOrdenTrabajo', 'safe', 'on'=>'search'),
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
			'idOrdenTrabajoItem' => 'Id Orden Trabajo Item',
			'cantidad' => 'Cantidad',
			'item' => 'Item',
			'importe' => 'Importe',
			'porcentajeIva' => 'Porcentaje Iva',
			'idStock' => 'Id Stock',
			'estadoItem' => 'Estado Item',
			'idOrdenTrabajo' => 'Id Orden Trabajo',
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

		$criteria->compare('idOrdenTrabajoItem',$this->idOrdenTrabajoItem);
		$criteria->compare('cantidad',$this->cantidad);
		$criteria->compare('item',$this->item,true);
		$criteria->compare('importe',$this->importe);
		$criteria->compare('porcentajeIva',$this->porcentajeIva);
		$criteria->compare('idStock',$this->idStock);
		$criteria->compare('estadoItem',$this->estadoItem,true);
		$criteria->compare('idOrdenTrabajo',$this->idOrdenTrabajo);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}