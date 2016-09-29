<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'usuarios-form',
	'enableAjaxValidation'=>false,
	'action'=>Yii::app()->createUrl('usuarios/consultarGeneral'),
	'method'=>'post',
)); ?>
<?php $this->widget('zii.widgets.jui.CJuiAutoComplete', array(

    'id'=>'textoBuscar',
    'name'=>'textoBuscar',
    'sourceUrl'=>$this->createUrl('usuarios/etiquetasGeneral',array()),
    'options'=>array('width'=>110,
    'showAnim'=>'fold',

  'select'=>'js:function(event, ui) {
     $("#idElemento").val(ui.item.idElemento);' .
     		'$("#tipo").val(ui.item.tipo);
		
    return false;
  }',
),
'htmlOptions'=>array('class'=>'xlarge success span5','size'=>40,"placeholder"=>"Escriba lo que desea utilizar o buscar!"),

));?>
<?php echo Chtml::textField('idElemento','',array('TYPE'=>'hidden')); ?>
<?php echo Chtml::textField('tipo','',array('TYPE'=>'hidden')); ?>
<?php //echo CHtml::linkButton('Ir', array('class'=>'btn small success','submit' => '', 'params' => array() ));?>


<?php $this->endWidget(); ?>