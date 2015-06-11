<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_gps')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_gps),array('view','id'=>$data->id_gps)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_vehiculo')); ?>:</b>
	<?php echo CHtml::encode($data->id_vehiculo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codigo')); ?>:</b>
	<?php echo CHtml::encode($data->codigo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modelo')); ?>:</b>
	<?php echo CHtml::encode($data->modelo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reporta')); ?>:</b>
	<?php echo CHtml::encode($data->reporta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('imei')); ?>:</b>
	<?php echo CHtml::encode($data->imei); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sim_card')); ?>:</b>
	<?php echo CHtml::encode($data->sim_card); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_instalacion')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_instalacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('linea')); ?>:</b>
	<?php echo CHtml::encode($data->linea); ?>
	<br />

	*/ ?>

</div>