<?php

/**
 * This is the model class for table "presupuestos".
 *
 * The followings are the available columns in table 'presupuestos':
 * @property integer $idPresupuesto
 * @property string $fechaPresupuesto
 * @property string $descripcionPresupuesto
 * @property string $asuntoPresupuesto
 * @property integer $idClientePresupuesto
 * @property string $fechaVencimiento
 * @property integer $precioEspecial
 * @property string $formaPago
 * @property string $fechaentrega
 * @property string $porcentajeIva
 * @property string $estado
 * @property string $tipoPresupuesto
 */
class Presupuestos extends CActiveRecord
{
	public $cliente;
	public $importePresupuesto;
	public $ordenTrabajo;
	public $idCondicionVenta;
        public $archivos;
        public $vence;
        public $avisa;
	/**
	 * Returns the static model of the specified AR class.
	 * @return Presupuestos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        public function getTextoPresupuesto($id)
        {
            $texto=Yii::app()->settings->getKey( 'IMPRESION_PRESUPUESTO');
        	
            
			$modelo=new Presupuestos;
			$items=$modelo->consultarItems($id);
			$presupuesto=$modelo->findByPk($id);
			$cliente=Clientes::model()->findByPk($presupuesto->idClientePresupuesto);
			
                        $params['formaPago']= $presupuesto->formaPago;
			$params['fechaPresupuesto']=  $presupuesto->fechaPresupuesto;
			$params['cliente']=  $cliente->razonSocial.' '.$cliente->apellido.' '.$cliente->nombre;
			$params['vencimiento']= $presupuesto->fechaVencimiento;
			$params['asunto']=  $presupuesto->asuntoPresupuesto;
			$params['condiciones']=  $presupuesto->descripcionPresupuesto;
			$params['detalle']= $this->getItemsPresupuesto($items);
			$params['tipoPresupuesto']= $presupuesto->tipoPresupuesto;
                        $params['detalle']=str_replace("'", '"',  $params['detalle']);
                        
                        $params['direccion']= Settings::model()->getValorSistema('DATOS_EMPRESA_DIRECCION');
                        $params['telefonos']= Settings::model()->getValorSistema('DATOS_EMPRESA_TELEFONO');
			$params['horariosAtencion']= Settings::model()->getValorSistema('DATOS_EMPRESA_HORARIOS');
                        $params['razonSocial']= Settings::model()->getValorSistema('DATOS_EMPRESA_RAZONSOCIAL');
                        $params['nombreFantasia']= Settings::model()->getValorSistema('DATOS_EMPRESA_FANTASIA');
                        $params['cuit']= Settings::model()->getValorSistema('DATOS_EMPRESA_CUIT');
                        $params['email']= Settings::model()->getValorSistema('DATOS_EMPRESA_EMAILADMIN');
                        $params['web']= Settings::model()->getValorSistema('DATOS_EMPRESA_SITE');
                        
			return Settings::model()->getValorSistema('IMPRESION_PRESUPUESTO', $params);
        }
        public function getItemsPresupuesto($items)
	{
		$salida='<table style="width: 100%">';
		$salida.="<tr>" .
					"	<th>Cantidad</th>".
					"	<th>Detalle</th>".
					"	<th>%I.V.A</th>".
                        "	<th>UNIT.</th>".
					"	<th>NETO</th>".
					"	<th>$ FINAL</th>".
					"</tr>";
		
		$saldo=0;
                $saldoNeto=0;
		$items=$items->data;
		foreach($items as $items){
			$iva=$items['porcentajeIva']==0?1:(($items['porcentajeIva']/100)+1);
                        $final=round($items['precioVenta']*$iva,1)*$items['cantidadItems'];
                        $neto=$items['precioVenta']*$items['cantidadItems'];
                         $unitario=$items['precioVenta'];
                        $saldo+=$final;
                        $saldoNeto+=$neto;
			$salida.="<tr>" .
					"	<td>".$items['cantidadItems']."</td>".
					"	<td>".$items['nombreStock']."</td>".
					"	<td>".Yii::app()->numberFormatter->formatPercentage($items['porcentajeIva'])."</td>".
                                "	<td>".Yii::app()->numberFormatter->formatCurrency($unitario,'$')."</td>".
					"	<td>".Yii::app()->numberFormatter->formatCurrency($neto,'$')."</td>".
					"	<td>".Yii::app()->numberFormatter->formatCurrency($final,'$')."</td>".
				
					"</tr>";
		}
		$salida.="<tr>" .
					"	<th></th>".
					"	<th></th>".
                        "	<th></th>".
                        
					"	<th></th>".
					"	<th>SUB-TOTAL <br>".Yii::app()->numberFormatter->formatCurrency($saldoNeto,'$')."</th>".
					"	<th>TOTAL <br>".Yii::app()->numberFormatter->formatCurrency($saldo,'$')."</th>".
					"</tr>";
		$salida.="</table>";
		return $salida;
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
		return 'presupuestos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fechaPresupuesto, fechaVencimiento, fechaentrega, descripcionPresupuesto, asuntoPresupuesto, idClientePresupuesto,   estado, tipoPresupuesto', 'required'),
			array('idClientePresupuesto, precioEspecial', 'numerical', 'integerOnly'=>true),
			array('asuntoPresupuesto', 'length', 'max'=>180),
			array('formaPago, tipoPresupuesto', 'length', 'max'=>255),
			array('porcentajeIva', 'length', 'max'=>100),
			array('estado', 'length', 'max'=>80),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idPresupuesto, fechaPresupuesto, descripcionPresupuesto, asuntoPresupuesto, idClientePresupuesto, fechaVencimiento, precioEspecial, formaPago, fechaentrega, porcentajeIva, estado, tipoPresupuesto', 'safe', 'on'=>'search'),
		);
	}
	public function getEstados()
	{
    	return array('Aprobado' => 'Aprobado','Rechazado' => 'Rechazado', 'Para Aprobar' => 'Para Aprobar', 'Stand-by' => 'Stand-by');
	}
	public function getTipoPresupuestos()
	{
    	return array('Personal' => 'Personal', 'Empresarial' => 'Empresarial', 'Especial' => 'Especial');
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
			'idPresupuesto' => 'Id Presupuesto',
			'fechaPresupuesto' => 'Fecha',
			'descripcionPresupuesto' => 'Condiciones/Anexos',
			'asuntoPresupuesto' => 'Asunto',
			'idClientePresupuesto' => 'Cliente',
			'fechaVencimiento' => 'Fecha Vencimiento',
			'precioEspecial' => 'Precio Especial',
			'formaPago' => 'Forma Pago',
			'fechaentrega' => 'Fecha Prox. Aviso',
			'porcentajeIva' => 'Porcentaje Iva',
			'estado' => 'Estado',
			'importePresupuesto' => 'Importe',
			'tipoPresupuesto' => 'Tipo Presupuesto',
			'ordenTrabajo' => 'Trabajando',
			'idCondicionVenta' => 'Condicion de Venta',
		);
	}
	public function getFormaPagos()
	{
            return array('Efectivo' => 'Efectivo', 'Tarjeta' => 'Tarjeta', 'Debito' => 'Debito', 'Cheques' => 'Cheques');
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function rechazar($idPresupuesto)
	{
		$presu=self::model()->findByPk($idPresupuesto);
		$presu->estado='Rechazado';
		$presu->save();
	}
	public function aceptar($idPresupuesto)
	{
		$presu=self::model()->findByPk($idPresupuesto);
		 $presu->estado='Aprobado';
		if($presu->save()) echo 'salvo';
	}
	public function consultarItems($idPresupuesto)
	{
		return PresupuestoItems::model()->search($idPresupuesto);
	}
	public function search($estado='')
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
                
                if(isset($_GET['cliente']) && trim($_GET['cliente'])!="")
		{ 
			$criteria->compare('clientes.razonSocial',$_GET['cliente'],true); // That didn't work
			$criteria->compare('clientes.apellido',$_GET['cliente'],true,"OR"); // That didn't work
			$criteria->compare('clientes.nombre',$_GET['cliente'],true,"OR"); // That didn't work
		}

		$criteria->compare('idPresupuesto',$this->idPresupuesto);
		$criteria->compare('fechaPresupuesto',$this->fechaPresupuesto,true);
		$criteria->compare('descripcionPresupuesto',$this->descripcionPresupuesto,true);
		$criteria->compare('asuntoPresupuesto',$this->asuntoPresupuesto,true);
		$criteria->compare('idClientePresupuesto',$this->idClientePresupuesto);
		$criteria->compare('fechaVencimiento',$this->fechaVencimiento,true);
		$criteria->compare('precioEspecial',$this->precioEspecial);
		$criteria->compare('formaPago',$this->formaPago,true);
		$criteria->compare('fechaentrega',$this->fechaentrega,true);
		$criteria->compare('porcentajeIva',$this->porcentajeIva,true);
		$criteria->compare('estado',$estado,true);
		$criteria->compare('tipoPresupuesto',$this->tipoPresupuesto,true);
		
		$criteria->select = "t.*,datediff(now(),t.fechaVencimiento) as vence, datediff(now(),t.fechaentrega) as avisa,presupuestos_ordenesTrabajo.idOrdenTrabajo as ordenTrabajo, ROUND(SUM(presupuestoItems.precioVenta*(IF(presupuestoItems.porcentajeIva=0,1,(presupuestoItems.porcentajeIva/100)+1))),1)*presupuestoItems.cantidadItems as importePresupuesto, CONCAT(clientes.razonSocial,' ',clientes.apellido,' ',clientes.nombre) as cliente ";
		$criteria->join = "LEFT JOIN clientes on clientes.idCliente = t.idClientePresupuesto " .
				"LEFT JOIN presupuestoItems on presupuestoItems.idPresupuesto = t.idPresupuesto " .
				"LEFT JOIN presupuestos_ordenesTrabajo on presupuestos_ordenesTrabajo.idPresupuesto = t.idPresupuesto";
		$criteria->group='t.idPresupuesto';
		$criteria->order='t.idPresupuesto desc';
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}