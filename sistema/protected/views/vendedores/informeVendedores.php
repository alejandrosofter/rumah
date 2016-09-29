<?php
$this->breadcrumbs=array(
	'Vendedores'=>array('/vendedores'),'Informe'
);

$this->menu=array(
	array('label'=>'Ver Vendedores','url'=>array('/vendedores')),
);
?>

<h1>INFORME DE VENDEDORES</h1>
Vea la performance de los vendedores ...</br>
<?php $form=$this->beginWidget('CActiveForm', array(
    'enableAjaxValidation'=>false,'id'=>'Reporte-form',
'action'=>Yii::app()->createUrl('vendedores/informeVentas'),
	'method'=>'post',
)); ?>
<div class="form">

<div class="row">
    <b>Vendedor</b>
<?php
$this->widget( 'ext.EChosen.EChosen'); 
echo  CHtml::dropDownList('idVendedor',isset($formulario['idVendedor'])?$formulario['idVendedor']:'',CHtml::listData(Vendedores::model()->findAll(), 'idVendedor', 'nombre'),array ('style'=>'width:300px','class'=>'chzn-select','prompt'=>'Seleccione...'));
?>
    <p class="note">En caso de no seleccionar el vendedor, el resumen sera GENERAL.</p>
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
        echo "<H3>RESUMEN DE VENTAS POR VENDEDOR</H3>";
        $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'vendedores-grid',
	'dataProvider'=>$datos,
	'columns'=>array(
		'nombre',
		'apellido',
		
		array(
                  'name'=>'porcentajeGanancia',
                    'type'=>'html',
                    'value'=>'"<b> ". $data->porcentajeGanancia." %</b>"',
                ),
            array(
                  'name'=>'ventas',
                    'type'=>'html',
                    'value'=>'"<b>$ ". number_format ($data->ventas, '.Settings::model()->getValorSistema('DECIMALES_FACTURAS').', ",", ".")."</b>"',
                ),
            array(
                  'name'=>'gananciaVendedor',
                    'type'=>'html',
                    'value'=>'"<b>$ ". number_format ($data->gananciaVendedor, '.Settings::model()->getValorSistema('DECIMALES_FACTURAS').', ",", ".")."</b>"',
                ),
		
	),
)); 
    }
    ?>
</div>