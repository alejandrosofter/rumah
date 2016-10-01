<?php

/**
 * This is the model class for table "stock_disponible".
 *
 * The followings are the available columns in table 'stock_disponible':
 * @property integer $idStockDisponible
 * @property integer $idStock
 * @property integer $cantidadDisponible
 * @property integer $auxiliarStock
 * @property integer $auxiliarDisponible
 */
class StockDisponible extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return StockDisponible the static model class
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
		return 'stock_disponible';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
//			array('idStock, cantidadDisponible, auxiliarStock, auxiliarDisponible', 'required'),
			array('idStock, cantidadDisponible', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idStockDisponible, idStock, cantidadDisponible, auxiliarStock, auxiliarDisponible', 'safe', 'on'=>'search'),
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
	public function agregarStock($idStock,$cantidad)
	{
		$model=$this->getStock($idStock);
		if($model!=null){
			$model->cantidadDisponible+=$cantidad;
			$model->save();
			echo 'salvo '.$model->cantidadDisponible;
		}
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idStockDisponible' => 'Id Stock Disponible',
			'idStock' => 'Id Stock',
			'cantidadDisponible' => 'Cantidad Disponible',
			'auxiliarStock' => 'Auxiliar Stock',
			'auxiliarDisponible' => 'Auxiliar Disponible',
		);
	}

	public function getStock($idStock)
	{
		$criteria=new CDbCriteria;
		$criteria->compare('idStock',$idStock,false);
		$res=self::model()->findAll($criteria);
		if(count($res)>0)return $res[0];
		return null;
	}
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idStockDisponible',$this->idStockDisponible);
		$criteria->compare('idStock',$this->idStock);
		$criteria->compare('cantidadDisponible',$this->cantidadDisponible);
		$criteria->compare('auxiliarStock',$this->auxiliarStock);
		$criteria->compare('auxiliarDisponible',$this->auxiliarDisponible);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}