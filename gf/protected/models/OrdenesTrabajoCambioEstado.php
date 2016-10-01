<?php

/**
 * This is the model class for table "ordenesTrabajo_cambioEstado".
 *
 * The followings are the available columns in table 'ordenesTrabajo_cambioEstado':
 * @property integer $idOrdenCambioEstado
 * @property integer $idOrdenTrabajo
 * @property string $estado
 * @property string $fecha
 */
class OrdenesTrabajoCambioEstado extends CActiveRecord
{
    public $fechas;
	/**
	 * Returns the static model of the specified AR class.
	 * @return OrdenesTrabajoCambioEstado the static model class
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
		return 'ordenesTrabajo_cambioEstado';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idOrdenTrabajo', 'numerical', 'integerOnly'=>true),
			array('estado', 'length', 'max'=>255),
			array('fecha,fechas', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idOrdenCambioEstado, idOrdenTrabajo, estado, fecha', 'safe', 'on'=>'search'),
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
       private function restaFecha($fechaInicio,$fechaFin)
       {
           $fe1=explode('-', $fechaInicio);
           $fe2=explode('-', $fechaFin);
           $ano1 = $fe1[0]; 
$mes1 = $fe1[1]; 
$dia1 = $fe1[2]; 

//defino fecha 2 
$ano2 =  $fe2[0]; 
$mes2 =  $fe2[1]; 
$dia2 =  $fe2[2]; 

//calculo timestam de las dos fechas 
$timestamp1 = mktime(0,0,0,$mes1,$dia1,$ano1); 
$timestamp2 = mktime(0,0,0,$mes2,$dia2,$ano2); 
//echo $ano2.' '.$mes2.' '.$dia2;
//resto a una fecha la otra 
$segundos_diferencia = $timestamp1 - $timestamp2; 
//echo $segundos_diferencia; 

//convierto segundos en días 
$dias_diferencia = $segundos_diferencia / (60 * 60 * 24); 

//obtengo el valor absoulto de los días (quito el posible signo negativo) 
$dias_diferencia = abs($dias_diferencia); 

//quito los decimales a los días de diferencia 
$dias_diferencia = floor($dias_diferencia); 

return  $dias_diferencia; 
       }
        public function consultarSeguimientoOrden($idOrden)
        {
            $criteria=new CDbCriteria;

		$criteria->compare('idOrdenTrabajo',$this->idOrdenTrabajo);
                $criteria->group="t.estado";
                $criteria->select="t.*, GROUP_CONCAT(t.fecha) as fechas";
                return self::model()->findAll($criteria);
        }
        
        public function getTextoSeguimiento($idOrden,$titulo="Seguimiento Orden")
        {
            $arr=$this->consultarSeguimientoOrden($idOrden);
            $orden=OrdenesTrabajo::model()->findByPk($idOrden);
            $salida='<h5>'.$titulo.' '.$idOrden.'</h5>';
            $salida.=$this->getInicio($arr,$orden);
            foreach ($arr as $key => $value) {
                $aux=explode(',',$value['fechas']);
                $salida.='<b>'.$value['estado'].'</b>: '.$this->getFechasAux($aux,$orden);
            }
                
                
            return $salida;
        }
         private function getInicio($arr,$orden)
         {
             $sal="<b>Inicio de Orden: </b> ";
             if(count($arr)>0)
             {
                $fechaInicio=new DateTime($orden->fechaIngreso);
                $fechaFin=new DateTime($arr[0]['fecha']);
                
                $dias=$this->restaFecha($fechaInicio->format('Y-m-d'),$fechaFin->format('Y-m-d')).' DIAS ';
             }else $dias=' Al dia no se ha comenzado';
             return $sal.$dias;
         }
        private function getFechasAux($arr,$orden)
        {
            $i=1;
            $salida="";
            foreach ($arr as $key => $value) {
                
                $fechaInicio=new DateTime($value);
                $fecha2=isset($arr[$i])?$arr[$i]:Date('Y-m-d');
                $fechaFin=new DateTime($fecha2);
                
                $dias=$this->restaFecha($fechaInicio->format('Y-m-d'),$fechaFin->format('Y-m-d')).' DIAS';
               
                $salida.=$fechaInicio->format('d-m-Y')." - $dias ".', ';
                $i++;
            }
            return $salida;
        }
	public function attributeLabels()
	{
		return array(
			'idOrdenCambioEstado' => 'Id Orden Cambio Estado',
			'idOrdenTrabajo' => 'Id Orden Trabajo',
			'estado' => 'Estado',
			'fecha' => 'Fecha',
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

		$criteria->compare('idOrdenCambioEstado',$this->idOrdenCambioEstado);
		$criteria->compare('idOrdenTrabajo',$this->idOrdenTrabajo);
		$criteria->compare('estado',$this->estado,true);
		$criteria->compare('fecha',$this->fecha,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}