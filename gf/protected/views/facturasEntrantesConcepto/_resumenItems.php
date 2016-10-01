<?php
$this->widget('zii.widgets.CListView', array(
	'id'=>'compras-items-gridfd',
	'dataProvider'=>$datos,
'enablePagination'=>false,
 'template'=>'{items}',
	'itemView'=>'_view',
)); ?>

