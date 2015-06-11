<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_cliente')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_cliente),array('view','id'=>$data->id_cliente)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nb_cliente')); ?>:</b>
	<?php echo CHtml::encode($data->nb_cliente); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('apellido_cliente')); ?>:</b>
	<?php echo CHtml::encode($data->apellido_cliente); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cedula_cliente')); ?>:</b>
	<?php echo CHtml::encode($data->cedula_cliente); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('es_activo')); ?>:</b>
	<?php echo CHtml::encode($data->es_activo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_date')); ?>:</b>
	<?php echo CHtml::encode($data->create_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modified_date')); ?>:</b>
	<?php echo CHtml::encode($data->modified_date); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('id_contacto')); ?>:</b>
	<?php echo CHtml::encode($data->id_contacto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nacionalidad')); ?>:</b>
	<?php echo CHtml::encode($data->nacionalidad); ?>
	<br />

	*/ ?>

</div>