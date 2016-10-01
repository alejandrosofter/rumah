<?php

/**
 * This is the model class for table "condicionesCompra_items".
 *
 * The followings are the available columns in table 'condicionesCompra_items':
 * @property integer $idCondicionCompraItem
 * @property integer $idCondicionCompra
 * @property double $porcentajeTotalFacturado
 * @property integer $cantidadCuotas
 * @property integer $aVencerEnDias
 * @property integer $cantidadDiasMeses
 * @property string $unidadCantidad
 */
class CondicionesCompraItems extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return CondicionesCompraItems the static model class
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
		return 'condicionesCompra_items';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idCondicionCompra, cantidadCuotas, aVencerEnDias, cantidadDiasMeses', 'numerical', 'integerOnly'=>true),
			array('porcentajeTotalFacturado', 'numerical'),
			array('unidadCantidad', 'length', 'max'=>255),
			array('porcentajeTotalFacturado,cantidadCuotas', 'required'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idCondicionCompraItem, idCondicionCompra, porcentajeTotalFacturado, cantidadCuotas, aVencerEnDias, cantidadDiasMeses, unidadCantidad', 'safe', 'on'=>'search'),
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
			'idCondicionCompraItem' => 'Id Condicion Compra Item',
			'idCondicionCompra' => 'Id Condicion Compra',
			'porcentajeTotalFacturado' => '% Total Facturado',
			'cantidadCuotas' => 'Cant. Cuotas',
			'aVencerEnDias' => 'A Vencer En Dias',
			'cantidadDiasMeses' => 'Cantidad (Dias Meses) entre Cuotas',
			'unidadCantidad' => 'Unidad Cantidad',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function consultarCondiciones()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('idCondicionCompra',$this->idCondicionCompra);

		return self::model()->findAll($criteria);
	}
	public function consultarCondiciones2($idCondicion)
	{
		$criteria=new CDbCriteria;

		$criteria->compare('idCondicionCompra',$idCondicion);

		return self::model()->findAll($criteria);
	}
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idCondicionCompraItem',$this->idCondicionCompraItem);
		$criteria->compare('idCondicionCompra',$this->idCondicionCompra);
		$criteria->compare('porcentajeTotalFacturado',$this->porcentajeTotalFacturado);
		$criteria->compare('cantidadCuotas',$this->cantidadCuotas);
		$criteria->compare('aVencerEnDias',$this->aVencerEnDias);
		$criteria->compare('cantidadDiasMeses',$this->cantidadDiasMeses);
		$criteria->compare('unidadCantidad',$this->unidadCantidad,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}