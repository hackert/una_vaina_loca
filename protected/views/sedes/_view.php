<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_sede')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_sede),array('view','id'=>$data->id_sede)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nb_sede')); ?>:</b>
	<?php echo CHtml::encode($data->nb_sede); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('direccion_sede')); ?>:</b>
	<?php echo CHtml::encode($data->direccion_sede); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fk_estado')); ?>:</b>
	<?php echo CHtml::encode($data->fk_estado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fk_municipio')); ?>:</b>
	<?php echo CHtml::encode($data->fk_municipio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fk_parroquia')); ?>:</b>
	<?php echo CHtml::encode($data->fk_parroquia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fk_estatus')); ?>:</b>
	<?php echo CHtml::encode($data->fk_estatus); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('create_date')); ?>:</b>
	<?php echo CHtml::encode($data->create_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modified_by')); ?>:</b>
	<?php echo CHtml::encode($data->modified_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('es_activo')); ?>:</b>
	<?php echo CHtml::encode($data->es_activo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_sede')); ?>:</b>
	<?php echo CHtml::encode($data->tipo_sede); ?>
	<br />

	*/ ?>

</div>