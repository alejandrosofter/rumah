<div>
	<b>SUB TOTAL </b> <?php echo Yii::app()->numberFormatter->formatCurrency($data->importeSub,"$") ?><br>
	<?php echo $this->renderPartial('_importesExtras', array('model'=>FacturasEntrantes::model()->findByPk($_GET['idFactura']))); ?>
	<big><b>TOTAL  <?php echo Yii::app()->numberFormatter->formatCurrency($data->importeCompra,"$") ?></b></big>
</div>