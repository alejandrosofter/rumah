<?php

/**
 * This is the model class for table "mensajes".
 *
 * The followings are the available columns in table 'mensajes':
 * @property integer $idMensaje
 * @property string $cuerpoMensaje
 * @property string $tituloMensaje
 * @property string $tipoMensaje
 * @property string $fechaMensaje
 * @property string $destinatario
 * @property string $remitente
 */
class Mensajes extends CActiveRecord
{
    public $idReferencia;
    public $Status;
    public $stausMail;
	/**
	 * Returns the static model of the specified AR class.
	 * @return Mensajes the static model class
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
		return 'mensajes';
	}
        public function notificar($mensaje,$fecha,$idCliente)
        {
            $cliente=Clientes::model()->findByPk($idCliente);
            $nombreCliente=$cliente->apellido.' '.$cliente->nombre.' '.$cliente->razonSocial;
            if(Settings::model()->getValorSistema('GENERALES_MAIL_ACTIVORDENES')=='Activa'){
      			$usuarios=Usuarios::model()->consultarUsuariosArea(Settings::model()->getValorSistema('ORDENES_AREA_ENCARGADA'));
      			foreach($usuarios as $user){
      			$parametros['titulo']='Nueva Orden de Trabajo '.$nombreCliente;
      			$parametros['mensaje']=$this->descripcionCliente;
      			$parametros['fecha']=$this->fechaIngreso;
      			if($user['email']!=''){
      				Mensajes::model()->enviarMail($user['email'],Settings::model()->getValorSistema('GENERALES_MAIL_IMPRESION_ORDEN',$parametros,'impresiones'),'Nueva Orden de Trabajo '.$nombreCliente,Settings::model()->getValorSistema('GENERALES_MAIL_REMITENTE_ORDENES'));
      			}
      				
      			}
      			
      		}
        }

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tituloMensaje, tipoMensaje, destinatario, remitente', 'length', 'max'=>255),
			array('cuerpoMensaje,stausMail, fechaMensaje', 'safe'),
                        array('stausMail', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idMensaje,stausMail, cuerpoMensaje, tituloMensaje, tipoMensaje, fechaMensaje, destinatario, remitente', 'safe', 'on'=>'search'),
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
			'idMensaje' => 'Id Mensaje',
			'cuerpoMensaje' => 'Cuerpo Mensaje',
			'tituloMensaje' => 'Titulo Mensaje',
			'tipoMensaje' => 'Tipo Mensaje',
			'fechaMensaje' => 'Fecha Mensaje',
			'destinatario' => 'Destinatario',
			'remitente' => 'Remitente',
		);
	}
        public function checkEnvioMensajes($post,$cliente,$titulo,$mensaje,$attachs=null)
        {
            if(isset($post['enviaMensajeCelular']))
                                    Mensajes::model ()-> enviarMensaje($titulo,$mensaje,$cliente->celular,$attachs);
				if(isset($post['enviaMensajeMantCelular']))
                                    Mensajes::model ()-> enviarMensaje($titulo,$mensaje,$cliente->mobilContactoMantenimiento,$attachs);
                                 if(isset($post['emailMantCelular']))
                                    Mensajes::model ()->enviarMail ($cliente->emailContactoMantenimiento, $titulo, $mensaje, Settings::model()->getValorSistema('GENERALES_MAIL_REMITENTE_ORDENES'),$attachs);
                                 if(isset($post['email']))
                                    Mensajes::model ()->enviarMail ($cliente->email, $titulo,$mensaje, Settings::model()->getValorSistema('GENERALES_MAIL_REMITENTE_ORDENES'),$attachs);


        }
	public function enviarMensaje($titulo,$mensaje,$telefono)
	{
            if(  Settings::model()->getValorSistema('GENERALES_SMS_ACTIVO')=='1'){
            $connection=Yii::app()->getDb();
        $sql="INSERT INTO  `smsd`.`outbox` (
`DestinationNumber` ,
`TextDecoded` ,
`CreatorID`,
`Coding` 
)
VALUES ('$telefono', '$titulo : $mensaje','Program','Default_No_Compression');";
		//$sql="INSERT INTO outbox (DestinationNumber,TextDecoded,CreatorID,Coding) VALUES '$telefono', '$titulo : $mensaje','Program','Default_No_Compression')";
		$command=$connection->createCommand($sql);
                try {
                    $res= $command->queryAll();
                } catch (Exception $exc) {
                    
                }
                $sql="SELECT * FROM `smsd`.`outbox` order by ID desc LIMIT 1";
                $command=$connection->createCommand($sql);
                 try {
                    $res= $command->queryAll();
                } catch (Exception $exc) {
                    
                }
                $id=0;
                if(count($res)!=0)$id=$res[0]['ID'];

                
                
		$mod=new Mensajes;
			$mod->tituloMensaje=$titulo;
			$mod->cuerpoMensaje=$mensaje;
			$mod->destinatario=$telefono;
                        $mod->idReferencia=$id;
                        $mod->fechaMensaje=Date('Y-m-d');
			$mod->tipoMensaje='telefono';
			$mod->remitente=Settings::model()->getValorSistema('GENERALES_MENSAJETEXTO_NRO');
			$mod->save();
            }
	}
        public function getTipos()
	{
    	return array('telefono' => 'telefono', 
    		'email' => 'email');
	}
	public function enviarMail($mail,$mensaje,$titulo,$desde,$attachs=null)
	{
		//require_once "SOAP/Client.php"; 
		//echo Settings::model()->getValorSistema('GENERALES_RUTAMAILS');
          if(  Settings::model()->getValorSistema('GENERALES_MAIL_ACTIVOGENERAL')=='1'){
              $st='ok';
              $res=false;
              try {
                  $res=true;
//                  $wsdl=Settings::model()->getValorSistema('GENERALES_RUTAMAILS');
//                  if(!@file_get_contents($wsdl)) 
//                    throw new SoapFault('Server', 'No WSDL found at ' . $wsdl);
//    
//                    $cli= new SoapClient($wsdl);   
//                    $res= $cli->sendEmail ($mail,$titulo,$mensaje,$desde); 
                   $mailer = new YiiMail();
$mailer->transportType='smtp';
$mailer->transportOptions=array(
'host'=>Settings::model()->getValorSistema('GENERALES_MAIL_HOST'),
'username'=>Settings::model()->getValorSistema('GENERALES_MAIL_CUENTA'),
'password'=>Settings::model()->getValorSistema('GENERALES_MAIL_CLAVE'),
//'port'=>'465',
//'encryption'=>'ssl',
);
 
$message = new YiiMailMessage(); 
$message->setTo(
            array($mail=>$mail));
            $message->setFrom(array($desde=>$desde));
            $message->setSubject($titulo);
            $message->setBody($mensaje,'text/html');
            if($attachs!=null)
                foreach ($attachs as $key => $value) 
                    $message->attach(Swift_Attachment::fromPath($value));
                
 
            $numsent = $mailer->send($message);
                    
                } catch (Exception $exc) {
                    $st='falla';
                    $res=false;
                    $mod=new Mensajes;
			$mod->tituloMensaje=$titulo;
			$mod->cuerpoMensaje=$mensaje;
			$mod->destinatario=$mail;
                        $mod->fechaMensaje=Date('Y-m-d H:m:s');
			$mod->tipoMensaje='email';
			$mod->remitente=$desde;
                        $mod->stausMail=$st;
			$mod->save();
                }
             
		if($res)
		{
			$mod=new Mensajes;
			$mod->tituloMensaje=$titulo;
			$mod->cuerpoMensaje=$mensaje;
			$mod->destinatario=$mail;
                        $mod->fechaMensaje=Date('Y-m-d H:m:s');
			$mod->tipoMensaje='email';
			$mod->remitente=$desde;
                        $mod->stausMail=$st;
			$mod->save();
			
		}
		return $res;
          }
          return false;
		
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

		$criteria->compare('idMensaje',$this->idMensaje);
		$criteria->compare('cuerpoMensaje',$this->cuerpoMensaje,true);
		$criteria->compare('tituloMensaje',$this->tituloMensaje,true);
		$criteria->compare('tipoMensaje',$this->tipoMensaje,true);
		$criteria->compare('fechaMensaje',$this->fechaMensaje,true);
		$criteria->compare('destinatario',$this->destinatario,true);
		$criteria->compare('remitente',$this->remitente,true);
//                $criteria->join="LEFT JOIN smsd.sentitems j on j.ID = t.idReferencia";
//                $criteria->select="t.*, j.Status";
                $criteria->order='idMensaje desc';

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}