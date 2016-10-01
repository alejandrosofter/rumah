<div>
	<b>NETO AL <?php echo CHtml::encode($data->porcentajeIva); ?> % : </b> <?php echo Yii::app()->numberFormatter->formatCurrency($data->importeCompra,"$") ?>
	<b>DEDUCE </b> <?php echo Yii::app()->numberFormatter->formatCurrency($data->importeCompra*($data->porcentajeIva/100),"$") ?>
</div>