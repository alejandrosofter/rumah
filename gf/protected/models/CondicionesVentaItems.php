<?php

/**
 * This is the model class for table "condicionesVentaItems".
 *
 * The followings are the available columns in table 'condicionesVentaItems':
 * @property integer $idCondicionVentaItem
 * @property integer $idCondicionVenta
 * @property double $porcentajeTotalFacturado
 * @property integer $cantidadCuotas
 * @property integer $aVencerEnDias
 * @property integer $CantidadDiasMesesCuotas
 * @property double $porcentajeInteres
 * @property string $fechaVencimiento
 * @property string $calculo
 *
 * The followings are the available model relations:
 * @property CondicionesVenta $idCondicionVenta0
 */
class CondicionesVentaItems extends CActiveRecord
{
	public $letraDiaMes;
	/**
	 * Returns the static model of the specified AR class.
	 * @return CondicionesVentaItems the static model class
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
		return 'condicionesVentaItems';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cantidadCuotas, porcentajeTotalFacturado', 'required'),
			array('idCondicionVenta, cantidadCuotas, aVencerEnDias, CantidadDiasMesesCuotas', 'numerical', 'integerOnly'=>true),
			array('porcentajeTotalFacturado, porcentajeInteres', 'numerical'),
			array('calculo,letraDiaMes', 'length', 'max'=>255),
			array('fechaVencimiento', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idCondicionVentaItem, idCondicionVenta, porcentajeTotalFacturado, cantidadCuotas, aVencerEnDias, CantidadDiasMesesCuotas, porcentajeInteres, fechaVencimiento, calculo,letraDiaMes', 'safe', 'on'=>'search'),
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
			'idCondicionVenta0' => array(self::BELONGS_TO, 'CondicionesVenta', 'idCondicionVenta'),
		);
	}

	public function consultarCondiciones()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('idCondicionVenta',$this->idCondicionVenta);

		return self::model()->findAll($criteria);
	}
	
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idCondicionVentaItem' => 'Id Condicion Venta Item',
			'idCondicionVenta' => 'Id Condicion Venta',
			'porcentajeTotalFacturado' => 'Porcentaje Total Facturado',
			'cantidadCuotas' => 'Cantidad Cuotas',
			'aVencerEnDias' => 'A Vencer En Dias',
			'CantidadDiasMesesCuotas' => 'Cantidad Dias Meses Cuotas',
			'porcentajeInteres' => 'Porcentaje Interes',
			'fechaVencimiento' => 'Fecha Vencimiento',
			'calculo' => 'Calculo',
		'letraDiaMes'=>'D/M',
		);
	}

	
	
	
	
	
public function consultarCondiciones3($idCondicion=-1)
	{
		if ($idCondicion!='')
		{
		$connection=Yii::app()->getDb();
            $command=$connection->createCommand("SELECT ".
"porcentajeInteres from condicionesVentaItems where idCondicionVenta =".$idCondicion);
            
            $res = $command->queryAll();
            $res=isset($res[0])?$res[0]['porcentajeInteres']:0;
            return $res;	
		}
		return 0;
			

	}
	
	

	
	
	
	
	
	public function consultarCondiciones2($idCondicion)
	{
		$criteria=new CDbCriteria;

		$criteria->compare('idCondicionVenta',$idCondicion);

		return self::model()->findAll($criteria);
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

		$criteria->compare('idCondicionVentaItem',$this->idCondicionVentaItem);
		$criteria->compare('idCondicionVenta',$this->idCondicionVenta);
		$criteria->compare('porcentajeTotalFacturado',$this->porcentajeTotalFacturado);
		$criteria->compare('cantidadCuotas',$this->cantidadCuotas);
		$criteria->compare('aVencerEnDias',$this->aVencerEnDias);
		$criteria->compare('CantidadDiasMesesCuotas',$this->CantidadDiasMesesCuotas);
		$criteria->compare('porcentajeInteres',$this->porcentajeInteres);
		$criteria->compare('fechaVencimiento',$this->fechaVencimiento,true);
		$criteria->compare('calculo',$this->calculo,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}