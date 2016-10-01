<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'items',

	'method'=>'post',
	
	'enableAjaxValidation'=>false,
)); ?>



	
<table border="1" >
<div id="totales"  >


<td>Total</td>
<td><?php echo $form->textField($model,'total',array('size'=>10,'maxlength'=>10,'readonly'=>'readonly')); ?></td>


</div>

</table>
	

	

<?php $this->endWidget(); ?>

</div><!-- form -->