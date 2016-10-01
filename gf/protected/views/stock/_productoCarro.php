<tr>
	<td><?php echo CHtml::link(CHtml::image('images/iconos/famfam/delete.png','Quitar'),Yii::app()->createUrl("stock/consultarCarro",array("idStock"=>isset($item->idElemento)?$item->idElemento:'',"accion"=>"quitar")));   ?> </td>
	<td><?php echo isset($item->importeItem)?$item->importeItem:'';  ?></td>
	<td><b><?php echo Yii::app()->numberFormatter->formatCurrency(isset($item->importeItem)?$item->importeItem:'',"$");   ?></b></td>

</tr>
