<?php

/**
 * This is the model class for table "facturasEntrantes_vencimientos".
 *
 * The followings are the available columns in table 'facturasEntrantes_vencimientos':
 * @property integer $idFacturaVencimiento
 * @property integer $idFacturaEntrante
 * @property string $fechaVencimiento
 * @property string $estado
 * @property double $importe
 */
class FacturasEntrantesVencimientos extends CActiveRecord
{
	public $factura;
	public $proveedor;
	public $diasVencidos; 
	/**
	 * Returns the static model of the specified AR class.
	 * @return FacturasEntrantesVencimientos the static model class
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
		return 'facturasEntrantes_vencimientos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idFacturaEntrante', 'numerical', 'integerOnly'=>true),
			array('importe', 'numerical'),
			array('estado', 'length', 'max'=>255),
			array('fechaVencimiento', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idFacturaVencimiento, idFacturaEntrante, fechaVencimiento, estado, importe', 'safe', 'on'=>'search'),
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
			'idFacturaVencimiento' => 'Id Factura Vencimiento',
			'idFacturaEntrante' => 'Id Factura Entrante',
			'fechaVencimiento' => 'Fecha Vencimiento',
			'estado' => 'Estado',
			'importe' => 'Importe',
		);
	}
	public function consultarVencimientos($idFactura)
	{
		$criteria=new CDbCriteria;

		$criteria->compare('idFacturaEntrante',$idFactura);

		return self::model()->findAll($criteria);
	}
        public function quitarVencimientos($idFacturaEntrante)
	{
            $sql="DELETE from facturasEntrantes_vencimientos WHERE idFacturaEntrante='$idFacturaEntrante'";
            $connection=Yii::app()->getDb();
            $command=$connection->createCommand($sql);
            
            return $command->query();
        }
	public function ingresarVencimientos($idFacturaEntrante)
	{
		$factura=FacturasEntrantes::model()->consultarUnica($idFacturaEntrante);
		$condicion=CondicionesCompra::model()->findByPk($factura['idCondicionCompra']);
		$model=new CondicionesCompraItems;
		$model->idCondicionCompra=$factura['idCondicionCompra'];
		$condiciones=$model->consultarCondiciones();
		
		
		foreach($condiciones as $cond)
			$this->ingresarCuotas($cond['cantidadCuotas'],$factura,$cond,$idFacturaEntrante,$cond['aVencerEnDias']);
			
		
			
		
	}
	private function ingresarCuotas($cantidadCuotas,$factura,$cond,$idFacturaEntrante,$diasVencimiento)
	{
		$date = new DateTime; //hoy
		$dia=isset($diasVencimiento)?$diasVencimiento:'0';
		if($cantidadCuotas==0)$cantidadCuotas=1;//en caso de que sea CONTADO
		$importe=($factura['importe']*($cond['porcentajeTotalFacturado']/100))/$cantidadCuotas;
		for($i=0;($cantidadCuotas)>$i;$i++){
				
				$date->modify( $dia.' day' );
				
				$fecha=$date->format('Y-m-d');
				$mod=new FacturasEntrantesVencimientos;
				$mod->idFacturaEntrante=$idFacturaEntrante;
				$mod->fechaVencimiento=$fecha;
				$mod->estado='PEND';
				$mod->importe=$importe;
				$mod->save();
		}
		
	}
	public function consultarFacturaUnica($idFacturaVencimiento)
	{
		$connection=Yii::app()->getDb();
        $command=$connection->createCommand(
"SELECT t.*,ROUND((t.importe ),2) as importe, ROUND(SUM(ordenesPago_vencimientos.importe),2) as pagado from facturasEntrantes_vencimientos t " .
"left join ordenesPago_vencimientos on ordenesPago_vencimientos.idFacturaEntranteVencimiento = t.idFacturaVencimiento
 WHERE t.idFacturaVencimiento='$idFacturaVencimiento' AND t.estado like 'PEND' GROUP BY t.idFacturaVencimiento");
		$fact=$command->queryAll();
		return $fact[0];

	}
	public function consultarEtiquetasPendientes($nombre,$idFactura)
	{
		$connection=Yii::app()->getDb();
        $command=$connection->createCommand(
"SELECT t.*,ROUND((t.importe ),2) as importe, ROUND(SUM(ordenesPago_vencimientos.importe),2) as pagado from facturasEntrantes_vencimientos t " .
"left join ordenesPago_vencimientos on ordenesPago_vencimientos.idFacturaEntranteVencimiento = t.idFacturaVencimiento
 WHERE t.idFacturaEntrante='$idFactura' AND t.estado like 'PEND' GROUP BY t.idFacturaVencimiento");
		return $command->queryAll();

	}
	public function consultarPendientes($idProveedor)
	{
		$criteria=new CDbCriteria;
		$criteria->compare('t.estado','PEND');
		$criteria->compare('facturasEntrantes.idProveedor',$idProveedor);
		
		$criteria->select = "t.*, ROUND((t.importe ),2) as importeF, ROUND(SUM(ordenesPago_vencimientos.importe),2) as pagado,
				facturasEntrantes.numeroFactura as factura";
		$criteria->join = "left join ordenesPago_vencimientos on ordenesPago_vencimientos.idFacturaEntranteVencimiento = t.idFacturaVencimiento ".
		"LEFT JOIN facturasEntrantes on facturasEntrantes.idFacturaEntrante = t.idFacturaEntrante";
		
		$criteria->group=' t.idFacturaVencimiento ';
		$criteria->order='t.idFacturaVencimiento desc';

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));

	}
	

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function cambiarEstado($idFacturaVencimiento,$estado)
	{
		$fact=self::model()->findByPk($idFacturaVencimiento);
		$fact->estado=$estado;
		$fact->save(); 	
	}
	public  function afterUpdate()
	{
		parent::afterUpdate();
		FacturasEntrantes::model()->chequearEstado($this->idFacturaEntrante);
      	return parent::afterUpdate();
	}
	public function buscarVencidas()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

//		$criteria->compare('idFacturaVencimiento',$this->idFacturaVencimiento);
//		$criteria->compare('t.idFacturaEntrante',$_GET['idFacturaEntrante']);
		$criteria->compare('t.fechaVencimiento',$this->fechaVencimiento,true);
		$criteria->compare('t.estado',$this->estado,true);
//		$criteria->compare('importe',$this->importe);
$criteria->select = "t.*,proveedores.nombre as proveedor,datediff(NOW(),t.fechaVencimiento) as diasVencidos";
		$criteria->join = "LEFT JOIN facturasEntrantes on facturasEntrantes.idFacturaEntrante = t.idFacturaEntrante ".
		'LEFT JOIN proveedores on proveedores.idProveedor = facturasEntrantes.idProveedor ' ;
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

//		$criteria->compare('idFacturaVencimiento',$this->idFacturaVencimiento);
		$criteria->compare('t.idFacturaEntrante',$_GET['idFacturaEntrante']);
//		$criteria->compare('fechaVencimiento',$this->fechaVencimiento,true);
		$criteria->compare('t.estado',$this->estado,true);
//		$criteria->compare('importe',$this->importe);
$criteria->select = "t.*,proveedores.nombre as proveedor,datediff(NOW(),t.fechaVencimiento) as diasVencidos";
		$criteria->join = "LEFT JOIN facturasEntrantes on facturasEntrantes.idFacturaEntrante = t.idFacturaEntrante ".
		'LEFT JOIN proveedores on proveedores.idProveedor = facturasEntrantes.idProveedor ' ;
		//$criteria->group ='t.idTarea';

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}