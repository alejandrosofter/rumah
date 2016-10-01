
	<tr>
		<td width="50%">

<?php $longitud=50;
$link=CHtml::link(' ...ver mas',
                    Yii::app()->createUrl($data->controlador.'/update',array("id"=>$data->idElemento)));
 ?>
	<b><?php echo CHtml::encode(substr($data->titulo,0,$longitud)); echo strlen($data->titulo)>$longitud?$link:''; ?></b>
</td>
<td width="10%">
	<span class='<?php if($data->nivelAlerta=='Media')echo 'label warning';
	 					if($data->nivelAlerta=='Alta')echo 'label important';
	 					if($data->nivelAlerta=='Baja')echo 'label success';?>'>
	 					<?php echo CHtml::encode($data->nivelAlerta); ?></span>
</td>

<td width="20%">
	<span class='label'><i><?php echo CHtml::encode(($data->fechaVencimiento=='0000-00-00')?'Sin vencimiento':$data->fechaVencimiento); ?></i></small></small>
</td>
<td width="20%">
	<?php 
	//$cadenaFinalizaTarea='tareasEstados/create&id='.$data->idElemento;
	switch($data->area){
		case 'tareas':{
			$cad='tareasEstados/create&id='.$data->idElemento;
			break;
		}
		case 'Ordenes':{
			$cad='ordenesTrabajoEstados/create&id='.$data->idElemento;
			break;
		}
		case 'Precios':{
			$cad=$data->controlador.'/asignarCompra&id='.$data->idElemento;
			break;
		}
		default:{
			$cad="/alertas/finalizar&id=".$data->idAlerta;
		}
	}
	echo CHtml::link('Finalizar',
                    Yii::app()->createUrl($cad)); 
                    
     ?>
</td>
<tr>

