<?php
$this->breadcrumbs=array(
	'Tareas Programadas',
);

?>

<h1>Tareas Programadas</h1>
<?php echo CHtml::link('Nueva Tarea Cron','index.php?r=crons/create');?> <br>
<?php echo CHtml::link('Nuevo Cron a Usuario','index.php?r=crons/createUsuario');?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'crons-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
            'nombre',
            array(
                  'name'=>'horas',
                    'type'=>'html',
                    'value'=>'Crons::model()->getOtroDia($data->horas)',
                ),
		array(
                  'name'=>'minutos',
                    'type'=>'html',
                    'value'=>'Crons::model()->getOtroDia($data->minutos)',
                ),
		
		array(
                  'name'=>'dias',
                    'type'=>'html',
                    'value'=>'Crons::model()->getOtroDia($data->dias)',
                ),
		array(
                  'name'=>'meses',
                    'type'=>'html',
                    'value'=>'Crons::model()->getOtroDia($data->meses)',
                ),
		array(
                  'name'=>'diasSemana',
                    'type'=>'html',
                    'value'=>'Crons::model()->getDia($data->diasSemana)',
                ),
		
		
		/*'parametros',
		'nombre',
		'descripcion',
		*/
		array(
			'class'=>'CButtonColumn','template' => '{ejecutar} {update}{delete}',
			'buttons' => array(
                            'ejecutar' => array(
                    			'label'=>'Ejecutar',
                    			'url'=>'Yii::app()->createUrl("crons/ejecutar",
                    			array("idCron"=>$data->idCron))'   ,
                    			'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/famfam/arrow_left.png',
                    
                            ),
                           
                            ),
		),
	),
)); ?>