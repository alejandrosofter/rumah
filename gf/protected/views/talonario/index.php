<?php
$this->breadcrumbs=array(
	'Talonarios',
);

$this->menu=array(
	array('label'=>'Crear Talonario', 'url'=>array('create','idPuntoVenta'=>$model->idPuntoVenta)),
	array('label'=>'Puntos de Venta', 'url'=>array('/puntoVenta')),
);
?>

<h1>Talonarios</h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'talonario-grid',
	'dataProvider'=>$model->search(),
//	'filter'=>$model,
	'columns'=>array(
		'desdeNumero',
		'hastaNumero',
		'proximo',
		'letraTalonario',
		'tipoTalonario',
		'numeroSerie',
            array(
                  'name'=>'esElectronica',
                    'type'=>'html',
                    'value'=>'($data->esElectronica==null || $data->esElectronica==0)?"No":"Si"',
                ),
            array(
                  'name'=>'predeterminado',
                    'type'=>'html',
                    'value'=>'($data->predeterminado==null || $data->predeterminado==0)?"No":"Si"',
                ),
        'ultimoNroPagIva',
		array(
			'class'=>'CButtonColumn','template' => ' {check} {downloadPK}  {downloadCSR} {actualizarHojasIva}  {update} {delete}',
			'buttons' => array(
                            'actualizarHojasIva' => array(
                                'label'=>'Acutalizar hojas Iva',
                                'url'=>'Yii::app()->createUrl("talonario/actualizarHojasIva",array("idTalonario"=>$data->idTalonario))'   ,
                                'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/famfam/arrow_refresh.png',
                                
                    
                            ),
                            'check' => array(
                    			'label'=>'Chequear Conexion',
                    			'url'=>'Yii::app()->createUrl("talonario/check",array("idTalonario"=>$data->idTalonario))'   ,
                    			'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/famfam/arrow_refresh.png',
                                'visible'=>'!($data->esElectronica==null || $data->esElectronica==0)'
                    
                            ),
                            'downloadCSR' => array(
                                'label'=>'Descargar CSR para solicitar ALIAS en AFIP',
                                'url'=>'Yii::app()->createUrl("talonario/downCSR",array("idTalonario"=>$data->idTalonario))'   ,
                                'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/famfam/arrow_divide.png',
                                'visible'=>'!($data->esElectronica==null || $data->esElectronica==0)'
                    
                            ),
                            'downloadPK' => array(
                    			'label'=>'Descargar PK para solicitar certificado en AFIP',
                    			'url'=>'Yii::app()->createUrl("talonario/downPK",array("idTalonario"=>$data->idTalonario))'   ,
                    			'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/famfam/arrow_down.png',
                                'visible'=>'!($data->esElectronica==null || $data->esElectronica==0)'
                    
                            )
                            ))
	),
)); ?>
** Nota: al actualizar las hojas de IVA, corresponde al mes anterior del que se está cursando. Ej. si hoy es 03-03-2014, el sistema va a actualizar en 
cuanto a la cantidad de registros registrados en el periodo 02-2014