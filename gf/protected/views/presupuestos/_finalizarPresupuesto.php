<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$this->beginWidget('CActiveForm', array(
	'id'=>'pedidos-form',
	'enableAjaxValidation'=>false,
));
$sal= "<br>".CHtml::linkButton('Finalizar Presupuesto', array('class'=>'btn success','submit' => '', 'params' => array('finalizar'=> true) ));
$sal.="<br><br>".$this->renderPartial('/clientes/_envioInformacion',array('cliente'=>$cliente),true);
$this->extra=$sal;
$this->endWidget();
?>
