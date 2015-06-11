<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_envio')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_envio),array('view','id'=>$data->id_envio)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_envio')); ?>:</b>
	<?php echo CHtml::encode($data->tipo_envio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cant_articulo')); ?>:</b>
	<?php echo CHtml::encode($data->cant_articulo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codigo_envio')); ?>:</b>
	<?php echo CHtml::encode($data->codigo_envio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_date')); ?>:</b>
	<?php echo CHtml::encode($data->create_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modified_date')); ?>:</b>
	<?php echo CHtml::encode($data->modified_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('num_saca')); ?>:</b>
	<?php echo CHtml::encode($data->num_saca); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('peso_total')); ?>:</b>
	<?php echo CHtml::encode($data->peso_total); ?>
	<br />

	*/ ?>

</div>