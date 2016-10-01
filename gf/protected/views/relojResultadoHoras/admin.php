<?php
$this->breadcrumbs=array(
	'Reloj Resultado Horases'=>array('index'),
	'Administrar',
);
echo 1335859980<1335862800;
$this->menu=array(
	array('label'=>'List RelojResultadoHoras', 'url'=>array('index')),
	array('label'=>'Create RelojResultadoHoras', 'url'=>array('create')),
);
?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'reloj-resultado-horas-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		  array(
                  'name'=>'entrada',
                    'type'=>'html',
                    'value'=>'($data->entrada)',
                ),
		 array(
                  'name'=>'salida',
                    'type'=>'html',
                    'value'=>'($data->salida)',
                ),
                array(
                  'name'=>'horasNormales',
                    'header'=>'Hs Normales',
                    'type'=>'html',
                    'value'=>'floor(($data->horasNormales)/60/60).":".(($data->horasNormales)/60)%(60)',
                ),
            array(
                  'name'=>'horasExtras',
                'header'=>'Hs 50%',
                    'type'=>'html',
                    'value'=>'floor(($data->horasExtras)/60/60).":".(($data->horasExtras)/60)%(60)',
                ),
            array(
                  'name'=>'horasNocturnas',
                'header'=>'Hs Noct.',
                    'type'=>'html',
                    'value'=>'floor(($data->horasNocturnas)/60/60).":".(($data->horasNocturnas)/60)%(60)',
                ),
            array(
                  'name'=>'horasTrabajadas',
                'header'=>'Hs TOTAL',
                    'type'=>'html',
                    'value'=>'floor(($data->horasTrabajadas)/60/60).":".(($data->horasTrabajadas)/60)%(60)',
                ),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
