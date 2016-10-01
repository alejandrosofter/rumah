<?php $model->tipo=$tipo;$model->subTipo=$subTipo; ?></i>
<?php $this->widget('zii.widgets.CListView', array(
	'id'=>'compras-items-gridfd',
	'dataProvider'=>$model->consultarAcciones(),
'enablePagination'=>false,
 'template'=>'{items}',
	'itemView'=>'/acciones/_accion',
)); ?> 
