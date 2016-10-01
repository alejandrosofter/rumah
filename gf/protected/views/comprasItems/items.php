<div class="form">
<?php echo CHtml::beginForm(); ?>
<table>
<tr><th>Cantidad</th><th>Descripcion</th><th>IVA</th><th>Importe</th></tr>
<?php foreach($items as $i=>$item): ?>
<tr>
<td><?php echo CHtml::activeTextField($item,"[$i]cantidad"); ?></td>
<td><?php echo CHtml::activeTextField($item,"[$i]nombreStock"); ?></td>
<td><?php echo CHtml::activeTextField($item,"[$i]alicuotaIva"); ?></td>
<td><?php echo CHtml::activeTextArea($item,"[$i]importeCompra"); ?></td>
</tr>
<?php endforeach; ?>
</table>
 
<?php echo CHtml::submitButton('Save'); ?>
<?php echo CHtml::endForm(); ?>
</div><!-- form -->