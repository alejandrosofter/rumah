<?php
$this->breadcrumbs=array(
	'Pre-Ventas'=>array('/preVentasEmpresas')
);

?>

<h1>Resumen de Performance</h1>
Imprima el resumen del desarrollo de un usuario, o bien al no seleccionar ninguno sera un resumen general.</br>
<?php $form=$this->beginWidget('CActiveForm', array(
    'enableAjaxValidation'=>false,'id'=>'Reporte-form',
'action'=>Yii::app()->createUrl('preVentasEmpresas/informeUsuario'),
	'method'=>'post',
)); ?>
<div class="form">

<div class="row">
    <b>Usuario</b>
<?php
$this->widget( 'ext.EChosen.EChosen'); 
echo  CHtml::dropDownList('idUsuario',isset($formulario['idUsuario'])?$formulario['idUsuario']:'',CHtml::listData(Usuarios::model()->findAll(), 'idUsuario', 'nombre'),array ('style'=>'width:300px','class'=>'chzn-select','prompt'=>'Seleccione...'));
?>
    <p class="note">En caso de no seleccionar el usuario, el resumen sera GENERAL.</p>
</div>
<div class="row">
<b>Fecha de inicio</b>
<?php $this->renderPartial('/varios/campoFechaFormulario',array('nombre'=>'fechaInicio','valor'=>isset($formulario['fechaInicio'])?$formulario['fechaInicio']:''))?>
</div>
    <div class="row">
<b>Fecha de Fin</b>
<?php $this->renderPartial('/varios/campoFechaFormulario',array('nombre'=>'fechaFin','valor'=>isset($formulario['fechaFin'])?$formulario['fechaFin']:''))?>
</div>
<div class="actions">
<?php echo CHtml::submitButton('Reporte',array('class'=>'btn primary')); ?>
</div>

<?php $this->endWidget(); ?> 	
    <?php
    if(isset($datos)){
        echo "<H3>RESUMEN DE CAMBIOS DE ESTADOS</H3>";
        $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'pre-ventas-estados-grid',
	'dataProvider'=>$datos,
//	'filter'=>$model,
	'columns'=>array(
		'fecha',
		'nombreEmpresa',
		'comentario',
            
		array(
                  'name'=>'nombreEstado',
                    'type'=>'html',
                     'filter'=>CHtml::textField('nombreEstado',(isset($_GET['nombreEstado']) ? $_GET['nombreEstado'] : "")),
                    'value'=>'$data->nombreEstado',
                ),
             array(
                  'name'=>'usuario',
                    'type'=>'html',
                     'filter'=>CHtml::textField('usuario2',(isset($_GET['usuario2']) ? $_GET['usuario2'] : "")),
                    'value'=>'$data->usuario',
                ),
//		array(
//			'class'=>'CButtonColumn',
//		),
           
	),
));
    }
    if(isset($resumen)){
        echo "<H3>RESUMEN POR USUARIOS</H3>";
        $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'pre-ventas-estados-grid',
	'dataProvider'=>$resumen['cantidadesUsuario'],
//	'filter'=>$model,
	'columns'=>array(
		'cantidadEstados',
		'nombreEmpresa',
            
		array(
                  'name'=>'nombreEstado',
                    'type'=>'html',
                     'filter'=>CHtml::textField('nombreEstado',(isset($_GET['nombreEstado']) ? $_GET['nombreEstado'] : "")),
                    'value'=>'$data->nombreEstado',
                ),
             array(
                  'name'=>'usuario',
                    'type'=>'html',
                     'filter'=>CHtml::textField('usuario2',(isset($_GET['usuario2']) ? $_GET['usuario2'] : "")),
                    'value'=>'$data->usuario',
                ),
//		array(
//			'class'=>'CButtonColumn',
//		),
           
	),
));
    }
    if(isset($resumen)){
        echo "<H3>RESUMEN POR EMPRESA</H3>";
        $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'pre-ventas-estados-grid',
	'dataProvider'=>$resumen['cantidadesEmpresa'],
//	'filter'=>$model,
	'columns'=>array(
		'cantidadEstados',
		'nombreEmpresa',
            
		array(
                  'name'=>'nombreEstado',
                    'type'=>'html',
                     'filter'=>CHtml::textField('nombreEstado',(isset($_GET['nombreEstado']) ? $_GET['nombreEstado'] : "")),
                    'value'=>'$data->nombreEstado',
                ),
             array(
                  'name'=>'usuario',
                    'type'=>'html',
                     'filter'=>CHtml::textField('usuario2',(isset($_GET['usuario2']) ? $_GET['usuario2'] : "")),
                    'value'=>'$data->usuario',
                ),
//		array(
//			'class'=>'CButtonColumn',
//		),
           
	),
));
    }
    if(isset($empresas)){
        echo "<H3>CARGAS DE EMPRESAS VARIOS</H3>";
        $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'pre-ventas-empresas-grid',
    'ajaxUpdate'=>false,
	'dataProvider'=>$empresas,
	'columns'=>array(
		array(
                  'name'=>'fecha',
                    'type'=>'html',
               
                       'value'=>'$data->fecha', 
                
                ),
		'empresa',
		'telefono',
//		'email',
		
		array(
                  'name'=>'contacto',
                    'type'=>'html',
               
                       'value'=>'$data->contacto', 
                
                ),
            array(
                  'name'=>'responsable',
                    'type'=>'html',
                
                       'value'=>'$data->responsable', 
                
                ),
		'interes',
         
            'usuario', 
           
	),
)); 
    }
    ?>
</div>