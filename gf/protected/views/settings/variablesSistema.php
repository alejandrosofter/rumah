<?php
$this->breadcrumbs = array(
    'Configuraciones' => array(''),
);

?>

<h1>Variables del Sistema</h1>
A traves de esta interfaz ud. podra modificar valores del sistema que alteran su funcionamiento en distintas areas:
<br><br>
<div class='form'>
<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'settings-form',
    'enableAjaxValidation' => false,
        ));
//$this->widget('ext.bootstrap.widgets.BootAlert', array(
//    'id' => 'alert',
//    'keys' => array('success', 'info', 'warning', 'error'),
//));
?>

    <?php
    $this->widget('zii.widgets.jui.CJuiTabs', array(
        'tabs' => array(
            'Sistema' => $this->renderPartial('_variableGenerales', array(), true),
            'Compras' => $this->renderPartial('_variablesCompras', array(), true),
            'Ventas' => $this->renderPartial('_variablesVentas', array(), true),
            'Productos' => $this->renderPartial('_variablesProductos', array(), true),
            'Servicios' => $this->renderPartial('_variablesServicios', array(), true),
            'Datos de la Empresa' => $this->renderPartial('_variablesDatosEmpresa', array(), true)),
        //'Impresiones'=>$this->renderPartial('_impresiones',array(),true),
        // 'Tareas Programadas(Crons)'=>$this->renderPartial('/crons/index',array('model'=>new Crons),true)),
        // additional javascript options for the accordion plugin
        'htmlOptions' => array(
        // 'style'=>'height:450px;',
        //'height'=>500
        //  'collapsible'=>true,
        ),
    ));
    ?>




    <div class="actions">
<?php echo CHtml::submitButton('Guardar', array('class' => 'btn primary')); ?>
    </div>

<?php $this->endWidget(); ?>
</div>