<?php
class WizardFacturaEntranteController extends Controller {
	public $layout='//layouts/column2';

public function beforeAction($action) {
		$config = array();
		
		switch ($action->id) {
			case 'nuevaFactura':
				$config = array(
					'steps'=>array('facturasEntrantes', 'comprasItems'),
					'events'=>array(
						'onStart'=>'wizardStart',
						'onProcessStep'=>'registrationWizardProcessStep',
						'onFinished'=>'wizardFinished',
						'onInvalidStep'=>'wizardInvalidStep',
						'onSaveDraft'=>'wizardSaveDraft'
					),
					'menuLastItem'=>'Finalizar'
				);
				break;
			
		
			
		
		
	}
	$config['class']='application.components.WizardBehavior';
	$this->attachBehavior('wizard', $config);
	$event->handled = true;
	return parent::beforeAction($action);

}

	public function wizardStart($event) {

		$event->handled = true;
	}

	public function wizardInvalidStep($event) {
		Yii::app()->getUser()->setFlash('notice', $event->step.' is not a vaild step in this wizard');
	}

	public function wizardFinished($event) {
		if ($event->step===true)
		echo 'lessto';
		$event->sender->reset();
		Yii::app()->end();
	}
	public function wizardSaveDraft($event) {
		echo 'salvandooo';
//		$user = new User();
//		$uuid = $user->saveRegistration($event->data);
//		$event->sender->reset();
//		$this->render('draft',compact('uuid'));
//		Yii::app()->end();
	}
	
	public function registrationWizardProcessStep($event) 
	{
		$model=new FacturasEntrantes;
		Yii::app()->session->add('factura',$_POST['FacturasEntrantes']);
		//print_r(Yii::app()->session->get('factura'));
		$model->attributes=Yii::app()->session->get('factura');
		
$model->estado='PEND';
		$model->importeFlete=0;
				$model->importeDescuentos=0;
				$model->importeRecargos=0;
				$model->importeImpuestos=0;

$transaction=$model->dbConnection->beginTransaction();
try
{

    $model->save();
    $transaction->commit();
}
catch(Exception $e)
{
    $transaction->rollBack();
}
//		if(isset($_POST['FacturasEntrantes'])){
//			$model=new FacturasEntrantes;
//			$event->sender->save($model->attributes);
//			
//		
//		}
			
	
//		$this->process('facturasEntrantes');

//echo 'envo:'. $event->sender['FacturasEntrantes']['idProveedor'];
//		$form = $model->getForm();
//
//		// Note that we also allow sumission via the Save button

//		if ($model->idCondicionCompra==3) 
//			$event->handled = true;
//			$event->sender->save($model->attributes);
//			$event->handled = true;
//		}
//
//else
$model=FacturasEntrantes::model();
		$this->render('/facturasEntrantes/formu_', array('model'=>$model,'form'=>'/facturasEntrantes/_form','event'=>$event));
//		$model=FacturasEntrantes::model();
//		$form='/facturasEntrantes/_form';
//		//$this->render('/facturasEntrantes/_form',array('model'=>FacturasEntrantes::model()));
//		$this->render('/facturasEntrantes/formu_', array('model'=>$model,'form'=>$form,'event'=>$event));
		
	}
public function actionNuevaFactura($step=null) {
		$this->pageTitle = 'Nueva Factura';
		
		$this->process($step);
	}
}
?>