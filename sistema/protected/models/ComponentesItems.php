<?php

/**
 * This is the model class for table "componentes_items".
 *
 * The followings are the available columns in table 'componentes_items':
 * @property integer $idItemComponente
 * @property integer $idStock
 * @property integer $idComponente
 *
 * The followings are the available model relations:
 * @property Stock $idStock0
 */
class ComponentesItems extends CActiveRecord
{
	public $cantidad;
	/**
	 * Returns the static model of the specified AR class.
	 * @return ComponentesItems the static model class
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
		return 'componentes_items';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idStock, idComponente,cantidad', 'required'),
			array('idStock, idComponente', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idItemComponente, idStock, idComponente', 'safe', 'on'=>'search'),
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
			'idStock0' => array(self::BELONGS_TO, 'Stock', 'idStock'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idItemComponente' => 'Id Item Componente',
			'idStock' => 'Producto',
			'cantidad' => 'Cantidad',
			'idComponente' => 'Id Componente',
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

		$criteria->compare('idItemComponente',$this->idItemComponente);
		$criteria->compare('idStock',$this->idStock);
		$criteria->compare('idComponente',$this->idComponente);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}