<?php $this->pageTitle=Yii::app()->name; ?>
<table>
<td>
<?php
echo CHtml::image('images/iconos/financieros/home.png');
?>
</td>
<td>
<h1>Bienvenido a <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>
<i> A continuación los movimientos más importantes sobre las areas de la empresa: </i>
</td>
</table>

<br>

<?PHP

$this->widget('zii.widgets.jui.CJuiAccordion', array(
    'panels'=>array(
        'Compras'=>$this->renderPartial('/acciones/verAcciones',array('tipo'=>'archivo','model'=>Acciones::model()),true),
        'Ventas'=>$this->renderPartial('/acciones/verAcciones',array('tipo'=>'comprobante','model'=>Acciones::model()),true),
        'Productos'=>$this->renderPartial('/acciones/verAcciones',array('tipo'=>'informes','model'=>Acciones::model()),true),
         'Servicios'=>$this->renderPartial('/acciones/verAcciones',array('tipo'=>'informes','model'=>Acciones::model()),true),
          'Tesoreria'=>$this->renderPartial('/acciones/verAcciones',array('tipo'=>'informes','model'=>Acciones::model()),true),
    ),
    // additional javascript options for the accordion plugin
    'options'=>array(
        'animated'=>'bounceslide',
    ),
));
?>