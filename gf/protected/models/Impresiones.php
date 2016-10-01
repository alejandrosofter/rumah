<?php

/**
 * This is the model class for table "impresiones".
 *
 * The followings are the available columns in table 'impresiones':
 * @property integer $idImpresion
 * @property integer $idTipoImpresion
 * @property string $tipoImpresion
 * @property string $fechaImpresion
 * @property string $textoImpresion
 * @property string $fechaLastModifico
 */
class Impresiones extends CActiveRecord
{
	public $idCliente;
	public $fechaInicio;
	public $fechaFin;
	public $tipoLibro;
	/**
	 * Returns the static model of the specified AR class.
	 * @return Impresiones the static model class
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
		return 'impresiones';
	}
        public function getTipoExportaciones()
	{
    	return array('citiVentas' => 'Citi Ventas(.txt)','alicuotasCitiVentas' => 'Alicuotas Citi Ventas(.txt)','citiCompras' => 'Citi Compras(.txt)','alicuotasCitiCompras' => 'Alicuotas Citi Compras(.txt)');
	}
        private function getHoja($tipoImpresora)
        {
            $tipoImp=$this->getTipoImpresion($tipoImpresora);
            $salida=  explode('x',$this->getHojaImpresora($tipoImp));
            if($salida[0]=='?1'){
                $salida[0]=Settings::model()->getValorSistema('HOJA_PERSONALIZADO1x',null,null,Yii::app()->user->id);
                $salida[1]=Settings::model()->getValorSistema('HOJA_PERSONALIZADO1y',null,null,Yii::app()->user->id);
            }
            if($salida[0]=='?2'){
                $salida[0]=Settings::model()->getValorSistema('HOJA_PERSONALIZADO2x',null,null,Yii::app()->user->id);
                $salida[1]=Settings::model()->getValorSistema('HOJA_PERSONALIZADO2y',null,null,Yii::app()->user->id);
            }
            if(count($salida)==0)
                return null;
            return $salida;
        }
        public function getTipoImpresion($tipo)
        {
            $tipoImpresora="";
            switch ($tipo) {
                case "notaCredito":
                     $tipoImpresora=Settings::model()->getValorSistema('IMPRESION_NOTACREDITO_IMPRESORA',null,null,Yii::app()->user->id);

                    break;
                case "codigoBarrasProducto":
                     $tipoImpresora=Settings::model()->getValorSistema('IMPRESION_CODBARRAS_IMPRESORA',null,null,Yii::app()->user->id);

                    break;
                case "orden":
                     $tipoImpresora=Settings::model()->getValorSistema('IMPRESION_ORDENES_IMPRESORA',null,null,Yii::app()->user->id);

                    break;
                case "facturaA":
                     $tipoImpresora=Settings::model()->getValorSistema('IMPRESION_FACTURAS_IMPRESORA',null,null,Yii::app()->user->id);

                    break;
                case "facturaB":
                     $tipoImpresora=Settings::model()->getValorSistema('IMPRESION_FACTURAS_IMPRESORA_B',null,null,Yii::app()->user->id);

                    break;
                case "facturaX":
                     $tipoImpresora=Settings::model()->getValorSistema('IMPRESION_FACTURAS_IMPRESORAX',null,null,Yii::app()->user->id);

                    break;
                case "ordenPago":
                     $tipoImpresora=Settings::model()->getValorSistema('IMPRESION_ORDENPAGO_IMPRESORA',null,null,Yii::app()->user->id);

                    break;
                case "ordenCobro":
                     $tipoImpresora=Settings::model()->getValorSistema('IMPRESION_ORDENCOBRO_IMPRESORA',null,null,Yii::app()->user->id);

                    break;
                case "recibo":
                     $tipoImpresora=Settings::model()->getValorSistema('IMPRESION_RECIBO_IMPRESORA',null,null,Yii::app()->user->id);

                    break;
                case "presupuesto":
                     $tipoImpresora=Settings::model()->getValorSistema('IMPRESION_PRESUPUESTOS_IMPRESORA',null,null,Yii::app()->user->id);

                    break;
                case "tarea":
                     $tipoImpresora=Settings::model()->getValorSistema('IMPRESION_TAREAS_IMPRESORA',null,null,Yii::app()->user->id);

                    break;
                case "informe":
                     $tipoImpresora=Settings::model()->getValorSistema('IMPRESION_INFORMES_IMPRESORA',null,null,Yii::app()->user->id);

                    break;

                default:
                    $tipoImpresora="Preguntar";
                    break;
            }
            return $tipoImpresora;
        }
        public function getTextoParametro($salida,$params)
        {
            if($params!=null)
		foreach($params as $campo=>$item)
			$salida = str_replace("%".$campo, $item,$salida);
            return $salida;
        }
        private function getImpresora($idUsuario,$tipoImpresion)
        {
            
            return $this->getNombreImpresora($this->getTipoImpresion($tipoImpresion));
        }
        public function getHojaImpresora($tipoImpresora)
        {
            $hoja="";
            switch ($tipoImpresora) {
                case "TicketF":
                      $hoja=Settings::model()->getValorSistema('IMPRESORA_TICKET_FISCAL_USUARIO',null,null,Yii::app()->user->id);

                    break;
                case "Ticket":
                      $hoja=Settings::model()->getValorSistema('HOJA_TICKET_USUARIO',null,null,Yii::app()->user->id);

                    break;
                case "Principal":
                      $hoja=Settings::model()->getValorSistema('HOJA_PRINCIPAL_USUARIO',null,null,Yii::app()->user->id);

                    break;
                case "Secundaria":
                      $hoja=Settings::model()->getValorSistema('HOJA_SECUNDARIA_USUARIO',null,null,Yii::app()->user->id);

                    break;
                case "Etiqueteadora":
                      $hoja=Settings::model()->getValorSistema('HOJA_ETIQUETAS_USUARIO',null,null,Yii::app()->user->id);

                    break;

                default:
                    $hoja=Settings::model()->getValorSistema('HOJA_PRINCIPAL_USUARIO',null,null,Yii::app()->user->id);
                    break;
            }
            return $hoja;
        }
        public function getNombreImpresora($tipoImpresora)
        {
            $nombreImpresora="";
            switch ($tipoImpresora) {
                case "TicketF":
                      $nombreImpresora=Settings::model()->getValorSistema('IMPRESORA_TICKET_FISCAL_USUARIO',null,null,Yii::app()->user->id);

                    break;
                case "Ticket":
                      $nombreImpresora=Settings::model()->getValorSistema('IMPRESORA_TICKET_USUARIO',null,null,Yii::app()->user->id);

                    break;
                case "Principal":
                      $nombreImpresora=Settings::model()->getValorSistema('IMPRESORA_PRINCIPAL_USUARIO',null,null,Yii::app()->user->id);

                    break;
                case "Secundaria":
                      $nombreImpresora=Settings::model()->getValorSistema('IMPRESORA_SECUNDARIA_USUARIO',null,null,Yii::app()->user->id);

                    break;
                case "Etiqueteadora":
                      $nombreImpresora=Settings::model()->getValorSistema('IMPRESORA_ETIQUETAS_USUARIO',null,null,Yii::app()->user->id);

                    break;

                default:
                    $nombreImpresora="";
                    break;
            }
            return $nombreImpresora;
        }

	/**
	 * @return array validation rules for model attributes.
	 */
        public function redirect($pasosAtras=1)
        {
            echo '<script type="text/javascript">';
	    echo "history.go(-$pasosAtras)";
	    echo '</script>';
        }
        public function redirectPagina($url)
        {
            echo '<script type="text/javascript">';
	    echo "window.location ='$url'";
	    echo '</script>';
        }
        public function imprimirJava($texto,$tipoImpresion=null,$linkRedirect=null,$copias="1",$posx=0,$posy=0,$conCorteMultiPagina="no",$muestraConfigImpresion="no",$tamAppletx=0,$tamApplety=0,$impresora=null)
        {
            if($impresora==null){
                $impresora=$this->getImpresora(Yii::app()->user->id,$tipoImpresion);
                $tipoImpresion=$this->getTipoImpresion($tipoImpresion);
            }else{
               $impresora=$this->getNombreImpresora($impresora);
            }
                
            $hoja=$this->getHoja($tipoImpresion);
            if($hoja==null){
                $tamx=210;
                $tamy=297;
            }else{
                
                    $tamx=isset ($hoja[0])?$hoja[0]:210;
                    $tamy=isset ($hoja[1])?$hoja[1]:297;
                

                
            }
            
            
            $puerto=$_SERVER['SERVER_PORT']=="80"?"":":".$_SERVER['SERVER_PORT'];
            $nombreServidor=$_SERVER['SERVER_NAME'].$puerto;
            if($nombreServidor==Settings::model()->getValorSistema('GENERALES_RUTASISTEMA'))
                    $muestraConfigImpresion="si";//osea que accede desde afuera
            $muestraConfigImpresion=$impresora==""?"si":"no";
//            echo $tipoImpresion;
//             echo $texto;
//             echo $impresora;
            if($tipoImpresion=="TicketF")
                $salida=$this->ejecutaAppletFiscal($impresora,$texto,$linkRedirect);
            else $salida=$this->ejecutaApplet($impresora,$texto,$copias,$tamAppletx,$tamApplety,$tamx,$tamy,$posx,$posy,$conCorteMultiPagina,$muestraConfigImpresion,$linkRedirect);
            
//            return $salida;
        }
        public function ejecutaAppletFiscal($impresora,$texto,$linkRedirect="",$copias=1,$tamAppletx=0,$tamApplety=0)
        {
        	$serial='27-0163848-435';
        	//$serial='';
            $salida= "<applet code=Fiscal.java archive='scripts/JavaDemo/exe/fisca52.jar' width='$tamAppletx' height='$tamApplety'>
      <param name='texto' value='".($texto)."'>
      <param name='copias' value='$copias'>
      <param name='puerto' value='$impresora'>
      <param name='serial' value='$serial'>
      <param name='link' value='$linkRedirect'>
                    
</applet>";//serial 27-0163848-435
            echo $salida;
        }
        private function ejecutaApplet($impresora,$texto,$copias,$tamAppletx,$tamApplety,$tamx,$tamy,$posx,$posy,$conCorteMultiPagina,$muestraConfigImpresion,$linkRedirect)
        {
            $salida= "<applet code=Imprimir.java width='$tamAppletx' height='$tamApplety' archive='scripts/Prueba_18.jar'>
      <param name='texto' value='".($texto)."'>
      <param name='copias' value='$copias'>
      <param name='tamx' value='$tamx'>
      <param name='tamy' value='$tamy'>
      <param name='posx' value='$posx'>
      <param name='posy' value='$posy'>
      <param name='conCorteMultiPagina' value='$conCorteMultiPagina'>
      <param name='impresora' value='$impresora'>
      <param name='muestraConfigImpresion' value='$muestraConfigImpresion'>
                    
      <param name='redirect' value='$linkRedirect'>
      
      
</applet>";
            echo $salida;
        }
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('idTipoImpresion, tipoImpresion, fechaImpresion, textoImpresion', 'required'),
			array('idTipoImpresion', 'numerical', 'integerOnly'=>true),
			array('tipoImpresion', 'length', 'max'=>255),
			array('fechaLastModifico', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idImpresion, idTipoImpresion, tipoImpresion, fechaImpresion, textoImpresion, fechaLastModifico', 'safe', 'on'=>'search'),
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
        public function imprimeArrayProductos($arr)
        {
            $sal='<table>';
            $i=1;
            $etiquetasFila=  Settings::model()->getValorSistema('ETIQUETAS_CANTIDAD_POR_FILA');
          
            foreach ($arr as $value){
                if($i==1)  $sal.='<tr>';
                $sal.='<td>'.$value.'</td>';
                if($i==$etiquetasFila)  $sal.='</tr>';
                $i=$i==$etiquetasFila?1:($i+1);
               
            }
                
            
            $sal.='<table>';
            return $sal;
        }
        public function imprimeCodigos($arr)
        {
            $sal='<table>';
            $i=1;
            $etiquetasFila=  Settings::model()->getValorSistema('ETIQUETAS_CANTIDAD_POR_FILA');
          
            foreach ($arr as $value){
                if($i==1)  $sal.='<tr>';
                $sal.='<td>'.$value.'</td>';
                if($i==$etiquetasFila)  $sal.='</tr>';
                $i=$i==$etiquetasFila?1:($i+1);
               
            }
                
            
            $sal.='<table>';
            return $sal;
        }
	public function attributeLabels()
	{
		return array(
			'idImpresion' => 'Id Impresion',
			'idTipoImpresion' => 'Id Tipo Impresion',
			'tipoImpresion' => 'Tipo Impresion',
			'fechaImpresion' => 'Fecha Impresion',
			'textoImpresion' => 'Texto Impresion',
			'fechaLastModifico' => 'Ultima Modificación',
		);
	}
	public function getTipos()
	{
    		return array('misTareas'=>'Mis Tareas','ordenPlanilla'=>'Orden de Trabajo (planilla)','factura' => 'Factura', 'orden' => 'Orden de Trabajo', 'Recibo' => 'Recibo');
	}
	public function getTipoLibro()
	{
    	return array('Ventas' => 'Ventas', 'Compras' => 'Compras','Seleccionar libro' => 'Seleccionar libro');
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
		$sort = new CSort;
        $sort->defaultOrder = 'idImpresion desc';

		$criteria->compare('idImpresion',$this->idImpresion);
		$criteria->compare('idTipoImpresion',$this->idTipoImpresion);
		$criteria->compare('tipoImpresion',$this->tipoImpresion,true);
		$criteria->compare('fechaImpresion',$this->fechaImpresion,true);
		$criteria->compare('textoImpresion',$this->textoImpresion,true);
		$criteria->compare('fechaLastModifico',$this->fechaLastModifico,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,'sort'=>$sort,
		));
	}
}