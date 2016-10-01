<?php
class Mails extends CActiveRecord
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	public function enviarMail($mail,$mensaje,$titulo,$desde)
	{
		require_once "SOAP/Client.php"; 
		$sw = new SOAP_WSDL (Settings::model()->getValorSistema('GENERALES_RUTAMAILS')); 
		$proxy = $sw->getProxy ();
		return $proxy->sendEmail ($mail,$titulo,$mensaje,$desde); 
	}

		
		
}		
?>