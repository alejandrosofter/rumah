<?php

/**
 * This is the model class for table "vendedores".
 *
 * The followings are the available columns in table 'vendedores':
 * @property integer $idVendedor
 * @property string $nombre
 * @property string $apellido
 * @property string $telefono
 * @property string $nroLegajo
 * @property double $porcentajeGanancia
 * @property string $fechaInicio
 */
class Vendedores extends CActiveRecord
{
    public $ventas;
    public $gananciaVendedor;
	/**
	 * Returns the static model of the specified AR class.
	 * @return Vendedores the static model class
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
		return 'vendedores';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('porcentajeGanancia', 'numerical'),
			array('nombre, apellido, telefono, nroLegajo', 'length', 'max'=>255),
			array('fechaInicio', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idVendedor, nombre, apellido, telefono, nroLegajo, porcentajeGanancia, fechaInicio', 'safe', 'on'=>'search'),
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
			'idVendedor' => 'Id Vendedor',
			'nombre' => 'Nombre',
			'apellido' => 'Apellido',
			'telefono' => 'Telefono',
			'nroLegajo' => 'Nro Legajo',
			'porcentajeGanancia' => 'Porcentaje Ganancia',
			'fechaInicio' => 'Fecha Inicio',
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

		$criteria->compare('idVendedor',$this->idVendedor);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('apellido',$this->apellido,true);
		$criteria->compare('telefono',$this->telefono,true);
		$criteria->compare('nroLegajo',$this->nroLegajo,true);
		$criteria->compare('porcentajeGanancia',$this->porcentajeGanancia);
		$criteria->compare('fechaInicio',$this->fechaInicio,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
        public function consultarPerformance($idVendedor,$fechaInicio,$fechaFin)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		if(isset($idUsaurio))$criteria->compare('t.idVendedor',$idVendedor,false);

		$criteria->compare('facturasSalientes_view.fecha>',$fechaInicio,false);
                $criteria->compare('facturasSalientes_view.fecha<',$fechaFin,false);
                $criteria->select="t.*,SUM(facturasSalientes_view.importeFactura) as ventas, SUM(facturasSalientes_view.importeFactura)*(t.porcentajeGanancia/100) as gananciaVendedor";
                $criteria->group="t.idVendedor";
                $criteria->join="
                    LEFT JOIN facturasSalientes on facturasSalientes.idVendedor =t.idVendedor 
                    LEFT JOIN facturasSalientes_view on facturasSalientes_view.idFacturaSaliente=facturasSalientes.idFacturaSaliente";

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}