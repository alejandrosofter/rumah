<?php
//$this->renderPartial('/site/panelesInicio/_accesosDirectos2',array());
$this->breadcrumbs=array(
	'Bienvenido al Sistema'
);
$this->renderPartial('_inicioUsuario',array());

?>
<br><br>
<?php
$rol=AuthItemPanel::model()->getRol(Yii::app()->user->id);
echo CHtml::link("Editar Inicio",
                    Yii::app()->createUrl("usuarios/editarPanel",array('align'=>'right',"id"=>Yii::app()->user->id)));



// Imprimir informacion adicional 

        ?>
