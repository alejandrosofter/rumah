<?php $this->breadcrumbs = array(
	'Roles'=>Rights::getBaseUrl(),
	Rights::t('core', 'Roles'),
); ?>

<div id="roles">

	<h2><?php echo Rights::t('core', 'Roles'); ?></h2>

	<p>
		<?php echo Rights::t('core', 'Un rol es un grupo de permisos para realizar una variedad de tareas y operaciones, por ejemplo, el usuario autenticado.'); ?><br />
		<?php echo Rights::t('core', 'Roles existe en la parte superior de la jerarquía de la autorización y por lo tanto se puede heredar de otros roles, tareas y / o operaciones.'); ?>
	</p>

	<p><?php echo CHtml::link(Rights::t('core', 'Crear role'), array('authItem/create', 'type'=>CAuthItem::TYPE_ROLE), array(
	   	'class'=>'add-role-link',
	)); ?></p>

	<?php $this->widget('zii.widgets.grid.CGridView', array(
	    'dataProvider'=>$dataProvider,
	    'template'=>'{items}',
	    'emptyText'=>Rights::t('core', 'No se encontraron Roles.'),
	    'htmlOptions'=>array('class'=>'grid-view role-table'),
	    'columns'=>array(
    		array(
    			'name'=>'name',
    			'header'=>Rights::t('core', 'Nombre'),
    			'type'=>'raw',
    			'htmlOptions'=>array('class'=>'name-column'),
    			'value'=>'$data->getGridNameLink()',
    		),
    		array(
    			'name'=>'description',
    			'header'=>Rights::t('core', 'Descripcion'),
    			'type'=>'raw',
    			'htmlOptions'=>array('class'=>'description-column'),
    		),
    		array(
    			'name'=>'bizRule',
    			'header'=>Rights::t('core', 'Regla de Negocio'),
    			'type'=>'raw',
    			'htmlOptions'=>array('class'=>'bizrule-column'),
    			'visible'=>Rights::module()->enableBizRule===true,
    		),
    		array(
    			'name'=>'data',
    			'header'=>Rights::t('core', 'Data'),
    			'type'=>'raw',
    			'htmlOptions'=>array('class'=>'data-column'),
    			'visible'=>Rights::module()->enableBizRuleData===true,
    		),
    		array(
    			'header'=>'&nbsp;',
    			'type'=>'raw',
    			'htmlOptions'=>array('class'=>'actions-column'),
    			'value'=>'$data->getDeleteRoleLink()',
    		),
    		array(
    			'header'=>'&nbsp;',
    			'type'=>'raw',
    			'htmlOptions'=>array('class'=>'actions-column'),
    			'value'=>'CHtml::link("Panel de Control",
                    Yii::app()->createUrl("authItemPanel/editar",array("rol"=>$data->name)))',
    		),
	    )
	)); ?>

	<p class="info"><?php echo Rights::t('core', 'Los valores entre corchetes quiere decir cuántos hijos tiene cada elemento.'); ?></p>

</div>