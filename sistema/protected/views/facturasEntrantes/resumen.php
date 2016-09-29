<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'acciones-grid',
	'dataProvider'=>$model->consultarResumen(),

	'hideHeader'=>true,
	'template'=>"{items}",
	'columns'=>array(

	
		array(
                  'name'=>'descripcion',
                    'type'=>'html',
                    'value'=>'"<i>".$data->descripcion."</i>"',
                ),
		array(
                  'name'=>'importe',
                    'type'=>'html',
                    'value'=>'"<b>".$data->importe."</b>"',
                ),
		
	),
)); ?>