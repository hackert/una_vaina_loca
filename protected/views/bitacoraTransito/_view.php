<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_transito')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_transito),array('view','id'=>$data->id_transito)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fksede_salida')); ?>:</b>
	<?php echo CHtml::encode($data->fksede_salida); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_salida')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_salida); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fksede_llegada')); ?>:</b>
	<?php echo CHtml::encode($data->fksede_llegada); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_llegada')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_llegada); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_fkestatus')); ?>:</b>
	<?php echo CHtml::encode($data->id_fkestatus); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_date')); ?>:</b>
	<?php echo CHtml::encode($data->create_date); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('modified_date')); ?>:</b>
	<?php echo CHtml::encode($data->modified_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('peso_salida')); ?>:</b>
	<?php echo CHtml::encode($data->peso_salida); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('peso_llegada')); ?>:</b>
	<?php echo CHtml::encode($data->peso_llegada); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fk_despacho')); ?>:</b>
	<?php echo CHtml::encode($data->fk_despacho); ?>
	<br />

	*/ ?>

</div>