<div>
<h3>Buscador de Productos</h3> 
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'stock-form',
	'focus'=>'#buscador',
	'action'=>Yii::app()->createUrl('stock/stockReal'),
	'method'=>'get',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo CHtml::textField('buscador',isset($_GET['buscador'])?$_GET['buscador']:'') ?>
	<?php echo CHtml::linkButton('Buscar', array('class'=>'btn success','submit' => '', 'params' => array() )); ?>

<?php $this->endWidget(); ?>
</div>