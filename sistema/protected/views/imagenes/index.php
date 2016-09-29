<?php
$this->breadcrumbs=array(
	'Imagenes',
);
$ruta='';
switch ($_GET['tipo']) {
    case 'presupuestos':
        $ruta='/presupuestoItems&idPresupuesto='.$_GET['idTipo'];
        break;

    default:
        break;
}

$this->menu=array(
    array('label'=>'Volver', 'url'=>array($ruta)),
);
?>

<h1>Archivos</h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'imagenes-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'fecha',
		array(
                    'header'=>'Nombre de Archivo',
                  'name'=>'nombreImagen',
                    'value'=>'$data->nombreImagen',
                ),
		/*
		'path',
		*/
		array(
			'class'=>'CButtonColumn','template' => '{ver} {delete}',
			'buttons' => array(
                            'ver' => array(
                               
                    			'label'=>'Ver descargar el archivo',     
                    			'url'=>'Yii::app()->createUrl("imagenes/descargar",array("idArchivo"=>$data->idImagen))'   ,
                    			'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/famfam/arrow_down.png',  // image URL of the button. If not set or false, a text link is used
                    
                                        ),
                            ),
		),
	),
)); 
$this->renderPartial('_form',array('model'=>$model),false);
?>
