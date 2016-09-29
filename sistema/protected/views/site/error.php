<?php
$this->pageTitle=Yii::app()->name . ' - Error';
$this->breadcrumbs=array(
	'Error',
);
?>

<h2><?php if($code==403)
			echo 'Permisos denegados!' ;
			else echo 'ERROR nro '.$code; ?></h2>

<div class="error">
<?php if($code==403)
		echo 'No estas autorizado para realizar esta accion! .. por favor contactate con el administrador del sistema';
		else echo CHtml::encode($message); ?>
</div>