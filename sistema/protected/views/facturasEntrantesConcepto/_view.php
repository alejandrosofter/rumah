<div>
	<b>NETO AL <?php echo CHtml::encode($data->alicuotaIva); ?> % : </b> <?php echo Yii::app()->numberFormatter->formatCurrency($data->importe,"$") ?>
	<b>DEDUCE </b> <?php echo Yii::app()->numberFormatter->formatCurrency($data->importe*($data->alicuotaIva/100),"$") ?>
</div>