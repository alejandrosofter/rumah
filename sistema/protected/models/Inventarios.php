<?php

/**
 * This is the model class for table "inventarios".
 *
 * The followings are the available columns in table 'inventarios':
 * @property integer $idInventario
 * @property string $fechaInventario
 * @property string $descripcionInventario
 * @property integer $esPredeterminado
 */
class Inventarios extends CActiveRecord
{
	public $cantidadProductos;
	public $formulaInventarioPrecios;
	/**
	 * Returns the static model of the specified AR class.
	 * @return Inventarios the static model class
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
		return 'inventarios';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fechaInventario, descripcionInventario, esPredeterminado', 'required'),
			array('esPredeterminado', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idInventario, fechaInventario, descripcionInventario, esPredeterminado', 'safe', 'on'=>'search'),
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
			'idInventario' => 'Id Inventario',
			'fechaInventario' => 'Fecha Inventario',
			'descripcionInventario' => 'Descripcion Inventario',
			'esPredeterminado' => 'Es Predeterminado',
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

		$criteria->compare('idInventario',$this->idInventario);
		$criteria->compare('fechaInventario',$this->fechaInventario,true);
		$criteria->compare('descripcionInventario',$this->descripcionInventario,true);
		$criteria->compare('esPredeterminado',$this->esPredeterminado);
		$criteria->select = "t.*,count(inventarios_productos.idInventario) as cantidadProductos ";
		$criteria->join = "LEFT JOIN inventarios_productos on inventarios_productos.idInventario = t.idInventario ";
		$criteria->group='t.idInventario';

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}